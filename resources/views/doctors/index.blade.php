@extends('layouts.panel')

@section('content')
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Médicos</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('doctors/create') }}" class="btn btn-sm btn-success">Nuevo Médico</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @if (session('notification'))
        <div class="alert alert-success" role="alert">
          <strong>{{ session('notification') }}</strong>
        </div> 
        @endif       
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">E-mail</th>
              <th scope="col">Cédula</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($doctors as $doctor)
            <tr>
              <th scope="row">
                {{ $doctor->name }}
              </th>
              <td>
                {{ $doctor->email }}
              </td>
              <td>
                {{ $doctor->cedula }}
              </td>
              <td>
                <form action="{{ url('/doctors/'.$doctor->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/doctors/'.$doctor->id.'/edit') }}" class="btn btn-sm btn-info">Editar</a>
                  <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-body">
        {{ $doctors->links() }}
      </div>
    </div>
@endsection
