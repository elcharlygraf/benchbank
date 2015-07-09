<?php
namespace BechBank\Repositories;
use BechBank\Entities\User;
use BechBank\Entities\Pais;
use BechBank\Entities\OroUser;
use BechBank\Entities\RunasUser;
class UsersRepo {
    //DATA
    public function dataCompleta($id)
    {
        return User::
        select('idpais','url_intercambio')
        ->where('id','=',$id)
        ->get();
    }
    //DATA VENDEDOR
    public function dataVendedor($idpais)
    {
        return User::
        select('id','nombres')
        ->where('idrol','=',3)
        ->where('idpais','=',$idpais)
        ->get();
    }
    //
    public function newUser()
    {
        $users = new User();
        $users->password;
        $users->email;
        $users->idpais;
        $users->nickname;
        $users->nombres;
        $users->apellidos;
        return $users;
    }
    public function Paises()
    {
        return Pais::
        select('nombre','idpais')
        ->get();
    }
    public function OroUser($id)
    {
        return OroUser::
        select('cantidad_oro')
        ->where('idusuario','=',$id)
        ->get();
    }

    public function RunasUser($id)
    {
        return RunasUser::
        select('cantidad')
        ->where('idusuario','=',$id)
        ->get();
    }
}




















