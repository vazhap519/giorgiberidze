<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::latest()->paginate(8);
        return Inertia::render('ProjectsPage', [
            'projects' => $projects
        ]);
    }
    public function show(Project $project)
    {
        return Inertia::render('ProjectDetails', [
            'project' => $project
        ]);
    }
}
