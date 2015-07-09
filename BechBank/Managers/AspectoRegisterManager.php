<?php
namespace BechBank\Managers;

class AspectoRegisterManager extends BaseManager{
    public function getRules()
    {
        $rules = [
            'nombre' => 'required',
            'color' => 'required',
            	 ];
        return $rules;
    }
}
