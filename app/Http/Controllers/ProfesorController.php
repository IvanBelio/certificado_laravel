<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfesorRequest;
use App\Http\Requests\UpdateProfesorRequest;
use App\Models\Profesor;
use Illuminate\Support\Facades\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = Profesor::paginate(5);
        $page = Request::get("page") ?? 1;
        return view("profesores.listado", ["profesores" => $profesores, "page" => $page]);           
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("profesores.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfesorRequest $request)
    {
        $valores = $request->input();
        $profesor = new Profesor($valores);
        $profesor->save();
        $profesores = Profesor::all();
        session()->flash("status","Se ha creado el profesor $profesor->nombre");
        return view ("profesores.listado",["profesores"=>$profesores]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $profesor = Profesor::find($id);
        $page = Request::get("page");
        return view("profesores.editar", ["profesor"=>$profesor, "page"=>$page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfesorRequest $request, $id)
    {
        $page = Request::get("page");
        $profesor = Profesor::find($id);
        $valores = $request->input(); //Leo los valores del formulario
        $profesor->update($valores);
        $profesores = Profesor::paginate(5);
        session()->flash("status", "Se ha actualizado  el profesor $profesor->nombre");// Flash permite crear una variable de sesión estatus en el servidor que tiene un tiempo de vida de un solo uso.
        return response()->redirectTo(route("profesores.index", ["page"=>$page]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)


    {
        $page = Request::get("page");
        $profesor = Profesor::find($id); //Find en este caso es igual que select * from profesor where profesor=id
        $profesor->delete();
        $profesores = Profesor ::paginate(5);
        session()->flash("status", "Se ha borrado $profesor->nombre");
        return response()->redirectTo(route("profesores.index", ["page"=>$page]));
    }
}