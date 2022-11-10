@extends('admin.admin_index')
@section('page-header')

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Doctors</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Doctor</li>
                </ul>
            </div>

        </div>
    </div>

@endsection

@section('add_patient')
    <div id="" class="" role="">
        {{-- {{$success}} --}}
        <div class="alert alert-success" id="success_msg" style="display: none;">
            تم الحفظ بنجاح
        </div>

        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" id="offerForm" enctype="multipart/form-data"
                        action="{{ route('admin.add_doctor') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                    <input id="fname" class="form-control" type="text" name='fname'
                                        value="{{ old('fname') }}">

                                </div>
                            </div>




                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Last Name</label>
                                    <input id="lname" class="form-control" type="text" name='lname'
                                        value="{{ old('lname') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input id="email" class="form-control floating" placeholder="example@gmail.com"
                                        type="email" name='email' value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone </label>
                                    <input id="phone" class="form-control" type="text" name='phone'
                                        value="{{ old('phone') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input id="pass" class="form-control" type="password" name='pass'>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Confirm Password</label>

                                    <input id="confpass" class="form-control" type="password" name='password_confirmation'>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Doctor BIRTHDATE <span
                                            class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input id="birth" class="form-control datetimepicker" type="date"
                                            name='birth' value="{{ old('birth') }}">
                                    </div>
                                </div>
                            </div>







                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">City</label>
                                    <input id="city" class="form-control" type="text" name='city'
                                        value="{{ old('city') }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Zone </label>
                                    <input id="zone" class="form-control"
                                        placeholder="Write zone or village any address" type="text" name='zone'
                                        value="{{ old('zone') }}">
                                </div>
                            </div>

                            {{-- Gender --}}
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label class="col-form-label">Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                </div>
                            </div>
                            {{-- /Gender --}}

                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label class="col-form-label">Department</label>
                                    <select name="specialty" id="" class="form-control">
                                        <option value="">Select Department</option>
                                        @if (count($department))
                                            @foreach ($department as $dept)
                                                <option value="{{ $dept->specialty_id }}">{{ $dept->specialty_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
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
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

@section('scriptss')
    <script>
        $(document).on('click', '#save_patientxxx', function(e) {
            e.preventDefault();

            $('#fname').text('');
            $('#lname').text('');
            $('#email').text('');
            $('#phone').text('');
            $('#pass').text('');
            $('#confpass').text('');
            $('#birth').text('');
            $('#city').text('');
            $('#zone').text('');
            $('#gender').text('');
            $('#avatar');

            // $('#name_en_error').text('');
            // $('#price_error').text('');
            // $('#details_ar_error').text('');
            // $('#details_en_error').text('');
            var formData = new FormData($('#offerForm')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{ route('admin.add_patient') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function(data) {
                    $('#success_msg').show();
                    if (data.status == true) {
                        $('#success_msg').show();
                    }


                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
    </script>


@stop
