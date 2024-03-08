<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::paginate(5);
        return view("alumnos.listado", ["alumnos" => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("alumnos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $valores = $request->input();
        $alumno = new Alumno($valores);
        $alumno->save();
        $alumnos = Alumno::all();
        return view("alumnos.listado", ["alumnos" => $alumnos]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view("alumnos.show", ["alumno" => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view("alumnos.editar", ["alumno" => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        /* Recojo todos lso inputs del formulario
            $request que es la solicitud trae con ella un formulario con datos
            Es como $_POST['nombre] de antes */
        $valores = $request->input(); // Leo los valores del formulario
        $alumno->update($valores);
        $alumnos = Alumno::paginate(5); // Recupero los dattos a al vista para que los muetre en una taba
        // Entrego esos dtso a la vista paa que los muestre en una tabla
        return view("alumnos.listado", ["alumnos" => $alumnos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        $alumnos = Alumno::paginate(5);
        return back();
    }
}
