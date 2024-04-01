<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumnos;

class AlumnoController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:ver-estudiante | crear-estudiante | editar-estudiante | borrar-estudiante')->only('index');
        $this->middleware('permission:crear-estudiante', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-estudiante', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-estudiante', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $blogs = alumnos::paginate(5);
        return view('alumnos.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'numeroDeControl' => 'required',
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'semestre' => 'required',
        ]);
    
        alumnos::create($request->all());
    
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(alumnos $alumnos )
    {
        return view('alumnos.editar',compact('alumnos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alumnos $alumnos)
    {
        request()->validate([
            'numeroDeControl' => 'required',
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'semestre' => 'required',
        ]);
    
        $alumnos->update($request->all());
    
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( alumnos $alumnos)
    {
        $alumnos->delete();
    
        return redirect()->route('alumnos.index');
    }
}
