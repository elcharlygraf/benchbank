<?php
use BechBank\Repositories\CampaniaRepo;

class ResultadoCalculoController extends BaseController {

    protected $CampaniaRepo;
    public function __construct(CampaniaRepo $CampaniaRepo)
    {
        $this->CampaniaRepo = $CampaniaRepo;
    }

    public function Resultado()
	{
        return View::make('web.resultados');
    }
}