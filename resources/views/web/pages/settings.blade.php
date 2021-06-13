@extends('web.app')

@section('title')
    vOffice | Account Settings
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h3>Hi, <b>{{ \Auth::guard('client')->user()->first_name }} {{ \Auth::guard('client')->user()->last_name }}</b></h3>
            </div>
        </div>
    </div>
</section>
<section class="mb-3">
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12">
                @if(\Session::has('personal_success'))  
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Nice!</strong> Your changes has been saved.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Personal Information</h5>
                    </div>
                    <div class="card-body">
                      <form method="POST" class="row" action="{{route('account.change.personal')}}">
                        <div class="col-12 col-md-6 table-responsive mb-2">
                          <label label for="FirstName" class="form-label">First Name</label>
                          <input required type="text" class="form-control" id="FirstName" placeholder="John" value="{{$first_name}}" name="first_name">
                        </div>
                        <div class="col-12 col-md-6 table-responsive mb-2">
                          <label label for="LastName" class="form-label">Last Name</label>
                          <input required type="text" class="form-control" id="LastName" placeholder="Doe" value="{{$last_name}}" name="last_name">
                        </div>
                        <div class="col-12 col-md-6 table-responsive mb-2">
                          <label label for="Email" class="form-label">Email</label>
                          <input required type="email" class="form-control" id="Email" placeholder="john.doe@email.com" value="{{$email}}" name="email">
                        </div>
                        <div class="col-12 col-md-6 table-responsive mb-2">
                          <label label for="PhoneNumber" class="form-label">Phone Number</label>
                          <input required type="text" class="form-control" id="PhoneNumber" placeholder="08123456789" value="{{$phone}}" name="phone">
                          <input type="hidden" value="{{csrf_token()}}" name="_token">
                        </div>
                        <div class="col-12 my-2">
                          <button class="w-100 btn btn-success">Save</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(\Session::has('password_success'))  
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Nice!</strong> Your password has been updated.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Account Security</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('account.change.password')}}" class="row">
                            <div class="col-12 table-responsive mb-2">
                              <label label for="OldPassword" class="form-label">Current Password</label>
                              <input required type="password" class="form-control" id="OldPassword" placeholder="Current Password" name="current_password">
                            </div>
                            <div class="col-12 table-responsive mb-2">
                              <label label for="NewPassword" class="form-label">New Password</label>
                              <input required name="new_password" type="password" class="form-control" id="NewPassword" placeholder="New Password">
                            </div>
                            <div class="col-12 table-responsive mb-2">
                              <label label for="NewPasswordConfirmation" class="form-label">New Password Confirmation</label>
                              <input required name="new_password_confirmation" type="password" class="form-control" id="NewPasswordConfirmation" placeholder="New Password Confirmation">
                              <input name="_token" type="hidden" value="{{csrf_token()}}">
                            </div>
                            <div class="col-12 my-2">
                              <button class="w-100 btn btn-success">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/b-html5-1.6.5/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.css"/>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/b-html5-1.6.5/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.js"></script>
    <script>
        $(document).ready(() => {
            $('table').DataTable();
        })

        const disableUser = (userId) => {
            return alert(userId);
        }
    </script>
@endsection
