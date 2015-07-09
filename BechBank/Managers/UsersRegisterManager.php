<?php
namespace BechBank\Managers;

class UsersRegisterManager extends BaseManager{
    public function getRules()
    {
        $rules = [
            'nickname' => 'required|min:5|max:20|alpha_dash|unique:users,nickname',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'email' => 'required|email|unique:users,email',
            'successCheck' => 'required|accepted'
            	 ];
        return $rules;
    }
}
