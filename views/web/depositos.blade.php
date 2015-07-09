@extends('layouts.webmaster')
	@section('titulo')
		BENCHBANK.COM | DEPOSITOS
	@stop

	@section('jscss')
	<link  href="{{ asset('assets/css/estilosBench.css') }}" rel="stylesheet" />
	<link  href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link  href="" rel="image_src"/>
	<link  href="" rel="shourt_ico" />
	<script src="{{ asset('assets/js/modernizr.custom.js') }}"></script>
	<meta name="description" content="BENCHBANK.COM | Compara Tasas, préstamos, plazos de banco en sistemas financieros ">
	<meta name="Keywords" content="Tasa, préstamos, plazo,banco, sistema financiero, comparar">
	@stop
@section('header')	
	@parent
@stop

@section('cuerpo')

			<section class="cabecera_deposito">
				<div class="leftbox">
					<figure class="icondeposito"></figure>
					<span class="titulo_deposito">
					Depósitos
					</span>
				</div>	
				
				<div class="rightbox">
					<nav class="recorrido">
						<ul id="recorrido_nav">
							<li><a href="/">Inicio</a> &#187; </li>
                            <li><a href="{{ URL::route('productos') }}">Productos</a> &#187; </li>
							<li>Depósitos</li>
						</ul>
					</nav>
				</div>
			</section>
			<aside class="banner_deposito"></aside>	
			
			<div class="transition_deposito">
				<span class="first_subtitulo_deposito">Tus opciones.</span>
				<span class="second_subtitulo_deposito">Tu decisión.</span>
				<br><br>
				<ul id="numeric_transition">
					<li>
						<a href="#" class="active_transition">1</a> 
						
					</li>
						<span class="lineclass"> </span>
					<li>
						<a href="#">2</a>

					</li>
						<span class="lineclass"> </span>
					<li><a href="#">3</a></li>
				</ul>
			</div>
	
			<section class="boxopciones">
				<a href="depositos/fondosmutuos">
					<div id="boxdeposito_opciones" class="boxfondos"></div>
				</a>

				<a href="depositos/ahorro">
				<div id="boxdeposito_opciones" class="boxahorros"></div>
				</a>

				<a href="depositos/cts">
				<div id="boxdeposito_opciones" class="boxcts"></div>
				</a>

				<a href="depositos/depositosplazo">
				<div id="boxdeposito_opciones" class="boxdeposito"></div>
				</a>
				<br>
			</section>
@stop


@section('footer')
	@parent
@stop	

@section('script')
	<script src="{{ asset('assets/js/jquery-1.11.2.min.js')}}"></script> 
	<script src="{{ asset('assets/js/aload.min.js')}}"></script>	
	<script>
		window.onload = function () {
		  aload();
		};
	</script>
	<script>
	$(document).ready(function(){
		//PRESTAMOS
		$(".block_prestamos").mouseover(function(event)
   		{
   			$("#figureicon_prestamos").addClass("figureicon_prestamos");
   			$("#bgcontent").addClass("bgprestamos");
   		});

		$(".block_prestamos").mouseout(function(event){
			$("#figureicon_prestamos").removeClass("figureicon_prestamos");
			$("#bgcontent").removeClass("bgprestamos");
		});

		//DEPOSITOS
		$(".block_depositos").mouseover(function(event)
   		{
   			$("#figureicon_depositos").addClass("figureicon_depositos");
   			$("#bgcontent").addClass("bgpdepositos");
   		});

		$(".block_depositos").mouseout(function(event){
			$("#figureicon_depositos").removeClass("figureicon_depositos");
			$("#bgcontent").removeClass("bgpdepositos");
		});

	});
	</script>
	<script src="{{ asset('assets/js/jquery.dlmenu.js')}}"></script> 
	<script>	
		$(function() {
			$( '#dl-menu' ).dlmenu();
			
		});
	</script>	
@stop	