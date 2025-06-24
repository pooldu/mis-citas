<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    private function performValidation(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:30', 'min:3', 'not_regex:/^\d+$/'],
        ], 
        [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto.',
            'name.max' => 'El nombre no debe superar 30 caracteres.',
            'name.min' => 'El nombre debe tener mínimo 3 caracteres.',
            'name.not_regex' => 'El nombre no puede contener solo números.',
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->performValidation($request);        

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); //insert
        $notification = 'La especialidad se ha registrado correctamente.';
        return redirect('/specialties')->with(compact('notification'));;
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty  $specialty)
    {
        //dd($request->all());
        this->performValidation($request);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); //update
        $notification = 'La especialidad se ha modificado correctamente.';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {
        $deletedSpecialty = $specialty->name;
        $specialty->delete();
        $notification = 'La especialidad '. $deletedSpecialty .' se ha eliminado correctamente.';
        return redirect('/specialties')->with(compact('notification'));
    }


}
