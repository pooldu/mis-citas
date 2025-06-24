@extends('layouts.guest')

@section('content')
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">

                @if ($errors->any())                
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                @else
                    <div class="text-center text-muted mb-4">
                        <small>{{ __('¿Olvidaste tu contraseña? No hay problema. Solo indícanos tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña y podrás elegir una nueva.') }}</small>
                    </div>
                @endif  
          
              <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">
                        {{ __('Envío de enlace de reestablecimiento') }}
                    </button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
