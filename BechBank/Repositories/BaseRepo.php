<?php
/**
 * Created by PhpStorm.
 * User: MASTER
 * Date: 21/11/2014
 * Time: 11:52 AM
 */

namespace BechBank\Repositories;


abstract class BaseRepo {

    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract public function  getModel();

    public function find($id)
    {
        return $this->model->find($id);
    }

} 