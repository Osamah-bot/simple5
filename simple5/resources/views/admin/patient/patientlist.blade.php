@extends('admin.admin_index')
@section('page-header')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{ __('messages.patients') }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('messages.patients') }}</li>
                </ul>
            </div>
            <div class="">
                <button class="d-sm-inline-block btn btn-sm btn-success"><a href="{{ route('admin.add_patient') }}"> <i
                            class="fa fa-plus"></i>{{ __('messages.addpatient') }}</a></button>
            </div>
            {{-- <div class="col-auto float-right ml-auto">
                <a href="{{ route('admin.add_patient') }}" id="new-patient" class="btn btn-success add-btn mb-2"><i
                        class="fa fa-plus"></i> New Patient </a>
                <div class="view-icons">
                    <a href="#" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                    <a href="#" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('patientsinfo')
    <div class="container-fluid">
        <div class="card shadow mb-4 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr id="">

                                <th widthxx="5%">Id</th>
                                <th widthxx="20%">Name</th>
                                <th widthxx="20%">mobile</th>
                                <th widthxx="20%">Email</th>
                                <th widthxx="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Add and Edit customer modal -->
    <div class="modal fade" id="crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form name="userForm">
                        <input type="hidden" name="user_id" id="user_id">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" onchange="validate()">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Email" onchange="validate()">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary"
                                    disabled>Save</button>
                                <a href="#" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Show user modal -->
    <div class="modal fade" id="crud-modal-show" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userCrudModal-show"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 ">

                            <table class="table-responsive ">
                                <tr height="50px">
                                    <td><strong>Name:</strong></td>
                                    <td id="sname"></td>
                                </tr>
                                <tr height="50px">
                                    <td><strong>Email:</strong></td>
                                    <td id="semail"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td style="text-align: right "><a href="#" class="btn btn-danger">OK</a> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts3')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.patientlist') }}",
                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {
                        data: 'patient_id',
                        name: 'patient_id'
                    },
                    {
                        data: 'img_url',
                        name: 'img_url',
                        orderable: false,
                        searchable: true
                    },
                    // {data: 'fname', name: 'fname'},
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            /* When click New customer button */
            $('#new-user').click(function() {
                $('#btn-save').val("create-user");
                $('#user').trigger("reset");
                $('#userCrudModal').html("Add New User");
                $('#crud-modal').modal('show');
            });

            /* Edit customer */
            $('body').on('click', '#edit-user', function() {
                var user_id = $(this).data('id');
                $.get('users/' + user_id + '/edit', function(data) {
                    $('#userCrudModal').html("Edit User");
                    $('#btn-update').val("Update");
                    $('#btn-save').prop('disabled', false);
                    $('#crud-modal').modal('show');
                    $('#user_id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);

                })
            });
            /* Show customer  */
            $('body').on('click', '#show-user', function() {
                var user_id = $(this).data('patient_id');
                $x = parseInt(user_id);
                document.location.href = "patientprofile/" + $x;
            });
            $('.btn-infodfdf').on('click', function() {
                windows.loation = "{{ route('admin.patient_appoi_list', 3) }}";
                document.location.href = "elkjdf";
            })

            /* Delete customer */
            $('body').on('click', '#delete-user', function() {
                var user_id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");
                confirm("Are You sure want to delete !");

                $.ajax({
                    type: "DELETE",
                    url: "http://localhost/laravelpro/public/users/" + user_id,
                    data: {
                        "id": user_id,
                        "_token": token,
                    },
                    success: function(data) {

                        //$('#msg').html('Customer entry deleted successfully');
                        //$("#customer_id_" + user_id).remove();
                        table.ajax.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

        });
    </script>
@endpush
