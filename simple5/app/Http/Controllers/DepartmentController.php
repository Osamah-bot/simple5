<?php

namespace App\Http\Controllers;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {
            if ($request->ajax()) {
                $data = Specialty::get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('img_url', function ($row) {
                        $src = asset('storage/departments_imgs/dept.png');
                        if (!empty($row->specialty_img)) {
                            $src = asset('storage/departments_imgs/'.$row->specialty_img);
                        }
                        return '<img src="' . $src . '" class="avatar-img rounded-circle" width="30%" /"> '.$row->specialty_name.' ';
                    })
                    ->addColumn('action', function ($row) {

                        $action = '<a class="btn btn-info"  href="appointmentlist/' . $row->specialty_id . '">Show</a>
            <a class="btn btn-success" href="/admin/patient/editepatient/' . $row->specialty_id . '">Edit </a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a id="delete-user" data-id=' . $row->specialty_id . ' class="btn btn-danger delete-user">Delete</a>';
                        return $action;
                    })
                    ->rawColumns(['img_url', 'action'])
                    ->make(true);
            }

            return view('admin.department.depts');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('admin.department.add');
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
            'deptname' => 'required|max:255',
            'deptdescription' => ['required','String','max:255'],
            'deptstate' => ['required', 'string', 'max:8'],
            'avatar' => 'nullable|file|image|mimes:jpg,jpeg,gif,png',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $imageName = null;
        //$imageName = time().'.'.$request->image->extension();
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('storage/departments_imgs'), $imageName);
        }
        $offer = Specialty::create([
            'specialty_name' => $request->deptname,
            'specialty_description' =>$request->deptdescription,
            'specialty_img' => $imageName,
            'status' => $request->deptstate,
        ]);
            if ($offer)
            {
                return redirect()->back()->with('success','Department Added Successfully ');
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
}
