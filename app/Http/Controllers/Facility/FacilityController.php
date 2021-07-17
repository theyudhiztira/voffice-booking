<?php

namespace App\Http\Controllers\Facility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function __construct()
    {
        $this->locations = \App\Models\Location::all();
    }

    public function index()
    {
        $facilities = \App\Models\Facility::all();

        return view('admin.pages.facility.index', [
            'facilities' => $facilities
        ]);
    }

    public function create(Request $req)
    {
        return view('admin.pages.facility.create', [
            'locations' => $this->locations
        ]);
    }

    public function edit($id)
    {
        $facility = \App\Models\Facility::find($id);

        if(empty($facility)){
            return abort(404);
        }

        $facility->location_list = $this->locations;

        return view('admin.pages.facility.edit', $facility);
    }

    public function store(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'facility_name' => 'required',
            'location_id' => 'required|exists:location,id',
            'capacity' => 'required|numeric|min:1',
            'deduction_rate' => 'required|numeric|min:1',
            'weekend_operation' => 'nullable|in:true',
            'image' => 'required|image'
        ]);

        if($validator->fails()){
            return redirect(route('admin.facility.create'))
            ->withErrors($validator)
            ->withInput();
        }

        $facility = new \App\Models\Facility;
        $facility->facility_name = $req->facility_name;
        $facility->location_id = $req->location_id;
        $facility->capacity = $req->capacity;
        $facility->deduction_rate = $req->deduction_rate;
        $facility->start_time = '900';
        $facility->end_time = '1800';
        $facility->weekend_operation = $req->exists('weekend_operation');
        $facility->image = "default.jpeg";
        $facility->created_by = \Auth::user()->id;
        $facility->save();

        $file = $req->file('image');
        $fileName = $facility->id.".".$file->getClientOriginalExtension();
        $file->move('img/facilities', $fileName);
        $facility->image = $fileName;
        $facility->save();

        return redirect(route('admin.facility.index'));
    }

    public function update(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'facility_name' => 'required',
            'location_id' => 'required|exists:location,id',
            'capacity' => 'required|numeric|min:1',
            'deduction_rate' => 'required|numeric|min:1',
            'weekend_operation' => 'nullable|in:true',
            'image' => 'required|image'
        ]);

        if($validator->fails()){
            return redirect(route('admin.facility.edit'))
            ->withErrors($validator)
            ->withInput();
        }

        $facility = \App\Models\Facility::find($req->id);
        $facility->facility_name = $req->facility_name;
        $facility->location_id = $req->location_id;
        $facility->capacity = $req->capacity;
        $facility->deduction_rate = $req->deduction_rate;
        $facility->start_time = '900';
        $facility->end_time = '1800';
        $facility->weekend_operation = $req->exists('weekend_operation');

        $file = $req->file('image');
        $fileName = $facility->id.".".$file->getClientOriginalExtension();
        $file->move('img/facilities', $fileName);

        $facility->image = $fileName;
        $facility->save();

        return redirect(route('admin.facility.index'));
    }

    public function delete($id)
    {
        $location = \App\Models\Facility::find($id);

        if(empty($location)){
            return abort(404);
        }

        if(\File::exists(public_path('img/facilities/'.$location->image))){
            \File::delete(public_path('img/facilities/'.$location->image));
        }

        $location->delete();

        return redirect(route('admin.facility.index'));
    }

    public function webShow($id, Request $req)
    {
        $facility = \App\Models\Facility::find($id);

        if(!$facility){
            return abort(404);
        }

        $plans = \App\Models\ClientPlan::where('client_id', \Auth::guard('client')->user()->id)
        ->where('expiry_date', '>', \Carbon\Carbon::now("Asia/Jakarta")->isoFormat('YYYY-MM-DD'))
        ->get();

        $schedule = \App\Models\FacilitySchedule::where('date', $req->has('date') ? $req->date : \Carbon\Carbon::now("Asia/Jakarta")->isoFormat('YYYY-MM-DD'))
        ->where('facility_id', $facility->id)
        ->first();

        return view('web.pages.facility', [
            'facility' => $facility,
            'plans' => $plans,
            'schedule' => $schedule
        ]);
    }

    public function bookFacility(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'your_plan' => 'required|numeric|exists:client_plan,id',
            'schedule' => 'required|array|min:0',
            'facility' => 'required|exists:facility,id',
            'date' => 'required|date'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $plan = \App\Models\ClientPlan::find($req->your_plan);
        $facility = \App\Models\Facility::find($req->facility);

        $qouta_used = $facility->deduction_rate * count($req->schedule);

        if($plan->credits < $qouta_used){
            return redirect()->back()->withErrors(['your_plan' => 'You do not have enough credit to book this facility! ( required '.($qouta_used - $plan->credits).' )'])->withInput();
        }

        $booking = new \App\Models\Booking;
        $booking->facility_id = $req->facility;
        $booking->client_id = \Auth::guard('client')->user()->id;
        $booking->client_plan_id = $req->your_plan;
        $booking->credit_used = $qouta_used;
        $booking->booking_date = $req->date;
        $booking->save();

        $schedule = \App\Models\FacilitySchedule::where('facility_id', $req->facility)
        ->where('date', $req->date)
        ->first();

        $toSave = [];
        foreach ($req->schedule as $sch) {
            $toSave[strval($sch)] = $booking->id;
        }

        if(empty($schedule)){
            $createSchd = new \App\Models\FacilitySchedule;
            $createSchd->facility_id = $req->facility;
            $createSchd->date = $req->date;
            $createSchd->save();

            $schId = $createSchd->id;
        }else{
            $schId = $schedule->id;
        }

        $update = \DB::table('facility_schedule')->where('id', $schId)
        ->update($toSave);

        $plan->credits = $plan->credits - $qouta_used;
        $plan->save();

        return redirect(route('web.home'));
    }
}
