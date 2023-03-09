<?php

namespace App\Models\RazenProject\Admin;

use Illuminate\Database\Eloquent\Model;

class RazenProjectAbout extends Model
{
    protected $table = 'razen_project_abouts';

    protected $guarded = 'id';

    public function pivot_razen_project_about()
    {
        return $this->hasMany('App\Models\RazenProject\Admin\PivotRazenProjectAbout', 'razen_project_about_id');
    }
}
