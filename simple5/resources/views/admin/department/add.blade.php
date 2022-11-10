@extends('admin.admin_index')
@section('page-header')

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Department</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Department</li>
                </ul>
            </div>

        </div>
    </div>

@endsection

@section('add_patient')

    <div id="#" class="" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action={{ route('admin.adddept') }}>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label"> Department name <span
                                            class="text-danger">*</span></label>
                                    <input name="deptname" class="form-control" type="text" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Department Description</label>
                                    <textarea name="deptdescription" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                </div>
                            </div>


                            {{-- Status --}}
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label class="col-form-label">Department Status</label>
                                    <select name="deptstate" id="gender" class="form-control">
                                        <option value="{{ old('deptstate') }}"></option>
                                        <option value="Active">Active</option>
                                        <option value="Inctive">Inctive</option>
                                    </select>

                                </div>
                            </div>
                            {{-- /Status --}}

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>
                        </div>



                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">CREATE DEPARTMENT</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
