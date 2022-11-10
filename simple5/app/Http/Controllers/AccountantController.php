<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Accountant;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Review;
use Yajra\DataTables\DataTables;
class AccountantController extends Controller
{

    public function dash(Request $request)
    {
        $account_id=auth()->user()->account_id;
          if ($request->ajax()) {
            $data= Review::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
     if ($row->review_state=='Pending')
     {
     $action = '
        <a class="btn btn-success" href="accountant/accountant-accept-review/'. $row->review_id.'">Accept </a>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <a id="delete-review" data-id='. $row->review_id . ' href="accountant/accountant-reject-review/'. $row->review_id.'"
        class="btn btn-danger delete-user">Reject</a>';
        } else { $action = '<a class="btn" >'.$row->review_state.' </a>';}
                    return $action;
                 })
                ->addColumn('review_date', function ($row) {
                    $review_date =date($row->review_date);
                    return $review_date;
                })
                ->addColumn('pat_fname', function ($row) {
                    $src = asset('storage/doctor_images/user.png');
                    if (!empty($row->appointment->patient->img_url)) {
                        $src = asset('storage/patient_images/'.$row->appointment->patient->img_url);
                    }
                    return '<img src="' . $src . '" class="avatar-img rounded-circle" width="20%" /> '.$row->appointment->patient->fname.' '.$row->appointment->patient->lname.' ';
                    })
                ->addColumn('doc_fname', function ($row) {
                        return $row->appointment->doctor->fname;
                        })
                ->rawColumns(['action','pat_fname','doc_fname'])
                ->make(true);
        }
        return view('accountant.dash');
    }


    public function patientList(Request $request)
    {
        if ($request->ajax()) {
            $data = Patient::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('img_url', function ($row) {
                    $src = asset('storage/doctor_images/user.png');
                    if (!empty($row->img_url)) {
                        $src = asset('storage/patient_images/'.$row->img_url);
                    }
                    return '<img src="' . $src . '" class="avatar-img rounded-circle" width="10%" /> '.$row->fname.' '.$row->lname.' ';
                })
                ->addColumn('action', function ($row) {

                    $action = '<a class="btn btn-info"  href="#">Show</a>
        <a class="btn btn-success" href="#">Edit </a>
        <meta name="csrf-token" content="{{ csrf_token() }}">';
                    return $action;
                })
                ->rawColumns(['img_url', 'action'])
                ->make(true);
        }

        return view('accountant.patientlist');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('add_patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function acceptReview($id)
    {
$review=Review::find($id);
$review->review_state='Accepted';
$review->save();
return redirect()->back()->with('success','review accepted successfully');
    }

    public function rejectReview($id)
    {
$review=Review::find($id);
$review->review_state='Rejected';
$review->save();
return redirect()->back()->with('success','review Rejected successfully');
    }
}
