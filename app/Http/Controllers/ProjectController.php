<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function show(Project $project)
    {
        return Inertia::render('ProjectDetails', [
            'project' => $project
        ]);
    }
}
