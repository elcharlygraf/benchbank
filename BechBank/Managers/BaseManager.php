<?php
namespace BechBank\Managers;
abstract class BaseManager {
    protected $entity;
    protected $data;

    public function __construct($entity, $data)
    {
        $this->entity = $entity;
        $this->data = array_only($data, array_keys($this->getRules()));
    }
    abstract public function getRules();
    public function isValid()
    {
        $rules = $this->getRules();
        $validation= \Validator::make($this->data, $rules);

        if($validation->fails())
        {
            throw new ValidationException('Validation faild', $validation->messages());
        }
        //SI LA VALIDACION PASA, DEVUELVE UN TRUE or FALSE
        $isValid = $validation->passes();
        $this->errors = $validation->messages();
        return $isValid;
    }
    //GRABANDO LOS DATOS
    public function save()
    {
        $this->isValid();
        $this->entity->fill($this->data);
        $this->entity->save();
        return true;
    }
    
}