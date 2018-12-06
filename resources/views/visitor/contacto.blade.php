@extends('layouts.visitor2')

@section('title', 'Contactanos') 
@section('content')

<!-- Main --><br><br>
<section id="main" class="container medium">
	<header>
		<h2>Contactanos</h2>
		<p>Hablanos acerca de lo que  piensas de nosotros</p>
	</header>
	<div class="box">
		<form method="post" action="#">
			<div class="row gtr-50 gtr-uniform">
				<div class="col-6 col-12-mobilep">
					<input type="text" name="name" id="nombre" value="" placeholder="Nombre" />
				</div>
				<div class="col-6 col-12-mobilep">
					<input type="email" name="correo" id="correo" value="" placeholder="Correo" />
				</div>
				<div class="col-12">
					<input type="text" name="Titulo" id="Titulo" value="" placeholder="Titulo" />
				</div>
				<div class="col-12">
					<textarea name="mensaje" id="mensaje" placeholder="Escribe tu mensaje" rows="6"></textarea>
				</div>
				<div class="col-12">
					<ul class="actions special">
						<li><input type="submit" id="Send" value="Enviar mensaje" /></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</section>


@endsection				


{{-- <br><br><br><br>
		
		<br><br>
		<BR><BR><BR> --}}