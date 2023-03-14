<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class PivotFiturRazenProjectFiturPerusahaan extends Model
{
    protected $table = 'pivot_fitur_razen_project_fitur_perusahaans';
    protected $guarded = 'id';

    public function fitur_perusahaan()
    {
        return $this->belongsTo('App\Models\RazenProject\Admin\RazenProjectFiturPerusahaan', 'razen_project_fitur_perusahaan_id');
    }
}
