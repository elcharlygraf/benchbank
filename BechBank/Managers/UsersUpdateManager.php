<?php
namespace BechBank\Managers;

class UsersUpdateManager extends BaseManager{
    public function getRules()
    {
        $rules= [
          'url_intercambio' => 'required|max:400|url',
          'idpais'   => 'required',
          'nickname' => 'required|min:5|max:12|alpha_dash|unique:users,nickname,'. $this->entity->id,
          'nombres'  => 'alpha_spaces|min:4|max:24',
          'apellidos'=> 'alpha_spaces|min:4|max:34',
          'password' => 'min:6',
          'email'    => 'required|email|unique:users,email,'. $this->entity->id,
             	];       
        return $rules;
    }
}
