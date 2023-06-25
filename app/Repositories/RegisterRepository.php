<?php

namespace App\Repositories;

use App\Models\Register;

class RegisterRepository
{
    /**
    * @var Register
    */

    protected $model;

    public function __construct(Register $model)
    {
        $this->model = $model;   
    }
    
    public function getAll()
    {
        return $this->model->get();
    }

    public function save()
    {
        $this->model->Create() ; // Hàm Method của ORM
    }
}