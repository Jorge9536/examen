<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Requests\EstudianteRequest; // Importar el Request
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstudianteRequest $request) // Cambiar a EstudianteRequest
    {
        // La validación se hace automáticamente en EstudianteRequest
        Estudiante::create($request->validated());

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstudianteRequest $request, Estudiante $estudiante) // Cambiar a EstudianteRequest
    {
        // La validación se hace automáticamente en EstudianteRequest
        $estudiante->update($request->validated());

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado exitosamente.');
    }
}