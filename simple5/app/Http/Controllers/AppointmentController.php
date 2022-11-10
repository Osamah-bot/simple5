<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AppointmentController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index(Request $request) {
        {
            if ($request->ajax()) {
              $data= Review::with('appointment')
           ->join('appointment','appointment.appo_id', '=','review.appo_id')
           ->join('doctor','appointment.doctor_id', '=','doctor.doctor_id')
           ->join('patient','appointment.patient_id', '=','patient.patient_id')

           ->get();
              return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function ($row) {
                    if ($row->review_state=='Pending')
                    {
                        $action = '
                            <a class="btn btn-success" href="appoinement/admin-accept-review/'. $row->review_id.'">Accept </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a id="delete-review" data-id='. $row->review_id . ' href="appoinement/admin-reject-review/'. $row->review_id.'"
                            class="btn btn-danger delete-user">Reject</a>
                            <a id="delete-user" data-id='. $row->review_id . ' href="<appoinement/admin-delete-review/'. $row->review_id.'"
                            class="btn btn-danger delete-user">Delete</a>';

                    } else
                    {
                        $action = '<a class="btn" >'.$row->review_state.' </a>';
                    }
                      return $action;
                  })
                  ->addColumn('doctor_fname', function ($row) {
                    $doctor_fname =date($row->doctor_id);
                    return $doctor_fname;
                })
                  ->addColumn('review_date', function ($row) {
                    $review_date =date($row->review_date);
                    return $review_date;
                })
                  ->rawColumns(['action'])
                  ->make(true);
          }
          return view('admin.appoilist');

  }
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create(Request $request) {
                if ($request->ajax()) {
                $data = Patient::get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('img_url', function ($row) {
                        $src = asset('storage/patient_images/user.png');
                        if (!empty($row->img_url)) {   $src = asset('storage/patient_images/'.$row->img_url); }
                        return '<img src="' . $src . '" class="avatar-img rounded-circle" width="20%" /> '.$row->fname.' '.$row->lname.' ';   })
                    ->addColumn('action', function ($row) {
                        $action = '<a class="btn btn-info"  href="add' . $row->patient_id . '">Select</a>';
                        return $action; })
                    ->rawColumns(['img_url', 'action'])->make(true);}
                   return view('admin.patient.addappoi'); }

    public function create3(Request $request) {
        {
            if ($request->ajax()) {
                $data = Patient::get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('img_url', function ($row) {
                        $src = asset('storage/patient_images/user.png');
                        if (!empty($row->img_url)) {
                            $src = asset('storage/patient_images/'.$row->img_url);}
                        return '<img src="' . $src . '" class="avatar-img rounded-circle" width="20%" /> '.$row->fname.' '.$row->lname.' ';})
                    ->addColumn('action', function ($row) {
                        $action = '<a class="btn btn-info"  href="/accountant/createappoi/' . $row->patient_id . '">Select</a>';
                        return $action;})
                    ->rawColumns(['img_url', 'action'])
                    ->make(true);}
            return view('accountant.addappoi');
        }
    }

    public function create5(Request $request) {
        {
            if ($request->ajax()) {
                $data = Doctor::get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('img_url', function ($row) {
                        $src = asset('storage/doctor_images/user.png');
                        if (!empty($row->img_url)) {
                            $src = asset('storage/doctor_images/'.$row->img_url);}
                        return '<img src="' . $src . '" class="avatar-img rounded-circle" width="20%" /> '.$row->fname.' '.$row->lname.' ';})
                    ->addColumn('action', function ($row) {
                        $action = '<a class="btn btn-info"  href="/patient/createappoi2/'.$row->doctor_id.'">Select</a>';
                        return $action;
                    })->rawColumns(['img_url', 'action'])->make(true);}
            return view('patient.addappoi');
        }
    }
    public function create4($id) {
        $result = Patient::find( $id );
        $doctorsname = Doctor::select( 'fname', 'lname', 'doctor_id','img_url' )->get();
        $room = Room::all();
        return view( 'accountant.addappoi2', compact( 'result', 'doctorsname', 'room' ) );
    }

    public function create6($id) {
$patient_account_id=auth()->user()->account_id;
$patient_id=Patient::where('account_id','=',$patient_account_id)->value('patient_id');
$result=Patient::find($patient_id);
$doctor_id=$id;
        return view( 'patient.addappoi2',compact('result','doctor_id'));
    }

    public function create2( $id ) {
        $result = Patient::find( $id );
        $doctorsname = Doctor::select( 'fname', 'lname', 'doctor_id' )->get();
        $room = Room::all();
        return view( 'admin.patient.addappoi2', compact( 'result', 'doctorsname', 'room' ) );
    }



    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $v = Validator::make( $request->all(), [
            'reason'=>'required|max:255',
            'date'=>'required|date:255',
        ] );
        if ( $v->fails() )
        {
          return redirect()->back()->withInput()->withErrors( $v->errors() );
        }
        $store_appoinement = Appointment::create( [
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'reason' => $request->reason,
            'status' => 'Pending',
        ] );
        $appo_id = $store_appoinement->appo_id;
        $store_review = Review::create( [
            'appo_id' =>$appo_id,
            'review_reason' =>$request->reason,
            'review_state' =>'Pending',
            'review_date' =>$request->date,
        ] );
        return redirect()->back()->with( 'success', 'Your Appoinement Review Was Successfully Submited' );
         }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
    }

    public function showReviews( $id ) {
        //
        return $pat_reviw = Appointment::find( $id )->reviews;
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
    }
}
