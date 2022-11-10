@extends('patient.layouts.app')
@section('patient_profile')
    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                @if ($result->img_url)
                                <a href="#">  <img src={{ asset('storage/patient_images/' . $result->img_url) }} alt=""></a>
                                @else
                                <a href="#"> <img src={{ asset('storage/patient_images/user.png') }} alt=""></a>
                                @endif
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0">{{ $result->fname }} </h3>
                                        <h5 class="company-role m-t-0 mb-0">{{ $result->lname }} </h5>
                                        <small class="text-muted">Patient</small>
                                        <div class="staff-id">Patient ID : PAT-00{{ $result->patient_id }}</div>
                                        <div class="staff-msg">
                                            <a href="#" class="li">.</a>
                                            <a href="#" class="li">.</a>
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
                                            <span class="text"><a href="">{{ $result->email }}</a></span>
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


    <div class="card tab-box">
        <div class="row user-tabs">
            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item col-sm-3"><a class="nav-link active" data-toggle="tab"
                            href="#tasks">Appoinements</a></li>
                    <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" href="#myprojects">Treatements</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content profile-tab-content">

                <!-- Task Tab -->

                <div id="tasks" class="tab-pane fade show active">
                    <div class="project-task">
                        <ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
                            <li class="nav-item"><a class="nav-link active" href="#all_tasks" data-toggle="tab"
                                    aria-expanded="true">All Appoinements</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pending_tasks" data-toggle="tab"
                                    aria-expanded="false">Pending Appoinements</a></li>
                            <li class="nav-item"><a class="nav-link" href="#completed_tasks" data-toggle="tab"
                                    aria-expanded="false">Completed Appoinements</a></li>
                        </ul>
                        <div class="tab-content">
                            {{-- ALL appointment --}}
                            <div class="tab-pane show active" id="all_tasks">

                                <div class="row">

                                    <div class="col-md-12 ">

                                        @foreach ($pat_appoi as $p_appoi)
                                            <div class="border border-info">
                                                <div class="table-responsive ">
                                                    <b>
                                                        <p>Appoi-{{ $appo_id = $p_appoi->appo_id }}</p>
                                                    </b>
                                                    <table class="table table-striped custom-table datatable">
                                                        <thead>
                                                            <tr style="background:#95b6da">
                                                                <th>Name</th>
                                                                <th>Client ID</th>
                                                                <th>Reason</th>
                                                                <th>Date</th>
                                                                <th>Doctor</th>
                                                                <th>Status</th>
                                                                <th class="text-right">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="#" class="avatar"><img
                                                                                src="{{ asset($result->img_url) }}"
                                                                                alt=""></a>
                                                                        <a href="#">{{ $result->fname }}
                                                                            {{ $result->lname }}</a>
                                                                    </h2>
                                                                </td>
                                                                <td>PAT-00{{ $result->patient_id }}</td>
                                                                <td>{{ $p_appoi->reason }}</td>
                                                                <td>{{ $p_appoi->created_at }}</td>
                                                                <td>{{ $pat_reviw_doctor[$appo_id] }}
                                                                    <br>DOC-00{{ $p_appoi->doctor_id }}
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown action-label">
                                                                        <a href="#"
                                                                            class="btn btn-white btn-sm btn-rounded  "
                                                                            data-toggle="dropdown" aria-expanded="false">
                                                                            @if ($p_appoi->status == 'Accepted')
                                                                                <i
                                                                                    class="fa fa-dot-circle-o text-success"></i>
                                                                                {{ $p_appoi->status }}
                                                                        </a>
                                                                    @elseif($p_appoi->status == 'Rejected')
                                                                        <i class="fa fa-dot-circle-o text-danger"></i>
                                                                        {{ $p_appoi->status }} </a>
                                                                    @elseif($p_appoi->status == 'Pending')
                                                                        <i class="fa fa-dot-circle-o text"></i>
                                                                        {{ $p_appoi->status }} </a>
                                                                    @elseif($p_appoi->status == 'Completed')
                                                                        <i class="fa fa-circle text"></i>
                                                                        {{ $p_appoi->status }} </a>
                                                                    @else
                                                                        <i class="fa fa-dot-circle-o "></i>
                                                                        !!?{{ __('Unknown') }} </a>
                                        @endif


                                    </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon  " data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>

                                    </tr>


                                    </tbody>
                                    </table>



                                </div>

                                @include('patient.includes.patient_reviews')
                            </div>
                            <br>
                            @endforeach
                        </div>
                    </div>




                </div>

                {{-- /ALL appointment --}}

                <!-- pending appoinments -->
                <div class="tab-pane" id="pending_tasks">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table table-striped custom-table datatable">
                                    <thead>
                                        <tr style="background:#95b6da">
                                            <th>Name</th>
                                            <th>Patient ID</th>
                                            <th>Reason</th>
                                            <th>Date</th>
                                            <th>Doctor</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pat_appoi as $p_appoi)
                                            @if ($p_appoi->status == 'Pending')
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar"><img
                                                                    src="{{ asset($result->img_url) }}"
                                                                    alt=""></a>
                                                            <a href="#">{{ $result->fname }}
                                                                {{ $result->lname }}</a>
                                                        </h2>
                                                    </td>
                                                    <td>PAT-00{{ $result->patient_id }}</td>
                                                    <td>{{ $p_appoi->reason }}</td>
                                                    <td>{{ $p_appoi->created_at }}</td>
                                                    <td>Abdulnoor SHamiri <br>DOC-00{{ $p_appoi->doctor_id }}</td>
                                                    <td>
                                                        <div class="dropdown action-label">
                                                            <a href="#"
                                                                class="btn btn-white btn-sm btn-rounded  "
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                @if ($p_appoi->status == 'Accepted')
                                                                    <i class="fa fa-dot-circle-o text-success"></i>
                                                                    {{ $p_appoi->status }}
                                                            </a>
                                                        @elseif($p_appoi->status == 'Rejected')
                                                            <i class="fa fa-dot-circle-o text-danger"></i>
                                                            {{ $p_appoi->status }} </a>
                                                        @elseif($p_appoi->status == 'Pending')
                                                            <i class="fa fa-dot-circle-o text"></i>
                                                            {{ $p_appoi->status }} </a>
                                                        @elseif($p_appoi->status == 'Completed')
                                                            <i class="fa fa-circle text"></i>
                                                            {{ $p_appoi->status }} </a>
                                                        @else
                                                            <i class="fa fa-dot-circle-o "></i>
                                                            !!?{{ __('Unknown') }} </a>
                                            @endif


                            </div>
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon  " data-toggle="dropdown"
                                        aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            @endif
                            @endforeach

                            </tbody>






                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /pending appoinments -->
            <!-- Completed appoinments -->

            <div class="tab-pane" id="completed_tasks">
                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr style="background:#95b6da">
                                        <th>Name</th>
                                        <th>Client ID</th>
                                        <th>Reason</th>
                                        <th>Date</th>
                                        <th>Doctor</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    @foreach ($pat_appoi as $p_appoi)
                                        {{-- {{$p_appoi->status}} --}}
                                        @if ($p_appoi->status == 'Completed')
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar"><img
                                                                src="{{ asset($result->img_url) }}" alt=""></a>
                                                        <a href="#">{{ $result->fname }} {{ $result->lname }}</a>
                                                    </h2>
                                                </td>
                                                <td>PAT-00{{ $result->patient_id }}</td>
                                                <td>{{ $p_appoi->reason }}</td>
                                                <td>{{ $p_appoi->created_at }}</td>
                                                <td>{{ $pat_reviw_doctor[$appo_id] }}
                                                    <br>DOC-00{{ $p_appoi->doctor_id }}
                                                </td>

                                                <td>
                                                    <div class="dropdown action-label">
                                                        <a href="#"
                                                            class="btn btn-white btn-sm btn-rounded  "
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            @if ($p_appoi->status == 'Accepted')
                                                                <i class="fa fa-dot-circle-o text-success"></i>
                                                                {{ $p_appoi->status }}
                                                        </a>
                                                    @elseif($p_appoi->status == 'Rejected')
                                                        <i class="fa fa-dot-circle-o text-danger"></i>
                                                        {{ $p_appoi->status }} </a>
                                                    @elseif($p_appoi->status == 'Pending')
                                                        <i class="fa fa-dot-circle-o text"></i>
                                                        {{ $p_appoi->status }} </a>
                                                    @elseif($p_appoi->status == 'Completed')
                                                        <i class="fa fa-circle text"></i>
                                                        {{ $p_appoi->status }} </a>
                                                    @else
                                                        <i class="fa fa-dot-circle-o "></i>
                                                        !!?{{ __('Unknown') }} </a>
                                        @endif


                        </div>
                        </td>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon  " data-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        </tr>
                        @endif
                        @endforeach

                        </tbody>






                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed appoinments -->
    </div>


    </div>
    </div>

    <!-- /Task Tab -->


    <!-- Projects Tab -->

    <div id="myprojects" class="tab-pane fade show ">
        <div class="row">
        </div>
    </div>
    <!-- /Projects Tab -->


    </div>
    </div>
    </div>
@endsection
