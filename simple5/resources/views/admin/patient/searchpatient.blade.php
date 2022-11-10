@extends('admin.admin_index')

@section('page-header')

<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Patients</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
									<li class="breadcrumb-item active">Patients</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add Patient </a>
								<div class="view-icons">
									<a href="#" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
									<a href="#" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
								</div>
							</div>
						</div>
					</div>
					

@endsection


@section('patientsinfo')

					<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="/patientprofile" class="avatar"><img alt="ERROR" src="{{asset($result->img_url)}}"></a>
								<?php //	src="'.asset("storage/purchases/".$purchase->image).'" ?>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
								</div>
								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="#">{{$result->fname}} </a></h4>
								<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="#"> {{$result->lname}}</a></h5>
								<div class="small text-muted">Patient</div>
								<input type="hidden" name="_token" value="'.csrf_token().'" />
								<a href="#" class="btn btn-white btn-sm m-t-10">Treatements</a>
								<a href="{{route('admin.patientprofile',$result->patient_id)}}" class="btn btn-white btn-sm m-t-10">View Profile</a>
							</div>
						</div>

											
			
@endsection    



@section('edite_patient') 

<div id="edit_client" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Patient</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">First Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="{{$result->fname}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Last Name</label>
												<input class="form-control" type="text" value="{{$result->lname}}">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Email <span class="text-danger">*</span></label>
												<input class="form-control floating" placeholder="example@gmail.com" type="email" value="{{$result->email}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Phone </label>
												<input class="form-control" type="text" value="{{$result->mobile}}" >
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Password</label>
												<input class="form-control" type="password" value="{{$result->mobile}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Confirm Password</label>
												<input class="form-control" type="password">
											</div>
										</div>
										
										<div class="col-md-6">  
											<div class="form-group">
												<label class="col-form-label">Client BIRTHDATE <span class="text-danger">*</span></label>
												<div class="cal-icon">
													<input class="form-control datetimepicker" type="date" value="{{$result->birth}}">
												</div>
											</div>
										</div>
										 
										
										
										

										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Patient City</label>
												<input class="form-control" type="text" value="{{$result->city}}">
											</div>
										</div>

										
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Patient Zone </label>
												<input class="form-control" placeholder="Write zone or village any address" type="text" value="{{$result->zone}}">
											</div>
										</div>

										
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Patient Image </label>
												<input class="form-control"  type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" >
											</div>
										</div>

									</div>

                                
								
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
@endsection