@extends('layouts.vistaAdmin')

@section('title','Admin-Usuarios')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

{{-- <div id="content"> --}}
	<div class="container">
		  <section class="py-5">
				<h2 class="font-weight-bold mb-0"><i class="bi bi-person-plus-fill"></i>&nbsp; Crear USUARIO</h2>
				<p class="lead text-muted">Revisa el contenido</p>
			</section>

            <div class="container-fluid" class="block mb-8">
                <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
            </div>

			<br>



	  <!-- Content FORMULARIO CREATE -->
			<div class="container-fluid">
				<form method="post" action="{{ route('users.store') }}" class="form-neon" autocomplete="off">
					@csrf
					<fieldset>
						<legend><i class="bi bi-person-fill"></i> &nbsp; Información personal</legend>
						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-12">
									<div class="form-group">
										<label for="name">Nombre y Apellido</label>
										<input type="text" name="name" id="name" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}"   value="{{ old('name', '') }}">
                                        @error('name')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
								</div>


								<div class="col-12 col-md-12">
                                    <br>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" name="email" id="email"  class="form-control"  value="{{ old('email', '') }}">
                                        @error('email')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
									</div>
								</div>

                                <div class="col-12 col-md-12">
                                    <br>
									<div class="form-group">
										<label for="password" value="{{ __('Contraseña') }}">Contraseña</label>
										<input type="password" name="password" id="password"  class="form-control">
                                        @error('password')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
									</div>
								</div>




                                <div class="col-12 col-md-12">
                                    <br>
									<div class="form-group">
										<label for="roles">Role</label>
                                        <select name="roles[]" id="roles" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                            @foreach($roles as $id => $role)
                                                <option value="{{ $id }}"{{ in_array($id, old('roles', [])) ? ' selected' : '' }}>{{ $role }}</option>
                                            @endforeach
                                        </select>
                                        @error('roles')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror

									</div>
								</div>



							</div>

							</div>

							<br><br>

							{{-- BOTONES --}}
                            <div class="container-fluid">
                                <ul class="full-box list-unstyled page-nav-tabs">
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary"><i class="bi bi-save-fill"></i>&nbsp; CREAR</button>
                                    </div>
                                </ul>
                            </div>

						</div>
					</fieldset>

				</form>
        </section>
      </div>
</div>
</div>


@endsection
