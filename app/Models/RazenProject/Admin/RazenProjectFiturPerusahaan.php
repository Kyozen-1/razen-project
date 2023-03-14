<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class RazenProjectFiturPerusahaan extends Model
{
    protected $table = 'razen_project_fitur_perusahaans';
    protected $guarded = 'id';

    public function pivot_fitur()
    {
        return $This->hasMany('App\Models\RazenProject\Admin\PivotFiturRazenProjectFiturPerusahaan', 'razen_project_fitur_perusahaan_id');
    }
}
