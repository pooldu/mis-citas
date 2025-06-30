<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{

    public function index()
    {
        $patients = User::patients()->paginate(5);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    private function performValidation(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:30', 'not_regex:/^\d+$/'],
            'email' => ['required', 'email', 'max:100'],
            'cedula' => ['nullable', 'digits:10'],
            'address' => ['nullable', 'string', 'min:5', 'max:100'],
            'phone' => ['nullable', 'regex:/^[0-9]{10}$/'],
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto.',
            'name.min' => 'El nombre debe tener mínimo 3 caracteres.',
            'name.max' => 'El nombre no debe superar 30 caracteres.',
            'name.not_regex' => 'El nombre no puede contener solo números.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo válido.',
            'email.max' => 'El correo no debe superar 100 caracteres.',

            'cedula.digits' => 'La cédula debe tener exactamente 10 dígitos.',

            'address.string' => 'La dirección debe ser un texto.',
            'address.min' => 'La dirección debe tener al menos 5 caracteres.',
            'address.max' => 'La dirección no debe superar 100 caracteres.',

            'phone.regex' => 'El teléfono debe tener exactamente 10 dígitos numéricos.',
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->performValidation($request);   

        User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
            + [
                'role' => 'patient',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $notification = 'El paciente se ha registrado correctamente.';
        return redirect('/patients')->with(compact('notification'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $patient = User::patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, string $id)
    {
        $this->performValidation($request); 

        $user = User::patients()->findOrFail($id);

        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');
        $password = $request->input('password');
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        
        $user->fill($data);
        $user->save();

        $notification = 'La información del paciente se ha modificado correctamente.';
        return redirect('/patients')->with(compact('notification'));
    }

    public function destroy(User $patient)
    {
        $deletedPatient = $patient->name;
        $patient->delete();
        $notification = "El paciente $deletedPatient se ha eliminado correctamente.";
        return redirect('/patients')->with(compact('notification'));
    }
}
