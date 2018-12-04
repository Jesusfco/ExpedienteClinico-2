@extends('layouts.visitor')

@section('content')
<!-- Banner -->
<section id="banner">
	<h2>TecnoMedics</h2>
	<p>Revolucionando tu salud.</p>
	<ul class="actions special">
		<li><a href="login" class="button primary">Iniciar sesion</a></li>
		<li><a href="#" class="button">Registrarse</a></li>
	</ul>
</section>

<!-- Main -->
<section id="main" class="container">

	<section class="box special">
		<header class="major">
			<h2>Servir es un privilegio, servir bien, es una obligacion <br />
			Buscando atender las necesidades de la sociedad</h2>
			<p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc ornare<br />
			adipiscing nunc adipiscing. Condimentum turpis massa.</p>
		</header>
		<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
	</section>

	<section class="box special features">
		<div class="features-row">
			<section>
				<span class="icon major fa-bolt accent2"></span>
				<h3>Magna etiam</h3>
				<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
			</section>
			<section>
				<span class="icon major fa-area-chart accent3"></span>
				<h3>Ipsum dolor</h3>
				<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
			</section>
		</div>
		<div class="features-row">
			<section>
				<span class="icon major fa-cloud accent4"></span>
				<h3>Sed feugiat</h3>
				<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
			</section>
			<section>
				<span class="icon major fa-lock accent5"></span>
				<h3>Enim phasellus</h3>
				<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
			</section>
		</div>
	</section>

	<div class="row">
		<div class="col-6 col-12-narrower">

			<section class="box special">
				<span class="image featured"><img src="images/pic05.jpg" alt="" /></span>
			  <h3>Sed lorem adipiscing</h3>
				<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
				<ul class="actions special">
					<li><a href="#" class="button alt">Learn More</a></li>
				</ul>
		  </section>

		</div>
		<div class="col-6 col-12-narrower">

			<section class="box special">
				<span class="image featured"><img src="images/pic04.jpg" alt="" /></span>
			  <h3>Accumsan integer</h3>
				<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
				<ul class="actions special">
					<li><a href="#" class="button alt">Learn More</a></li>
				</ul>
			</section>

		</div>
	</div>

</section>

<!-- CTA -->
<section id="cta">

	<h2>Sign up for beta access</h2>
	<p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc.</p>

	<form>
		<div class="row gtr-50 gtr-uniform">
			<div class="col-8 col-12-mobilep">
				<input type="email" name="email" id="email" placeholder="Email Address" />
			</div>
			<div class="col-4 col-12-mobilep">
				<input type="submit" value="Sign Up" class="fit" />
			</div>
		</div>
	</form>

</section>


@endsection				

		


		
