<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class PivotRazenProjectSectionTimMediaSosial extends Model
{
    protected $table = 'pivot_razen_project_section_tim_media_sosials';
    protected $guarded = 'id';

    public function master_media_sosial()
    {
        return $this->belongsTo('App\Models\RazenProject\Admin\MasterMediaSosial','master_media_sosial_id');
    }

    public function razen_project_section_tim()
    {
        return $this->belongsTo('App\Models\RazenProject\Admin\RazenProjectSectionTim','razen_project_section_tim_id');
    }
}
