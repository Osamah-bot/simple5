@extends('patient.layouts.app')
@push('styles')
    <!-- Template Main CSS File -->
    <link href="{{ asset('assetsindex/css/style.css') }}" rel="stylesheet">
@endpush

@push('scripts')
@endpush
@section('addappi')

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Make an Appointment</h2>
            </div>

            @if ($result->img_url)
                <div class="profile-img">
                    <a href="#" class="avatar"><img alt="ERROR"
                            src="{{ asset('storage/patient_images/' . $result->img_url) }}"></a>
                </div>
            @else
                <div class="profile-img">
                    <a href="#" class="avatar"><img alt="ERROR"
                            src="{{ asset('storage/patient_images/user.png') }}"></a>
                </div>
            @endif

            <form action="{{ route('patientappoi.store') }}" method="POST" role="form" class="php-email-form">
                @csrf
                <h4>Patient Info</h4>
                <div class="row">
                    <input type="hidden" value={{ $doctor_id }} name="doctor_id">
                    <div class="col-md-4 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars"
                            value="{{ $result->fname . ' ' . $result->lname }}" readonly>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" d
                            ata-rule="email" data-msg="Please enter a valid email" value="{{ $result->email }}" readonly>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{ $result->mobile }}"
                            readonly>
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <input type="datetime-local" name="date" class="form-control datepicker" id="date"
                            placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars"
                            value="{{ old('date') }}">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="paidmoney" id="" class="form-select">
                            <option value="">Paid Money </option>
                            <option value="Paid">Yes</option>
                            <option value="NotPaid">No</option>

                        </select>
                        <div class="validate"></div>
                    </div>


                    <!-- appoinement status (Pending  ,Approved ,Completed ,Rejected ,Started ) -->
                    <div class="col-md-4 form-group mt-3">
                        <select name="Appoinement_Status" id="Appoinement_Status" class="form-select"
                            style="display: none;">
                            <option value="">Appoinement Status </option>
                            <option value="Approved">Approved</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <option value="Started">Started</option>
                            <option value="Reject">Reject</option>

                        </select>
                        <div class="validate"></div>
                    </div>


                </div>

                <div class="form-group mt-3">
                    <textarea class="form-control" name="reason" rows="4" placeholder="Appoinement Reason * "
                        value="{{ old('reason') }}"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
                </div>
                <input type="hidden" name="patient_id" value="{{ $result->patient_id }}">

                <div class="text-center"><button type="submit">Make an Appointment</button></div>
            </form>

        </div>
    </section><!-- End Appointment Section -->
@stop
