<?php
use BechBank\Repositories\CampaniaRepo;

class CalculoCampaniaController extends BaseController {

    protected $CampaniaRepo;

    //CONTROLADOR
    public function __construct(CampaniaRepo $CampaniaRepo)
    {
        $this->CampaniaRepo = $CampaniaRepo;
    }
    //CAMPAÑA
    public function Campania()
	{
		$din = $this->CampaniaRepo->getCampania(1,2,1,15000,3000,60,'JJJ@HOTMAIL.COM','997827939','JORGE');
		dd($din);
    }
}