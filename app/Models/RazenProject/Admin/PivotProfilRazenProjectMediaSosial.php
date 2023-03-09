<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class PivotProfilRazenProjectMediaSosial extends Model
{
    protected $table = 'pivot_profil_razen_project_media_sosials';
    protected $guarded = 'id';

    public function master_media_sosial()
    {
        return $this->belongsTo('App\Models\RazenProject\Admin\MasterMediaSosial', 'master_media_sosial_id');
    }

    public function profil_razen_project()
    {
        return $this->belongsTo('App\Models\RazenProject\Admin\ProfilRazenProject', 'profil_razen_project_id');
    }
}
