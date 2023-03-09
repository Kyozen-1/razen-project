<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class RazenProjectSectionTim extends Model
{
    protected $table = 'razen_project_section_tims';
    protected $guarded = 'id';

    public function master_jabatan_tim()
    {
        return $this->belongsTo('App\Models\RazenProject\Admin\MasterJabatanTim', 'master_jabatan_tim_id');
    }

    public function pivot_razen_project_section_tim_media_sosial()
    {
        return $this->hasMany('App\Models\RazenProject\Admin\PivotRazenProjectSectionTimMediaSosial', 'razen_project_section_tim_id');
    }
}
