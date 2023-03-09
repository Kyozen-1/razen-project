<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class MasterJabatanTim extends Model
{
    protected $table = 'master_jabatan_tims';

    protected $guarded = 'id';

    public function razen_project_section_tim()
    {
        return $this->hasMany('App\Models\RazenProject\Admin\RazenProjectSectionTim', 'master_jabatan_tim_id');
    }
}
