<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumnos; // Asegúrate de que el nombre del modelo coincide con el archivo y uso
use Illuminate\Support\Arr;

class AlumnoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-estudiante|crear-estudiante|editar-estudiante|borrar-estudiante')->only('index');
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
        //Con paginación
        $alumnos = alumnos::paginate(5);
        return view('Alumnos.index', compact('alumnos'));
        // Recuerda poner en el index.blade.php de alumnos el código para paginación {!! $alumnos->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Alumnos.crear');
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
            'numeroDeControl' => 'required|numeric',
            'nombre' => 'required|string|max:50',
            'apellidoPaterno' => 'required|string|max:50',
            'apellidoMaterno' => 'required|string|max:50',
            'semestre' => 'required|integer|between:1,14',
        ]);

        alumnos::create($request->all());

        return redirect()->route('Alumnos.index')->with('success', 'Alumno creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Esta función podría ser usada para mostrar detalles específicos del alumno si se requiere
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  alumnos $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(alumnos $alumno)
    {
        return view('Alumnos.editar', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  alumnos $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $alumno)
    {
        // Validar el ID del alumno
        $alumno = Alumnos::where('numeroDeControl', $alumno)->firstOrFail();

      

        // Redirect back to the list with a success message
        return redirect()->route('Alumnos.index')->with('success', 'Alumno actualizado con éxito');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  alumnos $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($numeroDeControl)
    {
        $alumno = alumnos::findOrFail($numeroDeControl);
        $alumno->delete();

        return redirect()->route('Alumnos.index')->with('success', 'Alumno eliminado con éxito');
    }
}
