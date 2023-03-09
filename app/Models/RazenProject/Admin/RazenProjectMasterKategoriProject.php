<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class RazenProjectMasterKategoriProject extends Model
{
    protected $table = 'razen_project_master_kategori_projects';
    protected $guarded = 'id';

    public function item_virtual_tour()
    {
        return $this->hasMany('App\Models\RazenProject\Admin\ItemVirtualTour', 'master_kategori_project_id');
    }
}
