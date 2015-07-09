<?php
use BechBank\Repositories\CampaniaRepo;

class SendMailController extends BaseController {

    public function Mail()
	{
        $data = Input::only(['nombre','email', 'asunto', 'mensaje']);
        //VALIDAMOS
        $rules = [
            'nombre'  => 'required',
            'email'   => 'required|email',
            'asunto'  => 'required',
            'mensaje' => 'required'
            ];

            $validation = \Validator::make($data, $rules);
            if($validation->passes())
            {
            	//VALIDACION CON EXITO ENVIAR EMAIL
            	Mail::send('emails.contacto', array(
                    'nombre' =>Input::get('nombre'),
                    'email'  =>Input::get('email'),
                    'asunto' =>Input::get('asunto'),
                    'mensaje'=>Input::get('mensaje')
                    )
                , function($message)
            	{
            		$message->to('jorgedeza@gmail.com', 'Jorge Deza');
                    $message->from(Input::get('email'), Input::get('nombre'));
                    $message->subject(Input::get('asunto'));	
            	});
                $success = "Mensaje enviado con exito";
                 return Redirect::to('/#formulario')->with(compact('success'));
            }
            else
            {
                return Redirect::to('/#formulario')->withInput()->withErrors($validation->messages());
            }
    }
}