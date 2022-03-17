<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Yajra\Datatables\Datatables;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titles = Title::get();
        if($request->ajax())
        {
            return DataTables::of(Title::query())
            ->addColumn('action',function($title){
                $button = '<a href="/dashboard/properties/titles/'.$title->slug.'/edit" class="btn btn-warning border-0 btn-sm" role="button"><i class="bi bi-pencil"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<form action="/dashboard/properties/titles/'.$title->slug.'" method="POST" class="d-inline">'.csrf_field().''.method_field("DELETE").'<button type="submit" class="btn btn-danger border-0 btn-sm" onclick="return confirm(\'Do you want to delete title '.$title->name.'?\')"><i class="bi bi-trash"></i></button></form>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('dashboard.properties.titles.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.properties.titles.create',[
            'titles' => Title::all()
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
            'name' => 'required|max:255|unique:titles',
            'slug' => 'required|unique:titles',
            'disable' => 'required',
            'view' => 'required',
            'add' => 'required',
            'edit' => 'required',
            'delete' => 'required',
            'download' => 'required',
        ]);

        Title::create($validatedData);
        
        return redirect('/dashboard/properties/titles')->with('Success','New title has been added!');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        return view('dashboard.properties.titles.edit',[
            'title' => $title,
            'titles' => Title::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        $rules=[
            'disable' => 'required',
            'view' => 'required',
            'add' => 'required',
            'edit' => 'required',
            'delete' => 'required',
            'download' => 'required',
        ];

        if($request->name != $title->name){
            $rules['name'] = 'required|max:255|unique:titles';
        }
        elseif($request->slug != $title->slug){
            $rules['slug'] = 'required|unique:titles';
        }
        
        $validatedData = $request->validate($rules);

        Title::where('id', $title->id)
                ->update($validatedData);

        return redirect('/dashboard/properties/titles')->with('Success','Title properties has been updated!');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        Title::destroy($title->id);
        return redirect('/dashboard/properties/titles')->with('Success','Title has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Title::class,'slug',$request->name);
        return response()->json(['slug' => $slug]);
    }
}
