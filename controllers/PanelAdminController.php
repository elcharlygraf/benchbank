<?php
class PanelAdminController extends BaseController {

//INICIO
    public function getInicio()
	{
        return View::make('layouts.admin');
    }
 
}