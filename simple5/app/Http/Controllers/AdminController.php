<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Requests\OfferRequest;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;
use app\Models\Admin;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
      use RegistersUsers;
    //    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo2 = RouteServiceProvider::HOME2;
    public function __construct()
    {

        //   $this->middleware('account-access');
          $this->middleware('auth');
          //$this->middleware('guest')->except('logout');
    }

    public function index()
     {
       return view('admin.dash');
     }

     public function patientList(Request $request)
     {
        if ($request->ajax()) {
            $data = Patient::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('img_url', function ($row) {
                    $src = asset('storage\patient_images/user.png');
                    if (!empty($row->img_url)) {
                        $src = asset('storage\patient_images/'.$row->img_url);
                    }
                    return '<img src="'.$src.'" class="avatar-img rounded-circle" width="20%" /> '.$row->fname.' '.$row->lname.' ';
                })
                ->addColumn('action', function ($row) {

                    $action = '<a class="btn btn-info"  href="appointmentlist/' . $row->patient_id . '">Show</a>
        <a class="btn btn-success" href="/admin/patient/editepatient/' . $row->patient_id . '">Edit </a>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <a id="delete-user" href="/admin/patient/deletepatient/'. $row->patient_id.'" class="btn btn-danger delete-user">Delete</a>
        <meta name="csrf-token" content="{{ csrf_token() }}">';
                    return $action;
                })
                ->rawColumns(['img_url', 'action'])
                ->make(true);
        }

        return view('admin.patient.patientlist');
    }

    public function changPatientPass(Request $request)
    {
        $v = Validator::make($request->all(), [
            'pass' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);
        if ($v->fails())
         {
            //return redirect()->back()->withErrors($v->errors());
            return redirect()->back()->withInput()->withErrors($v->errors());
         }
         $account_id=$request->account_id;
         if ($account_id==null)
         {
            return redirect()->back()->withInput()->withErrors('This patient does not have account');
            //  return redirect()->back()->with('success', 'This patient does not have account');
         }
        $patient_account=Account::find($account_id);
        $patient_account->password=Hash::make($request->pass);
        $offer=$patient_account->save();
        if ($offer)
        {
            return redirect()->back()->with('success', 'Password Update Successfully');
        }
    }
     public function get_Add_Patient()
     {
       return view('add_patient');
     }

     public function save_Add_Patient( )
     {

     $data['name']= $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $data['email']= $email=$_POST['email'];
      $phone=$_POST['phone'];
      $pass=$_POST['pass'];
      $confpass=$_POST['confpass'];
      $birth=$_POST['birth'];
      $city=$_POST['city'];
      $zone=$_POST['zone'];
      validator($data);
      $account= Account::create([
            'email' => $email,
            'password' => Hash::make($pass),
        ]);

      $offer= Patient::create([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone,
            'birth' => $birth,
            'city' => $city,
            'zone' => $zone,
            // 'password' => Hash::make($pass),
        ]);







//         if ($offer)
//         return response()->json([
//             'status' => true,
//             'msg' => 'تم الحفظ بنجاح',
//         ]);

//     else
//         return response()->json([
//             'status' => false,
//             'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
//         ]);


      //      return Validator::make($data, [
      //       'name' => ['required', 'string', 'max:255'],
      //       'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
      //       'password' => ['required', 'string', 'min:8', 'confirmed'],
      //   ]);

     }


     protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
     }




}
