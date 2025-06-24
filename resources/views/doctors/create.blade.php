@extends('layouts.panel')

@section('content')
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Nuevo Médico</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
          </div>
        </div>
      </div>
      <div class="card-body">
      	@if ($errors->any())
      		<div class="alert alert-danger" role="alert">
      			<strong>¡Ups! Algo salió mal:</strong>
      			<ul>
	      			@foreach ($errors->all() as $error)
	      				<li>{{ $error }}</li>
	      			@endforeach
      			</ul>
      		</div>      		
      	@endif
		<form action="{{ url('/doctors') }}" method="post">
			@csrf
			<div class="form-group">
				<label for="name">Nombre del médico</label>
				<input type="text" name="name" class="form-control" required value="{{ old('name') }}">
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="text" name="email" class="form-control" value="{{ old('email') }}">
			</div> 
			<div class="form-group">
				<label for="cedula">Cédula</label>
				<input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}">
			</div>
			<div class="form-group">
				<label for="address">Dirección</label>
				<input type="text" name="address" class="form-control" value="{{ old('address') }}">
			</div>
			<div class="form-group">
				<label for="phone">Telefono</label>
				<input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
			</div>
			 <button type="submit" class="btn btn-sm btn-primary">Guardar</button>    	
      	</form>
      </div>
    </div>

@endsection