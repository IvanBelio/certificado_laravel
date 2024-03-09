<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */


    public function __invoke(Request $request)
    {

        $alumnos = Alumno::all();
        $n = rand (1,100);
        return view('saludo', ['n' => $n, "alumnos" => $alumnos]);

    }
}
