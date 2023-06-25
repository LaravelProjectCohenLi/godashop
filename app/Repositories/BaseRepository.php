<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function save(array $inputs, $id = null)
    {
        return $this->model->updateOrCreate(['id' => $id], $inputs);
    }

    public function getAll()
    {
        return $this->model->get();
    }

    // chunk() lấy bảng ghi theo từng phần
    public function chunk($chunkSize, callable $callback)               // return collection
    {
        return $this->model->chunkById($chunkSize, $callback); // cái này hiệu suất hơn
        // return Tag::orderBy('id', 'ASC')->chunk($chunkSize, $callback);
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    // Delete temp
    public function deleteByid($id)
    {
        return $this->model->destroy($id);
    }

    // Restore delete
    public function RestoreDelete($id)
    {
        $restore = $this->model->withTrashed()->where('id', $id)->restore();
        session()->flash('flash_success', 'Restore thành công');

        return $restore;
    }

     // list soft delete 
    public function GetListSoftDelete()
    {
        return $this->model->onlyTrashed()->paginate(10);      // withTrashed() => get all
    }

    // giới hạn câu query
    public function eagerloading()            
    {
        return $this->model->with('category')->paginate(10); 
    }
}