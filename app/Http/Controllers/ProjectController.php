<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(5);

        return view('projects.index', compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

   
    public function create()
    {
        return view('projects.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'bgroup' => 'required',
            'ddate' => 'required'
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Donor details added successfully.');
    }

    
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
   
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'bgroup' => 'required',
            'ddate' => 'required'
        ]);
        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'details updated');
    }
   
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'donor deleted ');
    }


   


    public function search(Request $request){

        if($request->ajax()){
    
            $project=projects::where('name','Like','%'.$request->search.'%')
            ->orwhere('gender','Like','%'.$request->search.'%')
            ->orwhere('bgroup','Like','%'.$request->search.'%')
            ->get();

            foreach($project as $projects)
            {
                $output.=
                '<tr>
                <td>'.$project->name.'</td>
                <td>'.$project->age.'</td>
                <td>'.$project->gender.'</td>
                <td>'.$project->bgroup.'</td>
                <td>'.$project->ddate.'</td>

                </tr>';
            }
         
       
        }
       
    }
    
}


