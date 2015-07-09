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
	<script href="{{ asset('assets/js/modernizr.custom.js') }}"></script>
	<meta name="description" content="BENCHBANK.COM | Compara Tasas, préstamos, plazos de banco en sistemas financieros ">
	<meta name="Keywords" content="Tasa, préstamos, plazo,banco, sistema financiero, comparar">
	<meta name="author" content="inspiraaccion.com">
	@stop
@section('header')	
	@parent
@stop

@section('cuerpo')
			<div class="presentacion">
				<figure class="imgP"><a href="/"><img src="{{ asset('assets/img/banner.jpg') }}" alt="benchbank"></a></figure>
				<div class="descrip">
					<p>Prepárate para tomar <br>
					la mejor decisión.
					</p>
				</div>
				<div class="calculo">
					<a href="productos">
					HACER MI CALCULO
					</a>
				</div>
					
				<div class="movils">
					<a href="https://play.google.com/store/apps/details?id=com.deza.benchbank" target="_black"><img src="{{ asset('assets/img/Google-Play.png') }}" alt="Google Play"></a>
					<a href="https://itunes.apple.com/us/app/id883402414"><img src="{{ asset('assets/img/appstore_es.png') }}" alt="App Store"></a> 
					</div>
					
				</div>
				
			</div>			

			<div class="contenedor" id="quees">
				<div class="bloqueD">
					<div class="blc-descrip">
						<div class="dscrp">
							<p class="titulo">
								Con Bench Bank						
							</p>
							<strong>todo bajo control</strong>
							<p class="paraf">
								Aquí te presentamos <a href="https://www.youtube.com/watch?v=Zvj3p6MbZhA" target="_black"> el video introductorio</a> de nuestra herramienta, en el cual paso a paso te ayudamos a conocer de una manera práctica la funcionalidad de nuestra app.
							</p>
						</div>
					</div>
					<div class="content_video">						
						<div class="video">
							<iframe width="480" height="320" src="https://www.youtube.com/embed/Zvj3p6MbZhA?rel=0" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>

				<div class="bloqueU">
					<p>
						Compara los productos de las principales
					</p>
					<strong>Entidades del sistema financiero</strong>
				</div>
				<div class="bloqueD">
					<figure class="imgc"><img src="{{ asset('assets/img/img1.png') }}" alt="paso 1 "></figure>
					<div class="blc-descrip">
						<div class="dscrp">
							<p class="titulo">
								Todos los cálculos						
							</p>
							<strong>en tres pasos</strong>
							<p class="paraf">
								Para empezar a utilizar puedes descargar BenchBank en Google Store o en Apple Store, luego ingresar los datos que nuestra App solicita, como la elección del producto, su moneda y el importe del bien o importe del préstamo, plazo  según su inquietud o necesidad.
							</p>
						</div>
					</div>
				</div>
				<hr class="separador">
				<div class="bloqueD medio">
					<figure class="imgc"><img src="{{ asset('assets/img/img2.png') }}" alt="paso 2"></figure>
						<div class="blc-descrip">
							<div class="dscrp">
								<p class="titulo">
									Ingresa los datos						
								</p>
								<strong>para comparar</strong>
								<p class="paraf">
									Luego podrás ingresar datos más específicos como la cuota inicial (en Porcentaje(%) o Importe(S/. $.), plazo (meses o años), también tendrás la opción de dejar tus datos esto con la finalidad de recibir las ofertas más atractivas del sistema financiero (tasas, pre-aprobaciones en línea) .
								</p>
							</div>
						</div>
					</div>
				<hr class="separador">
				<div class="bloqueD ">
					<figure class="imgc"><img src="{{ asset('assets/img/img3.png') }}" alt="paso 3"></figure>
					<div class="blc-descrip">
						<div class="dscrp">
							<p class="titulo">
							Los resultados en 					
							</p>
							<strong>tiempo real</strong>
							<p class="paraf">
								Como resultado final obtendrás la comparación de todos  de los bancos en un solo sitio y desde tu dispositivo móvil ahorrándote tiempo, colas y brindándote referencias para tu mejor elección.
							</p>	
						</div>
						
					</div>
				</div>
				<div class="bloqueU">
					<p>
						Compara los productos de las principales
					</p>
					<strong>Entidades del sistema financiero</strong>
				</div>
				<div class="comentarios">
					<div class="testimonio">
						<figure><img src="{{ asset('assets/img/testi.png') }}" alt=""></figure>
						<div class="testi-descrip">
							<h3>Giancarlo <strong><span> / </span>12 julio 2014 20:05</strong></h3>
							<div class="estrellas">
								<p class="icon-star yellow"></p>
								<p class="icon-star yellow"></p>
								<p class="icon-star yellow"></p>
								<p class="icon-star yellow"></p>
								<p class="icon-star yellow"></p>
							</div>
							<p>
								Muy buena aplicación, siempre
								estuve buscando una solución
								como esta... sigan asi! 
							</p>
						</div>
					</div>
					<hr class="separador">
					<div class="testimonio">
						<figure><img src="{{ asset('assets/img/testi.png') }}" alt=""></figure>
						<div class="testi-descrip">
							<h3>Sebastian <strong><span> / </span>12 julio 2014 20:05</strong></h3>
							<div class="estrellas">
								<p class="icon-star yellow"></p>
								<p class="icon-star yellow"></p>
								<p class="icon-star yellow"></p>
								<p class="icon-star yellow"></p>
								<p class="icon-star gray"></p>
							</div>
							<p>
								Tiene casi todo lo necesario!
								Agreguen depósitos a plazo y 
								estaría perfecta :D
							</p>
						</div>
					</div>
				</div>
				
				<div class="formulario">			
				{{Form::open(['route' =>'SendMail' ,'method' => 'POST', 'role' => 'form', 'id' => 'formulario', 'class' => 'frm_contacto']) }}		
						<fieldset>
							<legend>CONTACTENOS</legend>				
							{{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}	
							{{ $errors->first('nombre','<p class="error_message">:message</p>') }}

							{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
							{{ $errors->first('email','<p class="error_message">:message</p>') }}

							{{ Form::text('asunto', null, ['class' => 'form-control', 'placeholder' => 'Asunto']) }}
							{{ $errors->first('asunto','<p class="error_message">:message</p>') }}

							{{ Form::textarea('mensaje', null, ['class' => 'form-control', 'placeholder' => 'Mensaje']) }}
							{{ $errors->first('mensaje','<p class="error_message">:message</p>') }}

							<button class="btn btn-primary btn-raised">Enviar</button>
						</fieldset>
				{{ Form::close()}}
				</div>
				
			</div>					
@stop

@section('footer')
	@parent
@stop	

@section('script')
	<script src="{{ asset('assets/js/jquery-1.11.2.min.js') }}"></script> 
	<script src="{{ asset('assets/js/jquery.dlmenu.js') }}"></script> 
	<script>	
		$(function() {
			$( '#dl-menu' ).dlmenu();
			
		});
	</script>

	<script>
		
			$(document).ready(function() {
				$("a#btn-quees").click(function(event){
					$("html,body").animate(
							{
								scrollTop: $($(this).attr("href")).offset().top+"px"
							},
							{
								duration: 980,
								easing: "swing"
							}
						);
					return false
				});

				$("a#btn-formulario").click(function(event){
		            $("html, body").animate(
		              {
		                scrollTop: $($(this).attr("href")).offset().top+"px"
		              },
		              {
		                duration:980,
		                easing: "swing"
		              }
		            );
		          
		              return false
		           });

					
			}); 
			
	</script>
@stop