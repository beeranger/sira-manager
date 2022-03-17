<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Gender;
use App\Models\Year;
use App\Models\Classroom;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $student=Student::get();
        if($request->ajax())
        {
            return DataTables::of(Student::query())
            ->addColumn('action',function($student){
                $button = '<a href="/dashboard/students/'.$student->nis.'" class="btn btn-info border-0 btn-sm" role="button"><i class="bi bi-eye"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="/dashboard/students/'.$student->nis.'/edit" class="btn btn-warning border-0 btn-sm" role="button"><i class="bi bi-pencil"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<form action="/dashboard/students/'.$student->nis.'" method="POST" class="d-inline">'.csrf_field().''.method_field("DELETE").'
                            <button type="submit" class="btn btn-danger border-0 btn-sm" onclick="return confirm(\'Do you want to delete data of student named '.$student->name.'?\')"><i class="bi bi-trash"></i></button></form>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('dashboard.students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        return view('dashboard.students.create',[
            'students' => Student::all(),
            'genders' => Gender::all(),
            'years' => Year::all(),
            'classrooms' => Classroom::all()
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
            'nisn' => 'required|max:16|unique:students',
            'nis' => 'required|max:7|unique:students',
            'year_enrolled' => 'required',
            // 'year_graduated' => 'required',
            'status' => 'required',
            'nik' => 'required|max:16|unique:students',
            'birth_date' => 'required',
            'address' => 'required|max:255',
            'gender_id' => 'required',
            'religion' => 'required',
            'father_name' => 'required',
            'father_phone' => 'required',
            'father_occupation' => 'required',
            'father_income' => 'required',
            'mother_name' => 'required',
            'mother_phone' => 'required',
            'mother_occupation' => 'required',
            'mother_income' => 'required',
            // 'guardian_name' => 'required',
            // 'guardian_phone' => 'required',
            // 'guardian_occupation' => 'required',
            // 'guardian_income' => 'required',
            // 'guardian_relationship' => 'required',
            'kindergarten' => 'max:255',
            'elementary' => 'max:255',
            'juniorhs' => 'max:255'
        ]);

        Student::create($validatedData);
        return redirect('/dashboard/students')->with('Success','New student has been added!');
        // return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('dashboard.students.show',[
            'students' => Student::all(),
            'student' => $student,
            'genders' => Gender::all(),
            'years' => Year::all(),
            'classrooms' => Classroom::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('dashboard.students.edit',[
            'student' => $student,
            'students' => Student::all(),
            'genders' => Gender::all(),
            'years' => Year::all(),
            'classrooms' => Classroom::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $rules = [
            'name' => 'required|max:255',
            // 'nisn' => 'required|max:16|unique:students',
            // 'nis' => 'required|max:7|unique:students',
            'year_enrolled' => 'required',
            'year_graduated' => 'required',
            'status' => 'required',
            // 'nik' => 'required|max:16|unique:students',
            'birth_date' => 'required',
            'address' => 'required|max:255',
            'gender_id' => 'required',
            'religion' => 'required',
            'father_name' => 'required',
            'father_phone' => 'required',
            'father_occupation' => 'required',
            'father_income' => 'required',
            'mother_name' => 'required',
            'mother_phone' => 'required',
            'mother_occupation' => 'required',
            'mother_income' => 'required',
            'guardian_name' => 'required',
            'guardian_phone' => 'required',
            'guardian_occupation' => 'required',
            'guardian_income' => 'required',
            'guardian_relationship' => 'required',
            'kindergarten' => 'max:255',
            'elementary' => 'max:255',
            'juniorhs' => 'max:255'
        ];

        if($request->nik != $student->nik){
            $rules['nik'] = 'required|max:16|unique:students';
        }
        if($request->nis != $student->nis){
            $rules['nis'] = 'required|max:16|unique:students';
        }
        if($request->nisn != $student->nisn){
            $rules['nisn'] = 'required|max:16|unique:students';
        }
        $validatedData = $request->validate($rules);

        Student::where('id', $student->id)
                ->update($validatedData);

        return redirect('/dashboard/students')->with('Success','Student data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('dashboard/students')->with('Success','Student data has been deleted!');
    }
}
