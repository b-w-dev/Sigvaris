<?php

namespace App\Http\Controllers\Doctor;

use App\Especialidad;
use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorEspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($doctor)
    {
        $doctore = Doctor::find($doctor);
        return view('doctorespecialidad.index', ['doctor'=>$doctore]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($doctore)
    {
        $doctor = Doctor::find($doctore);
        return view('doctorespecialidad.create', ['doctor'=>$doctor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $doctor)
    {
        $doc = Doctor::find($doctor);
        $doc->especialidades()->create($request->all());
        return view('doctorespecialidad.index', ['doctor'=>$doc]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function show($doctor, $especialidad)
    {
        $especial = Especialidad::find($especialidad);
        return view('doctorespecialidad.show', ['doctor'=>$especial->doctor, 'especialidad'=>$especial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit($doctor, $especialidad)
    {
        $especial = Especialidad::find($especialidad);
        return view('doctorespecialidad.edit', ['doctor'=>$especial->doctor,'especialidad'=>$especial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $doctor, $especialidad)
    {
        $especial = Especialidad::find($especialidad);
        $especial->nombre = $request->input('nombre');
        $especial->cedula = $request->input('cedula');
        $especial->save();
        return redirect()->route('doctores.especialidades.index', ['doctor'=>$especial->doctor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($doctor, $especialidad)
    {
        $espe = Especialidad::find($especialidad);
        $espe->delete();
        return redirect()->route('doctores.especialidades.index', ['doctor'=>$doctor]);
    }
}
