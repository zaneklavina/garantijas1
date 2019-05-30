<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Contract;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderby('id','desc')->paginate(8);
        return view('layouts.projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kods'=>'required|unique:projects|size:8',
            'title'=>'required|max:191',
            'body'=>'required|max:191'
        ]);

        $project = new Project;
        $project->kods = $request->input('kods');
        $project->title = $request->input('title');
        $project->body = $request->input('body');
        $project->save();

        return redirect('/projects')->with('success', 'Projekts pievienots');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $project = Project::find($id);
        if (is_null($project)) {
            return view ('layouts.error');
        };
        return view('layouts.projects.show')->with('project', $project);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return view('layouts.error');
        };
        return view('layouts.projects.edit')->with('project', $project);
      
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
        $this->validate($request,[
            'kods'=>'required|size:8',
            'title'=>'required|max:191',
            'body'=>'required|max:191'
        ]);

        $project = Project::find($id);
        $project->kods = $request->input('kods');
        $project->title = $request->input('title');
        $project->body = $request->input('body');
        $project->save();

        return redirect('/projects')->with('success', 'Projekts veiksmīgi rediģēts');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $contract = Contract::where('project_id', '=', $id);
        $guarantee = Guarantee::where('project_id', '=', $id);
        if (is_null($project)) {
            return view('layouts.error');
        };
        if (is_null($contract && $guarantee)){
        $project->delete();
        return redirect('/projects')->with('success', 'Projekts izdzēsts');
    }else return redirect('/projects')->with('error', 'Projektu nevar izdzēst, jo projektam pastāv līgumi vai garantijas');
}
}