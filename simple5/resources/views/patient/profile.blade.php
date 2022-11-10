@extends('patient.layouts.app')
@section('patient_profile')
    <div class="`card mb`-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">

                                    @if ($result->img_url)
                                    <a href="">  <img src={{ asset('storage/patient_images/' . $result->img_url) }} alt=""></a>
                                    @else
                                    <a href=""> <img src={{ asset('storage/doctor_images/user.png') }} alt=""></a>
                                    @endif


                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0">{{ $result->fname }} </h3>
                                        <h5 class="company-role m-t-0 mb-0">{{ $result->lname }} </h5>
                                        <small class="text-muted">Patient/</small>
                                        <div class="staff-id">Patient ID : PAT-00{{ $result->patient_id }}</div>
                                        <div class="staff-msg">
                                            <a href="#" class="li" onclick="showDiv()">Edite</a>
                                            <a href="#" class="li" onclick="showChangPassDiv()">Change
                                                Password</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="">{{ $result->mobile }}</a></span>
                                        </li>

                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">{{ $result->email }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Birthday:</span>
                                            <span class="text">{{ $result->birth }}</span>
                                        </li>

                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{ $result->city }} {{ $result->zone }}</span>
                                        </li>

                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text">{{ $result->gender }}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('add_patient')
    <div id="edite-profile" class="" role="" style="display: none;">
        {{ $success }}
        <div class="alert alert-success" id="success_msg" style="display: none;">
            Data updated successfully
        </div>

        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edite Patient Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="offerForm" enctype="multipart/form-data" action="{{ route('patient.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                    <input id="fname" class="form-control" type="text" name='fname'
                                        value="{{ $result->fname }}">

                                </div>
                            </div>




                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Last Name</label>
                                    <input id="lname" class="form-control" type="text" name='lname'
                                        value="{{ $result->lname }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input id="email" class="form-control floating" placeholder="example@gmail.com"
                                        type="email" name='email' value="{{ $result->email }}" required readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone </label>
                                    <input id="phone" class="form-control" type="text" name='phone'
                                        value="{{ $result->mobile }}">
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Client BIRTHDATE <span
                                            class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input id="birth" class="form-control datetimepicker" type="date"
                                            name='birth' value="{{ $result->birth }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Patient City</label>
                                    <input id="city" class="form-control" type="text" name='city'
                                        value="{{ $result->city }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Patient Zone </label>
                                    <input id="zone" class="form-control"
                                        placeholder="Write zone or village any address" type="text" name='zone'
                                        value="{{ $result->zone }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Gender <span class="text-danger">*</span></label>
                                    <input id="gender" class="form-control" type="text" name='gender'
                                        value="{{ $result->gender }}">


                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
               <div class="form-group">
                <label class="col-form-label">Patient Image </label>
                <input id="avatar" class="form-control"  type="file" name="avatar" accept="image/jpg, image/jpeg, image/png" class="box" >
               </div>
              </div> -->

                        </div>



                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    {{-- Change password div --}}
    <div id="change-password" class="" role="" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" id="offerForm" action="{{ route('patient.changpass') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Old Password</label>
                                <input id="oldpass" class="form-control" type="password" name='pass'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">New Password</label>
                                <input id="pass" class="form-control" type="password" name='pass'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Confirm New Password</label>
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>
                        </div>


                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@stop

@section('scriptss')

@endsection



@push('scripts3')
    <script>
        function showDiv() {
            document.getElementById('edite-profile').style.display = "block";
            document.getElementById('change-password').style.display = "none";
        }

        function showChangPassDiv() {
            document.getElementById('edite-profile').style.display = "none";
            document.getElementById('change-password').style.display = "block";
        }
    </script>
@endpush
