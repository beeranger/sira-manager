<?php

namespace App\Http\Controllers;

use App\Models\Edu;
use App\Models\User;
use App\Models\Group;
use App\Models\Title;
use App\Models\Gender;
use App\Models\Employee;
use App\Models\Certification;
use App\Models\Field_Area;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employee=Employee::get();
        if($request->ajax())
        {
            return DataTables::of(Employee::query())
            ->addColumn('action',function($employee){
                $button = '<a href="/dashboard/employees/'.$employee->nip.'" class="btn btn-info border-0 btn-sm" role="button"><i class="bi bi-eye"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="/dashboard/employees/'.$employee->nip.'/edit" class="btn btn-warning border-0 btn-sm" role="button"><i class="bi bi-pencil"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<form action="/dashboard/employees/'.$employee->nip.'" method="POST" class="d-inline">'.csrf_field().''.method_field("DELETE").'
                            <button type="submit" class="btn btn-danger border-0 btn-sm" onclick="return confirm(\'Do you want to delete data of employee named '.$employee->name.'?\')"><i class="bi bi-trash"></i></button></form>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        if ($request->ajax()) 
        {
            $model = Employee::with('group','title');
            return DataTables::eloquent($model)
            ->addColumn('group', function ($employee){
                return $employee->group_id->category;
            })
            ->addColumn('title', function ($employee){
                return $employee->title_id->name;
            })
            ->toJson();
        }
        return view('dashboard.employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employees.create',[
            'employees' => Employee::all(),
            'titles' => Title::all(),
            'edus' => Edu::all(),
            'genders' => Gender::all(),
            'groups' => Group::all(),
            'certifications' => Certification::all(),
            'field_areas' => Field_Area::all()        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required|max:16|unique:employees',
            'address' => 'required|max:255',
            'email' => 'required|unique:employees|email:dns',
            'phone' => 'required|max:12|unique:employees',

            'education_id_1' => 'required',
            // 'education_id_2' => 'required',
            'field_area_id_1' => 'required',
            // 'field_area_2' => 'required',
            // 'certification_id_1' => 'required',
            // 'certification_id_2' => 'required',
            // 'certification_id_3' => 'required',
            // 'institution_1' => 'required',
            // 'institution_2' => 'required',
            // 'institution_3' => 'required',

            'gender_id' => 'required',
            'religion' => 'required',
            'npwp' => 'max:16',
            'nip' => 'required|max:7|unique:employees',
            'group_id' => 'required',
            'title_id' => 'required',
            'join_date' => 'required',
            'birth_date' => 'required',
        ]);

        Employee::create($validatedData);
        return redirect('/dashboard/employees')->with('Success','New employee has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('dashboard.employees.show',[
            'employee' => $employee,
            'titles' => Title::all(),
            'edus' => Edu::all(),
            'genders' => Gender::all(),
            'groups' => Group::all(),
            'certifications' => Certification::all(),
            'field_areas' => Field_Area::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('dashboard.employees.edit',[
            'employee' => $employee,
            'employees' => Employee::all(),
            'titles' => Title::all(),
            'edus' => Edu::all(),
            'genders' => Gender::all(),
            'groups' => Group::all(),
            'certifications' => Certification::all(),
            'field_areas' => Field_Area::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'name' => 'max:255',
            'address' => 'max:255',
            // 'education_id' => 'required',
            'gender_id' => 'required',
            'religion' => 'required',
            'npwp' => 'max:16',
            'nuptk' => 'max:16',
            'group_id' => 'required',
            'title_id' => 'required',
            'join_date' => 'required',
            'birth_date' => 'required',
        ];

        if($request->nik != $employee->nik){
            $rules['nik'] = 'required|max:16|unique:employees';
        }
        elseif($request->email != $employee->email){
            $rules['email'] = 'required|email:dns|unique:employees';
        }
        elseif($request->nip != $employee->nip){
            $rules['nip'] = 'required|max:7|unique:employees';
        }
        elseif($request->phone != $employee->phone){
            $rules['phone'] = 'required|max:12|unique:employees';
        }
        
        $validatedData = $request->validate($rules);

        Employee::where('id', $employee->id)
                ->update($validatedData);

        return redirect('/dashboard/employees')->with('Success','Employee data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);
        return redirect('/dashboard/employees')->with('Success','Employee data has been deleted!');
    }
}
