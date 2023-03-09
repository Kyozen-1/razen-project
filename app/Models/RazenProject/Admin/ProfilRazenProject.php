<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class ProfilRazenProject extends Model
{
    protected $table = 'profil_razen_projects';
    protected $guarded = 'id';

    public function pivot_profil_razen_project_media_sosial()
    {
        return $this->hasMany('App\Models\RazenProject\Admin\PivotProfilRazenProjectMediaSosial', 'profil_razen_project_id');
    }
}
