@extends('layouts.webinterno')
	@section('titulo')
		@parent
	@stop

	@section('header')
		@parent
	@stop	


@section('cuerpo')
			<section class="cabecera_deposito">
				<div class="leftbox">
					<figure class="icondeposito"></figure>
					<span class="titulo_deposito">
					Préstamos
					</span>
				</div>	
				
				<div class="rightbox">
					<nav class="recorrido">
						<ul id="recorrido_nav">
							<li><a href="/">Inicio</a> &#187; </li>
							<li><a href="{{ URL::route('productos') }}">Productos</a> &#187; </li>
							<li>Consumo</li>
						</ul>
					</nav>
				</div>
			</section>
			<aside class="banner_deposito"></aside>	
			
			<div class="transition_deposito">
				<span class="first_subtitulo_deposito">Ten enviamos las ofertas.</span>
				<span class="second_subtitulo_deposito">Tú las aprovechas.</span>
				
				<ul id="numeric_transition">
					<li>
						<a href="#" class="active_transition">1</a> 
						
					</li>
						<span class="lineclass"> </span>
					<li>
						<a href="#" class="active_transition">2</a>

					</li>
						<span class="lineclass"> </span>
					<li><a href="#">3</a></li>
				</ul>
				<br><br><br><br><br>
			</div>

			<section class="calculobox">
				<div class="imagenCalculo_Registrar"></div>
				<div class="content_calculo">
				{{Form::open(['route' => 'registro', 'id' => 'calculoForm' , 'method' => 'POST', 'role' => 'form']) }}
						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Tu nombre completo</p>
							{{ Form::text('nombre', null, ['class' => 'formCalculo_input', 'id' => 'nombre' ,'placeholder' => 'Tu nombre completo', 'required']) }}
        					{{ $errors->first('nombre','<p class="error_message">:message</p>') }}
						</div>

						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Tu correo electrónico</p>
							{{ Form::email('email', null, ['class' => 'formCalculo_input', 'id' => 'email', 'placeholder' => 'Tu correo electrónico', 'required']) }}
        					{{ $errors->first('email','<p class="error_message">:message</p>') }}
						</div>

						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Tu número de celular</p>
							{{ Form::number('telefono', null, ['class' => 'formCalculo_input', 'id' => 'telefono', 'placeholder' => 'Tu número de celular', 'required']) }}
        					{{ $errors->first('telefono','<p class="error_message">:message</p>') }}
						</div>

						<div class="bloqueFormCalculo">
							<input type="submit" class="submitCalcular" value="Registrar  >">
						</div>
				{{ Form::close()}}
				<div style="clear:both"></div>
				</div>
			</section>


			</div>
@stop

@section('footer')
	@parent
@stop

@section('script')
	<script type='text/javascript' src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/app.js')}}"></script>

	<script type='text/javascript' src="{{asset('assets/js/validate/jquery.validate.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('assets/js/validate/additional-methods.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('assets/js/validate/personalizable.js')}}"></script>
	<script>
		jQuery.validator.setDefaults({
		  debug: true,
		  success: "valid"
		});
		$( "#calculoForm" ).validate({
		  rules: {
		    email: {
		    	required: true,
		    	email: true
		    },
		    telefono: {
		    	required: true,
		    	digits: true,
		    	minlength: 9,
		    	maxlength: 12,
		    },
		    nombre: {
		    	required: true,
		    	lettersonly: true
		    }
		  },
		  messages: 
		    {
		    	email:"Ingrese un email valido",
		    	nombre: {
		    		lettersonly: "Ingrese solo letras"
		    	}
		    },
		  submitHandler: function(form) {
	            form.submit();
	        }  
		});
	</script>
@stop