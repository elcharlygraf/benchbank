@extends('layouts.webmaster')
	@section('titulo')
		@parent
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
			<section class="cabecera_cont">
				<span class="cabecera_pregunta">¿Qué estas buscando?</span>
				<span class="subtitulo">Elige tu producto a calcular</span>
			</section>	

			<section id="bgcontent">
				<div class="botonesServicios">

					<div class="blockPrestamos">
						<figure id="figureicon_prestamos"></figure>	
						<div class="block_prestamos">
						<a href="prestamos">Préstamos</a> 
						</div>
					</div>

					<div class="blockDepositos">
						<figure id="figureicon_depositos"></figure>
						<div class="block_depositos">
							<a href="depositos">Depósitos a plazos</a>
						</div>
					</div>

				</div>
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