<?php

namespace App\Repositories;

use App\Models\District;

class DistrictRepository
{
    /**
    * @var District
    */

    protected $model;

    public function __construct(District $model)
    {
        $this->model = $model;   
    }
    
    public function getAll()
    {
        return $this->model->get();
    }
}