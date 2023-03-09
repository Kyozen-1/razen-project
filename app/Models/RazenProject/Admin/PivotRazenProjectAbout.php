<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class PivotRazenProjectAbout extends Model
{
    protected $table = 'pivot_razen_project_abouts';
    protected $guarded = 'id';

    public function razen_project_about()
    {
        return $this->belongsTo('App\Models\RazenProject\Admin\RazenProjectAbout', 'razen_project_about_id');
    }
}
