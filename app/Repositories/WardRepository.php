<?php

namespace App\Repositories;

use App\Models\Ward;

class WardRepository
{
    /**
    * @var Ward
    */

    protected $model;

    public function __construct(Ward $model)
    {
        $this->model = $model;   
    }
    
    public function getAll()
    {
        return $this->model->get();
    }
}