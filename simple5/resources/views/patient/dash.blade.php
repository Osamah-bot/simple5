@extends('patient.layouts.app')

@section('dash')
    <div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Welcome {{ $patient_name }}!</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-user-md" style="font-size:48px;color:rgb(33, 43, 194)"></i></span>
								<div class="dash-widget-info">
									<h3>4</h3>
									<span>Doctors</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class='fa fa-calendar' style='font-size:38px;color:red'></i></span>
								<div class="dash-widget-info">
									<h3>4</h3>
									<span>Appointments</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class="fa fa-calendar"></i></span>
								<div class="dash-widget-info">
									<h3>10</h3>
									<span>Reviews</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
						<div class="card dash-widget">
							<div class="card-body">
								<span class="dash-widget-icon"><i class='fas fa-first-aid' style='font-size:48px;color:red'></i></i></span>
								<div class="dash-widget-info">
									<h3>4</h3>
									<span>Drugs</span>
								</div>
							</div>
						</div>
					</div>
				</div>





			</div>

@stop
