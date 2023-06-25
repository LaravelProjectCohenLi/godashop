<?php

namespace App\Repositories;

use App\Models\Province;

class ProvinceRepository
{
    /**
    * @var Province
    */

    protected $model;

    public function __construct(Province $model)
    {
        $this->model = $model;   
    }
    
    public function getAll()
    {
        return $this->model->get();
    }
}