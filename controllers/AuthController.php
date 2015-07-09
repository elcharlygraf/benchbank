<?php

class AuthController extends BaseController {

    public function login()
    {
        $data = Input::only('email','password','remember');
        $credentials = ['email' => $data['email'], 'password' => $data['password']];

        if(Auth::attempt($credentials, $data['remember']))
        {
            if(Auth::user()->idrol == 2)
            {
                return Redirect::to('user');
            }
            
            elseif(Auth::user()->idrol == 1)
            {
                return Redirect::to('admin')->with('Administrador','Bienvenido Administrador');
            }

            elseif(Auth::user()->idrol == 3)
            {
                return Redirect::to('vendedor')->with('Vendedor','Bienvenido Vendedor');
            }
        }
        return Redirect::back()->with('login_error', 1);
    }

    public function logout()
    {
        Auth::logout();
        return View::make('admin/login')->with('Authlogin', 'Tu sesion ha sido cerrada.');
    }

}