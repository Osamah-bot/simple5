<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Account;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
//use Datatables;
use Yajra\DataTables\DataTables;

class DoctoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

     public function acceptReview(Request $request)
     {

     }

    public function dash(Request $request)
    {
        // $id =Patient::where('account_id','=',$account_id)->value('patient_id');
        $account_id=auth()->user()->account_id;
        $doc_id=Doctor::where('account_id','=',$account_id)->value('doctor_id');
          if ($request->ajax()) {
            $data= Review::with('appointment')
         ->join('appointment','appointment.appo_id', '=','review.appo_id')
         ->join('patient','appointment.patient_id', '=','patient.patient_id')
         ->where('appointment.doctor_id','=',$doc_id)                                       //  ->where('review.review_state','=','Pending')
         ->get();
         return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
            if ($row->review_state=='Pending')
            {
                $action = '
                    <a class="btn btn-success" href="doctor/doc-accept-review/'. $row->review_id.'">Accept </a>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a id="delete-review" data-id='. $row->review_id . ' href="doctor/doc-reject-review/'. $row->review_id.'"
                    class="btn btn-danger delete-user">Reject</a>
                    <a id="delete-user" data-id='. $row->review_id . ' href="doctor/doc-delete-review/'. $row->review_id.'"
                    class="btn btn-danger delete-user">Delete</a>';

            } else
            {
                $action = '<a class="btn" >'.$row->review_state.' </a>';
            }
                    return $action;
                })
                ->addColumn('review_date', function ($row) {
                    $review_date =date($row->review_date);
                    return $review_date;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('doctor.dash');
    }


    public function index(Request $request)
    {
        // $result=Doctor::all();
        // return view('admin.doctor.doctor',compact('result'));
        if ($request->ajax()) {
            $data = Doctor::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('img_url', function ($row) {
                    $src = asset('storage/doctor_images/user.png');
                    if (!empty($row->img_url)) {
                        $src = asset('storage/doctor_images/'.$row->img_url);
                    }
                    return '<img src="'.$src.'" class="avatar-img rounded-circle" width="20%" /> '.$row->fname.' '.$row->lname.' ';
                })
                ->addColumn('action', function ($row) {
                    $action = '<a class="btn btn-info"  href="editdoctorprofile/' . $row->doctor_id . '">Show</a>
        <a class="btn btn-success" href="editdoctorprofile/' . $row->doctor_id . '">Edit </a>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <a id="delete-user" data-id=' . $row->doctor_id . ' class="btn btn-danger delete-user">Delete</a>';
                    return $action;
                })
                ->rawColumns(['img_url', 'action'])
                ->make(true);
        }
        return view('admin.doctor.doctorlist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department=Specialty::all();
        return view('admin.doctor.add_doctor', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'fname' => 'required|max:255',
            'lname' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
            'avatar' => 'nullable|file|image|mimes:jpg,jpeg,gif,png',
            //'email'=> ['required', 'string', 'email', 'max:255', 'unique:account'],
            'pass' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);

        if ($v->fails()) {
            //return redirect()->back()->withErrors($v->errors());
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $imageName = null;
        //$imageName = time().'.'.$request->image->extension();
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('storage/doctor_images'), $imageName);
        }
        $account = Account::create([
            'password' => Hash::make($request->pass),
            'email' => $request->email,
            'account_type'=>'Docor'
        ]);
        $account_id = $account->account_id;
        $offer = Doctor::create([
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
            'specialty_id ' => $request->specialty ,
            'img_url' => $imageName,
        ]);
        if ($offer) {
            return redirect()->back()->with('success', 'Doctor Added Successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Doctor::find($id);
        $department=Specialty::all();
        return view('admin.doctor.profile', compact('result','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
{
                $v = Validator::make($request->all(), [
                    'fname' => 'required|max:255',
                    'lname' => 'required|max:255',
                    'phone' => ['digits:9'],
                    'birth' => ['date'],
                    'city' => ['string','max:20'],
                    'zone' => ['string','max:20'],
                    'gender' => ['string','max:4'],
                    'avatar' => 'nullable|file|image|mimes:jpg,jpeg,gif,png',
                    //'email'=> ['required', 'string', 'email', 'max:255', 'unique:account'],
                    // 'pass' => ['required', 'string', 'min:8'],
                ]);

        if ($v->fails()) {
            //return redirect()->back()->withErrors($v->errors());
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $account_id=$request->account_id;
        if ($account_id==null)
        {
           return redirect()->back()->withInput()->withErrors('This Doctor does not have account');
        }
        $imageName = null;
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('storage/doctor_images'), $imageName);
        }
        $id =Doctor::where('account_id', '=', $account_id)->value('doctor_id');
        $doctor=Doctor::find($id);
        $doctor->mobile=$request->phone;
        $doctor->birth=$request->birth;
        $doctor->city=$request->city;
        $doctor->zone=$request->zone;
        $doctor->gender=$request->gender;
        $doctor->specialty_id=$request->specialty_id;
        $doctor->img_url=$imageName;
        $offer2=$doctor->save();
        if ($offer2) {
            return redirect()->back()->with('success', 'Update Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
