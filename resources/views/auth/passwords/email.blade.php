@extends('layouts.visitor2')

@section('content')

<br><br>
<section id="main" class="container medium">
	<header>
		<h2>¿Olvidaste tu contraseña?</h2>
		<p>Revolucionando tu salud</p>
	</header>
	<div class="box">
        @if (session('success'))
            <div class="alert alert-success">
                El correo de Recuperacion ha sido enviado
            </div>
        @endif
		<form method="post" action="">
                {{ csrf_field() }}
			<div class="row gtr-50 gtr-uniform">
				<div class="col-12 col-12-mobilep">
                    <input type="email" name="email" id="nombre" value="{{ old('email') }}" placeholder="Escribe tu correo Electronico" required/>
                    @if(session()->has('errorEmail'))
                    <span class="help-block">
                        <strong>Correo Inexistente</strong>
                    </span>
                @endif
				</div>
				
				
				<div class="col-12">
					<ul class="actions special">
						<button class="button fit"  id="Send">Recuperar Contraseña</button>
					</ul>
				</div>
			</div>
        </form>
        <a href="login">Inicia Sesión</a>
	</div>
</section>

@endsection
