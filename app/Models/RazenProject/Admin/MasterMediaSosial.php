<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class MasterMediaSosial extends Model
{
    protected $table = 'master_media_sosials';
    protected $guarded = 'id';

    public function pivot_profil_razen_project_media_sosial()
    {
        return $this->hasMany('App\Models\RazenProject\Admin\PivotProfilRazenProjectMediaSosial', 'master_media_sosial_id');
    }
}
