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
					Depósitos Mutuos
					</span>
				</div>	
				
				<div class="rightbox">
					<nav class="recorrido">
						<ul id="recorrido_nav">
							<li><a href="/">Inicio</a> &#187; </li>
                            <li><a href="{{ URL::route('productos') }}">Productos</a> &#187; </li>
                            <li><a href="{{ URL::route('depositos') }}">Depósitos</a> &#187; </li>
							<li>Fondos Mutuos</li>
						</ul>
					</nav>
				</div>
			</section>
			<aside class="banner_deposito"></aside>	
			
			<div class="transition_deposito">
				<span class="first_subtitulo_deposito">Datos precisos.</span>
				<span class="second_subtitulo_deposito">Resultados precisos.</span>
				<br><br>
			</div>

			<section class="calculobox">
				<div class="imagenCalculo_depositoMutuos"></div>
				<div class="content_calculo">
					{{Form::open(['route' => 'SearchFondosmutuos', 'id' => 'calculoForm' ,'method' => 'POST', 'role' => 'form', 'class' => 'formCalculo']) }}
						
						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Seleccionar Tipo de Fondo</p>
							<select name="tipofondo" id="tipofondo" class="selectCalculo">
							</select>
							{{ $errors->first('tipofondo','<p class="error_message">:message</p>') }}
						</div>

						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Seleccionar Fondo</p>
                            <select name="subtipofondo" id="subtipofondo" class="selectCalculo">
                            </select>
                            {{ $errors->first('subtipofondo','<p class="error_message">:message</p>') }}
						</div>

						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Seleccione su Moneda</p>
							<select name="typeMoneda" id="typeMoneda" class="selectCalculo">
								<option value="1">(S/.) Soles</option>
								<option value="2">($/.) Dolar</option>
							</select>
							{{ $errors->first('typeMoneda','<p class="error_message">:message</p>') }}
						</div>

						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Valor del Aporte</p>
							{{ Form::number('valor', null, ['id' =>'valor', 'class' => 'formCalculo_input', 'placeholder' => 'Valor del Aporte', 'required' ]) }}
							{{ $errors->first('valor','<p class="error_message">:message</p>') }}
						</div>

						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Seleccionar Plazos (Días)</p>
							<select name="plazos" id="plazos" class="selectCalculo">
							@foreach($plazos as $plazo)
								<option value="{{$plazo->Plazo}}">{{$plazo->Plazo}}</option>
							@endforeach	
							</select>
							{{ $errors->first('plazos','<p class="error_message">:message</p>') }}
						</div>
						
						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Seleccionar Departamento</p>
							<select name="departamento" id="departamento" class="selectCalculo">
							@foreach($departamentos as $departamento)
								<option value="{{$departamento->Codigo_Departamento}}">{{$departamento->Departamento}}</option>
							@endforeach	
							</select>
							{{ $errors->first('departamento','<p class="error_message">:message</p>') }}
						</div>

						<div class="bloqueFormCalculo">
							<span class="fonttitleForm">¿Deseas registrarte?</span>
							{{Form::checkbox('checkregister', '1', true)}}
						</div>

						<div class="bloqueFormCalculo">
							<input type="hidden" name="producto" value="Fondos Mutuos">
							<input type="submit" class="submitCalcular" value="Calcular  >">
						</div>

					{{ Form::close()}}
					<div style="clear:both"></div>
				</section>
			</div>
@stop

@section('footer')
	@parent
@stop

@section('script')
    <script type='text/javascript' src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('assets/js/app.js')}}"></script>
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
            valor: {
              required: true,
              min: 300
            },
            departamento: {
                required: true,
                min: 1
            },
            plazos: {
                required: true,
                min: 1
            },
            tipofondo: {
                required: true,
                min: 1
            },
            subtipofondo: {
                required: true,
                min: 1
            }
            
          },
          messages: 
            {
                valor:{
                    required: "Ingrese el saldo promedio",
                    min: "El saldo minimo es de: 300"
                },
                departamento: "Por favor, seleccione un departamento",
                plazos: "Por favor, seleccione un plazo",
                tipofondo: "Por favor, seleccione un tipo de fondo",
                subtipofondo: "Por favor, seleccione un fondo"
            },
          submitHandler: function(form) {
                form.submit();
            }  
        });
    </script>
@stop