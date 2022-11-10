<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <title>CMS-CARE YOUR SELFE </title>



		@stack('styles')
        @stack('scripts')

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo2.png')}}">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

			<!-- Bootstrap Icone -->
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

		<!-- Lineawesome CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">


		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

		<!-- Summernote CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote-bs4.css')}}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

<script>
error=false

function validate()
{
if(document.userForm.name.value !='' && document.userForm.email.value !='' )
document.userForm.btnsave.disabled=false
else
document.userForm.btnsave.disabled=true
}
</script>
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">



			<!-- Header -->

@include('includes.header')

			<!-- /Header -->

			<!-- Sidebar -->

 @include('includes.client_sidebar')

			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->

				@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
	@if(session()->has('success'))

 <br> <br> <br> <br>
		<div class="alert alert-success" id="success_msg" style="display:inline;">
		{{session()->get('success')}}
		</div>
	@endif


				@yield('addappi')

				@yield('dash')
                <div class="content container-fluid">
				@yield('patient_appoi')

					<!-- Page Header -->

			@yield('page-header')

					<!-- /Page Header -->

					<!-- Search Filter -->




					<!-- /Search Filter -->


					@yield('patient_profile')

					<div class="row staff-grid-row">

					@yield('patientsinfo')


					</div>
       </div>
				<!-- /Page Content -->

				<!-- Add Client Modal -->

@include('includes.add_patient')

@yield('add_patient')
				<!-- /Add Client Modal -->

				<!-- Edit Patient Modal -->


				<!-- /Edit Patient Modal -->

				<!-- Delete Client Modal -->
				<div class="modal custom-modal fade" id="delete_client" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Client</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Client Modal -->

            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->


		@yield('scriptss')


		<!-- jQuery -->
        <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

		<!-- Slimscroll JS -->
		<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

		<!-- Select2 JS -->
		<script src="{{asset('assets/js/select2.min.js')}}"></script>

		<!-- Custom JS -->
		<script src="{{asset('assets/js/app.js')}}"></script>

		<script>

    var url = "{{ route('lan.change') }}";
    //document.getElementById('changeLang').change(function(){
      //  window.location.href = url + "?lang=" + $(this).val();
    $('.changeLang').change(function(){
      window.location.href = url + "?lang=" + $(this).val();
    });
		</script>


    </body>

		@stack('scripts3')
</html>
