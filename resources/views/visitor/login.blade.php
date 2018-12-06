@extends('layouts.visitor2')

@section('title', 'Login') 
@section('content')

<br><br>
<section id="main" class="container medium">
	<header>
		<h2>INICIA TU SESIÓN</h2>
		<p>Revolucionando tu salud</p>
	</header>
	<div class="box">
		<form method="post" action="">
                {{ csrf_field() }}
			<div class="row gtr-50 gtr-uniform">
				<div class="col-6 col-12-mobilep">
					<input type="email" name="email" id="nombre" value="" placeholder="Correo Electronico" required/>
				</div>
				<div class="col-6 col-12-mobilep">
					<input type="password" name="password" id="correo" value="" placeholder="Contraseña" required/>
				</div>
				
				<div class="col-12">
					<ul class="actions special">
						<button class="button fit"  id="Send">Iniciar Sesión</button>
					</ul>
				</div>
			</div>
        </form>
        <a href="resetPassword">¿Olvidaste tu contraseña?</a>
	</div>
</section>

@endsection
