@extends('layouts.visitor2')

@section('content')

<br><br>
<section id="main" class="container medium">
	<header>
		<h2>Recupera tu contraseña</h2>
		<p>Escribe tu nueva contraseña</p>
	</header>
	<div class="box">
        
		<form method="post" action="">
                {{ csrf_field() }}
			<div class="row gtr-50 gtr-uniform">
				<div class="col-6 col-12-mobilep">
                    <label>Correo</label>
                    <input style="background: gray" type="email" name="email" id="nombre"  value="{{ $email or old('email') }}" disabled>
                    
				</div>
				
				
				<div class="col-6 col-12-mobilep">
                    <label>Nueva Contraseña</label>
                    <input type="password" name="password" id="nombre" value="{{ old('email') }}" placeholder="*******" required/>					
                </div>
                
                <div class="col-12">
                    <ul class="actions special">
                        <button class="button fit"  id="Send">Resetear Contraseña</button>
                    </ul>
                </div>

			</div>
        </form>
        <a href="login">Inicia Sesión</a>
	</div>
</section>


@endsection
