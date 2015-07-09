<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="BENCHBANK.COM | Compara Tasas, préstamos, plazos de banco en sistemas financieros ">
	<meta name="Keywords" content="Tasa, préstamos, plazo,banco, sistema financiero, comparar">
	<meta name="author" content="inspiraaccion.com">
<title>
@section('titulo')	
	BenchBank
@show
</title>
@section('jscss')	
	<link  href="{{ asset('assets/css/estilosBench.css') }}" rel="stylesheet" />
	<link  href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link  href="" rel="image_src"/>
	<link  href="" rel="shourt_ico" />
	<script src="{{ asset('assets/js/modernizr.custom.js') }}"></script>
	<link href="{{ asset('assets/css/bootstrapp.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-slider.css') }}" rel="stylesheet">
@show 
</head>
<body>
@section('header')	
	<header id="inicio">
		<div class="contenedor">			
				<div class="empresa">		
					<figure class="logo"><img src="{{asset('assets/img/logo.jpg')}}" alt=""></figure>
						<p>Bench <strong>Bank</strong></p>						
				</div>
										
				<div id="dl-menu" class="dl-menuwrapper menu-m">
					<button id="opn-menu">Open Menu</button>
					<ul class="dl-menu list">
						<li> <a id="btn-inicio" href="/">INICIO</a> </li>
						<li> <a id="btn-quees"href="http://benchbank.com.pe/#quees">¿QUÉ ES?</a> </li>
						<li> <a id="btn-formulario" href="http://benchbank.com.pe/#formulario">CONTACTO</a> </li>					
					</ul>
				</div>
				<nav class="menu-l">
					<a id="btn-inicio" href="/">INICIO</a> </li>
						<li> <a id="btn-quees"href="http://benchbank.com.pe/#quees">¿QUÉ ES?</a> </li>
						<li> <a id="btn-formulario" href="http://benchbank.com.pe/#formulario">CONTACTO</a> </li>
				</nav>
				<div class="redes-sociales">
					<a class="icon-facebook" href="https://www.facebook.com/pages/BenchBank/825216317505314" target="_black"></a>
					<a class="icon-twitter" href="#"></a>
				</div>
				<div class="login">
					<a href="#">Login</a>
				</div>								
			</div>			
	</header>
@show

<main id="cuerpo">	
@section('cuerpo')
	<!--Cuerpo-->
@show
</main>

@section('footer')
		<footer>
			<div class="contenedor">
				<div class="blf b1">
					<h2>CONTÁCTANOS</h2>
					<hr class="lineaM">					
						<a href="mailto:JORGEDEZA82@GMAIL.COM">JORGEDEZA82@GMAIL.COM</a>
						<p>
						+51 979 884 899
					</p>
				</div>
				<hr class="separador">
				<div class="blf b2">
					<h2>ENCUÉNTRANOS</h2>
					<hr class="lineaM">
					<a href="https://itunes.apple.com/us/app/id883402414" target="_black">Iphone</a>
					<a href="https://play.google.com/store/apps/details?id=com.deza.benchbank&hl=es_419" target="_black">Android</a>		
					
				</div>
				<hr class="separador">
				<div class="blf b3">
					<h2>SÍGUENOS</h2>
					<hr class="lineaN">
					<a href="https://www.facebook.com/pages/BenchBank/825216317505314" target="_black">Facebook</a>
					<a href="">Twitter
					</a>
				</div>
			</div>
		</footer>
@show

@section('script')	
	<script type='text/javascript' src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('assets/js/bootstrap-slider.js')}}"></script>
    <script type='text/javascript'>
    	$(document).ready(function() {
			$("#ex6").slider();
			$("#ex6").on('slide', function(slideEvt) {
				$("#ex6SliderVal").val(slideEvt.value);
			});
    });
    </script>
	<script src="{{asset('assets/js/jquery.dlmenu.js')}}"></script>
	<script>
		$(function() {
			$( '#dl-menu' ).dlmenu();

		});
	</script>
@show		
</body>
</html>