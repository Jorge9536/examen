<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('index', compact('estudiantes')); // Cambiado de 'estudiantes.index' a 'index'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create'); // Cambiado de 'estudiantes.create' a 'create'
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'carnet_identidad' => 'required|string|unique:estudiantes|max:20',
            'edad' => 'required|integer|min:1|max:150',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|unique:estudiantes|max:255',
            'estado' => 'boolean'
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        return view('show', compact('estudiante')); // Cambiado de 'estudiantes.show' a 'show'
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        return view('edit', compact('estudiante')); // Cambiado de 'estudiantes.edit' a 'edit'
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'carnet_identidad' => 'required|string|max:20|unique:estudiantes,carnet_identidad,' . $estudiante->id,
            'edad' => 'required|integer|min:1|max:150',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|max:255|unique:estudiantes,email,' . $estudiante->id,
            'estado' => 'boolean'
        ]);

        $estudiante->update($request->all());

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