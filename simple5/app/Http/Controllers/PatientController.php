<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;
use App\Models\Doctor;
use App\Models\Review;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // protected $redirectTo = 'patient';

    public function a()
    {
        $result = Patient::all();
        return view('admin.patient.index', compact('result'));
    }

    public function index()
    {
        $account_id = auth()->user()->account_id;
        $id = Patient::where('account_id', '=', $account_id)->value('patient_id');
        auth()->user()->patient_id = $id;
        $result = Patient::find($id);
        $patient_name = $result->fname . ' ' . $result->lname;
        return view('patient.dash', compact('patient_name'));
    }

    public function appointmentList()
    {
        $account_id = auth()->user()->account_id;
        $id = Patient::where('account_id', '=', $account_id)->value('patient_id');
        $result = Patient::find($id);
        $pat_appoi = Appointment::where('patient_id', '=', $id)->get();
        $i = 0;
        //return $pat_appoi;
        $pat_reviw = null;
        $pat_reviw_doctor = null;
        foreach ($pat_appoi as $idd) {
            // print( '<br>' );
            // echo 'Appoi no: ', $i;
            // print( '<br>' );
            $pat_reviw[$idd->appo_id] = Appointment::find($idd->appo_id)->reviews;
            $pat_reviw_doctor[$idd->appo_id] = Doctor::find($idd->doctor_id)->value('fname', 'lname');
            $j = 0;
            if (!count($pat_reviw)) {
                // return count( $pat_reviw );
                foreach ($pat_reviw[$i] as $y) {
                    //     echo 'Review no: ', ++$j;
                    //     print( '<br>' );
                    //     //echo $y->review_reason;
                    //     print( '<br> **********' );
                    //    print( $y );
                    //     print( '<br>' );
                }
                $i++;
            }

            // print( '<br>' );
        }

        //return $pat_reviw;
        return view('patient.patient-appoi-list', compact('result', 'pat_appoi', 'pat_reviw', 'pat_reviw_doctor'));
    }

    public function appointmentList2(Request $request)
    {
        $patient_id = 2;
        // $account_id = auth()->user()->account_id;
        // $patient_id = Patient::where( 'account_id', '=', $account_id )->value( 'doctor_id' );

        $data = null;
        $data = Appointment::with('reviews')
        ->join('patient', 'patient.patient_id', '=', 'appointment.patient_id')
        ->where('appointment.patient_id', '=', $patient_id)                                       //  ->where( 'review.review_state', '=', 'Pending' )
        ->get();
foreach( $data as $d){
echo $d->review->review_state;
}
        // if (!$request->ajax()) {

        //     $data = Appointment::with('reviews')
        //         ->join('patient', 'patient.patient_id', '=', 'appointment.patient_id')
        //         ->where('appointment.patient_id', '=', $patient_id)                                       //  ->where( 'review.review_state', '=', 'Pending' )
        //         ->get();
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $action = '<a class="btn" >'. $row->review_state.' </a>';
        //             return $action;
        //         })
        //         ->addColumn('review_date', function ($row) {
        //             $review_date =date($row->review_date);
        //             return $review_date;
        //         })
        //         ->rawColumns(['action','review_date'])
        //         ->make(true);
        // }
        // return view('patient.patient-appoi-list2');
    }

    public function profile()
    {
        $success = '';
        $account_id = auth()->user()->account_id;
        $id = Patient::where('account_id', '=', $account_id)->value('patient_id');
        auth()->user()->patient_id = $id;
        $result = Patient::find($id);
        return view('patient.profile', compact('result', 'success'));
    }

    public function index2()
    {
        $result = Patient::all();
        return view('admin.patient.index', compact('result'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $success = '';
        return view('admin.patient.add_patient', compact('success'));
    }

    public function create2()
    {
        $success = '';
        return view('accountant.add_patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function store(Request $request)
    {

        $v = Validator::make($request->all(), [
            'fname' => 'required|max:255',
            'lname' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patient'],
            'avatar' => 'nullable|file|image|mimes:jpg,jpeg,gif,png',
            //'email'=> [ 'required', 'string', 'email', 'max:255', 'unique:account' ],
            'pass' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);

        if ($v->fails()) {
            //return redirect()->back()->withErrors( $v->errors() );
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $imageName = null;
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('storage/patient_images'), $imageName);
        }
        $account = Account::create([
            'password' => Hash::make($request->pass),
            'email' => $request->email,
            'account_type' => 'Patient',
        ]);
        $account_id = $account->account_id;
        $offer = Patient::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'account_id' => $account_id,
            'mobile' => $request->phone,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'country' => 'YE',
            'city' => $request->city,
            'zone' => $request->zone,
            'img_url' => $imageName,
        ]);

        if ($offer) {
            return redirect()->back()->with('success', 'Patient Info Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // $account_id = auth()->user()->account_id;
        // $id = Patient::where( 'account_id', '=', $account_id )->value( 'patient_id' );
        // auth()->user()->patient_id = $id;
        $result = Patient::find($id);
        $pat_appoi = Appointment::where('patient_id', '=', $id)->get();
        $i = 0;
        //return $pat_appoi;
        $pat_reviw = null;
        $pat_reviw_doctor = null;
        foreach ($pat_appoi as $idd) {

            // print( '<br>' );
            // echo 'Appoi no: ', $i;
            // print( '<br>' );
            $pat_reviw[$idd->appo_id] = Appointment::find($idd->appo_id)->reviews;
            $pat_reviw_doctor[$idd->appo_id] = Doctor::find($idd->doctor_id)->value('fname', 'lname');
            $j = 0;
            if (!count($pat_reviw)) {
                // return count( $pat_reviw );
                foreach ($pat_reviw[$i] as $y) {
                    //     echo 'Review no: ', ++$j;
                    //     print( '<br>' );
                    //     //echo $y->review_reason;
                    //     print( '<br> **********' );
                    //    print( $y );
                    //     print( '<br>' );
                }
                $i++;
            }

            // print( '<br>' );
        }

        //return $pat_reviw;
        return view('admin.patient.patient-appoi-list', compact('result', 'pat_appoi', 'pat_reviw', 'pat_reviw_doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $success = '';
        $result = Patient::find($id);
        return view('admin.patient.profile', compact('success', 'result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changPass(Request $request)
    {
        $v = Validator::make($request->all(), [
            'pass' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);
        if ($v->fails()) {
            //return redirect()->back()->withErrors( $v->errors() );
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $account_id = auth()->user()->account_id;
        $patient_account = Account::find($account_id);
        $patient_account->password = Hash::make($request->pass);
        $offer = $patient_account->save();
        if ($offer) {
            return redirect()->back()->with('success', 'Password Update Successfully');
        }
    }

    public function update(Request $request)
    {
        $v = Validator::make($request->all(), [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'phone' => ['digits:9'],
            'birth' => ['date'],
            'city' => ['string', 'max:20'],
            'zone' => ['string', 'max:20'],
            'gender' => ['string', 'max:4'],
            'avatar' => 'nullable|file|image|mimes:jpg,jpeg,gif,png',
        ]);
        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $imageName = null;
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('storage/patient_images'), $imageName);
        }

        $account_id = auth()->user()->account_id;
        if ($account_id == null) {
            return redirect()->back()->withInput()->withErrors('This patient does not have account');
        }
        $id = Patient::where('account_id', '=', $account_id)->value('patient_id');
        $patient = Patient::find($id);
        $patient->fname = $request->fname;
        $patient->lname = $request->lname;
        $patient->mobile = $request->phone;
        $patient->birth = $request->birth;
        $patient->city = $request->city;
        $patient->zone = $request->zone;
        $patient->gender = $request->gender;
        $patient->img_url = $imageName;
        $offer2 = $patient->save();
        if ($offer2) {
            return redirect()->back()->with('success', 'Update Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->back()->with('success', 'Patient Deleted successfully');
    }

    /**
     * Search the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $result = Patient::find($request->patientid);
        // return $result;
        return view('admin.patient.searchpatient', compact('result'));
    }
}
