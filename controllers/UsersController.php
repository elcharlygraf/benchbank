<?php
use BechBank\Entities\Users;
use BechBank\Repositories\UsersRepo;
use BechBank\Managers\UsersRegisterManager;
use BechBank\Managers\UsersUpdateManager;

class UsersController extends \BaseController {

     //PROPIEDAD
    protected $UsersRepo;

    //CONTROLADOR
    public function __construct(UsersRepo $UsersRepo)
    {
        $this->UsersRepo = $UsersRepo;
    }

    public function signUp()
     {
        return View::make('admin/register');
     }

    public function account()
     {
        $user= Auth::user();
        $paises = $this->UsersRepo->Paises();
        return View::make('adminUser/account', compact('user','paises'));
     }

    public function updateAccount()
     {
         $Users = Auth::user();
         $manager = new UsersUpdateManager($Users, Input::all());
         
         $manager->save();
         return View::make('adminUser/index')->with('success','Bienvenido');
     }
         
    public function register()
     {
         $Users = $this->UsersRepo->newUser();
         $manager = new UsersRegisterManager($Users, Input::all());

            $manager->save();
            return View::make('admin/login')->with('success','Bienvenido');
     }
}