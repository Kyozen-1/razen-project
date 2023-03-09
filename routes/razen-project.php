<?php
Route::prefix('razen-project')->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::get('/', 'RazenProject\Admin\DashboardController@index')->name('razen-project.admin.dashboard.index');
        Route::post('/change', 'RazenProject\Admin\DashboardController@change')->name('razen-project.admin.dashboard.change');
    });

    Route::prefix('item-virtual-tour')->group(function(){
        Route::get('/', 'RazenProject\Admin\ItemVirtualTourControler@index')->name('razen-project.admin.item-virtual-tour.index');
        Route::get('/detail/{id}', 'RazenProject\Admin\ItemVirtualTourControler@show');
        Route::post('/','RazenProject\Admin\ItemVirtualTourControler@store')->name('razen-project.admin.item-virtual-tour.store');
        Route::get('/edit/{id}','RazenProject\Admin\ItemVirtualTourControler@edit');
        Route::post('/update','RazenProject\Admin\ItemVirtualTourControler@update')->name('razen-project.admin.item-virtual-tour.update');
        Route::get('/destroy/{id}','RazenProject\Admin\ItemVirtualTourControler@destroy');
    });

    Route::prefix('profil')->group(function(){
        Route::get('/', 'RazenProject\Admin\ProfilController@index')->name('razen-project.admin.profil.index');
        Route::get('/detail/{id}', 'RazenProject\Admin\ProfilController@show');
        Route::post('/','RazenProject\Admin\ProfilController@store')->name('razen-project.admin.profil.store');
        Route::get('/edit/{id}','RazenProject\Admin\ProfilController@edit');
        Route::post('/update','RazenProject\Admin\ProfilController@update')->name('razen-project.admin.profil.update');
        Route::get('/destroy/{id}','RazenProject\Admin\ProfilController@destroy');
        Route::post('/edit-media-sosial-profil', 'RazenProject\Admin\ProfilController@edit_media_sosial_profil')->name('razen-project.admin.profil.edit-media-sosial-profil');
        Route::post('/tambah-media-sosial-profil', 'RazenProject\Admin\ProfilController@tambah_media_sosial_profil')->name('razen-project.admin.profil.tambah-media-sosial-profil');
    });

    Route::prefix('master-media-sosial')->group(function(){
        Route::get('/', 'RazenProject\Admin\Master\MasterMediaSosialController@index')->name('razen-project.admin.master-media-sosial.index');
        Route::get('/detail/{id}', 'RazenProject\Admin\Master\MasterMediaSosialController@show');
        Route::post('/','RazenProject\Admin\Master\MasterMediaSosialController@store')->name('razen-project.admin.master-media-sosial.store');
        Route::get('/edit/{id}','RazenProject\Admin\Master\MasterMediaSosialController@edit');
        Route::post('/update','RazenProject\Admin\Master\MasterMediaSosialController@update')->name('razen-project.admin.master-media-sosial.update');
        Route::get('/destroy/{id}','RazenProject\Admin\Master\MasterMediaSosialController@destroy');
    });

    Route::prefix('master-kategori-project')->group(function(){
        Route::get('/', 'RazenProject\Admin\Master\MasterKategoriProjectController@index')->name('razen-project.admin.master-kategori-project.index');
        Route::get('/detail/{id}', 'RazenProject\Admin\Master\MasterKategoriProjectController@show');
        Route::post('/','RazenProject\Admin\Master\MasterKategoriProjectController@store')->name('razen-project.admin.master-kategori-project.store');
        Route::get('/edit/{id}','RazenProject\Admin\Master\MasterKategoriProjectController@edit');
        Route::post('/update','RazenProject\Admin\Master\MasterKategoriProjectController@update')->name('razen-project.admin.master-kategori-project.update');
        Route::get('/destroy/{id}','RazenProject\Admin\Master\MasterKategoriProjectController@destroy');
    });

    Route::prefix('testimonial')->group(function(){
        Route::get('/', 'RazenProject\Admin\TestimonialController@index')->name('razen-project.admin.testimonial.index');
        Route::get('/detail/{id}', 'RazenProject\Admin\TestimonialController@show');
        Route::post('/','RazenProject\Admin\TestimonialController@store')->name('razen-project.admin.testimonial.store');
        Route::get('/edit/{id}','RazenProject\Admin\TestimonialController@edit');
        Route::post('/update','RazenProject\Admin\TestimonialController@update')->name('razen-project.admin.testimonial.update');
        Route::get('/destroy/{id}','RazenProject\Admin\TestimonialController@destroy');
    });

    Route::prefix('client')->group(function(){
        Route::get('/', 'RazenProject\Admin\ClientController@index')->name('razen-project.admin.client.index');
        Route::get('/detail/{id}', 'RazenProject\Admin\ClientController@show');
        Route::post('/','RazenProject\Admin\ClientController@store')->name('razen-project.admin.client.store');
        Route::get('/edit/{id}','RazenProject\Admin\ClientController@edit');
        Route::post('/update','RazenProject\Admin\ClientController@update')->name('razen-project.admin.client.update');
        Route::get('/destroy/{id}','RazenProject\Admin\ClientController@destroy');
    });

    Route::prefix('hero-slider')->group(function(){
        Route::get('/', 'RazenProject\Admin\HeroSliderController@index')->name('razen-project.admin.hero-slider.index');
        Route::get('/detail/{id}', 'RazenProject\Admin\HeroSliderController@show');
        Route::post('/','RazenProject\Admin\HeroSliderController@store')->name('razen-project.admin.hero-slider.store');
        Route::get('/edit/{id}','RazenProject\Admin\HeroSliderController@edit');
        Route::post('/update','RazenProject\Admin\HeroSliderController@update')->name('razen-project.admin.hero-slider.update');
        Route::get('/destroy/{id}','RazenProject\Admin\HeroSliderController@destroy');
    });

    Route::prefix('layanan')->group(function(){
        Route::get('/', 'RazenProject\Admin\LayananController@index')->name('razen-project.admin.layanan.index');
        Route::get('/detail/{id}', 'RazenProject\Admin\LayananController@show');
        Route::post('/','RazenProject\Admin\LayananController@store')->name('razen-project.admin.layanan.store');
        Route::get('/edit/{id}','RazenProject\Admin\LayananController@edit');
        Route::post('/update','RazenProject\Admin\LayananController@update')->name('razen-project.admin.layanan.update');
        Route::get('/destroy/{id}','RazenProject\Admin\LayananController@destroy');
    });

    Route::prefix('tentang-perusahaan')->group(function(){
        Route::get('/', 'RazenProject\Admin\TentangPerusahaanController@index')->name('razen-project.admin.tentang-perusahaan.index');
        Route::get('/detail/{id}', 'RazenProject\Admin\TentangPerusahaanController@show');
        Route::post('/','RazenProject\Admin\TentangPerusahaanController@store')->name('razen-project.admin.tentang-perusahaan.store');
        Route::get('/edit/{id}','RazenProject\Admin\TentangPerusahaanController@edit');
        Route::post('/update','RazenProject\Admin\TentangPerusahaanController@update')->name('razen-project.admin.tentang-perusahaan.update');
    });
});
