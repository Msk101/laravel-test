<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    public function children()
    {
        return $this->hasMany('App\Models\MenuItem', 'parent_id');
    }

    public function childrenRecursive()
    {
        $data = $this->children()->with(['childrenRecursive']);
        return $data;
    }

    protected function getMenuItem()
    {
        $data = $this->with(['childrenRecursive']);
        return $data->get();
    }

}
