<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class ItemVirtualTour extends Model
{
    protected $table = 'item_virtual_tours';
    protected $guarded = 'id';

    public function master_kategori_project()
    {
        return $this->belongsTo('App\Models\RazenProject\Admin\RazenProjectMasterKategoriProject', 'master_kategori_project_id');
    }
}
