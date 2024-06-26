<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;

use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        // Formatta la data corrente nel formato desiderato (GG/MM/AAAA)
        $formattedStartDate = Carbon::now()->format('d/m/Y');
        $formattedEndDate = Carbon::now()->addDays(30)->format('d/m/Y');

        return view('admin.projects.create', compact('formattedStartDate', 'formattedEndDate', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $validatedData = $request->validated();

        // Caricamento del file thumb
        if ($request->hasFile('thumb')) {
            $validatedData['thumb'] = $request->file('thumb')->store('thumbnails', 'public');
        }

        Project::create($validatedData);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        $project = Project::findOrFail($id);
        $validatedData = $request->validated();

        // Verifica se è stata selezionata una tipologia
        if (isset ($validatedData['type_id'])) {
            // Recupera la tipologia associata al progetto
            $type = Type::findOrFail($validatedData['type_id']);

            // Assegna la tipologia al progetto
            $project->type()->associate($type);
        }

        // Aggiorna il progetto con i dati validati
        $project->update($validatedData);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
