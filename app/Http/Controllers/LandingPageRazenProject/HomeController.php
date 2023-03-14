<?php

namespace App\Http\Controllers\LandingPageRazenProject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Validator;
use DataTables;
use Carbon\Carbon;
use Auth;
use GuzzleHttp\Client as GuzzleHttpClient;
use App\Mail\KontakKami;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use App\Models\RazenProject\Admin\MasterMediaSosial;
use App\Models\RazenProject\Admin\PivotProfilRazenProjectMediaSosial;
use App\Models\RazenProject\Admin\ProfilRazenProject;
use App\Models\RazenProject\Admin\ItemVirtualTour;
use App\Models\RazenProject\Admin\RazenProjectMasterKategoriProject as MasterKategoriProject;
use App\Models\RazenProject\Admin\RazenProjectTestimonial as Testimonial;
use App\Models\RazenProject\Admin\RazenProjectClient as Client;
use App\Models\RazenProject\Admin\RazenProjectHeroSlider as HeroSlider;
use App\Models\RazenProject\Admin\RazenProjectLayanan as Layanan;
use App\Models\RazenProject\Admin\RazenProjectAbout as About;
use App\Models\RazenProject\Admin\PivotRazenProjectAbout as PivotAbout;
use App\Models\RazenProject\Admin\MasterJabatanTim;
use App\Models\RazenProject\Admin\RazenProjectSectionTim;
use App\Models\RazenProject\Admin\PivotRazenProjectSectionTimMediaSosial;
use App\Models\RazenProject\Admin\RazenProjectFiturPerusahaan;
use App\Models\RazenProject\Admin\PivotFiturRazenProjectFiturPerusahaan;

class HomeController extends Controller
{
    public function beranda()
    {
        $profil = ProfilRazenProject::first();

        $cek_facebook = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 2)->first();
        if($cek_facebook)
        {
            $facebook = [
                'status' => 'ada',
                'tautan' => $cek_facebook->tautan
            ];
        } else {
            $facebook = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_twitter = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 3)->first();
        if($cek_twitter)
        {
            $twitter = [
                'status' => 'ada',
                'tautan' => $cek_twitter->tautan
            ];
        } else {
            $twitter = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_instagram = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 4)->first();
        if($cek_instagram)
        {
            $instagram = [
                'status' => 'ada',
                'tautan' => $cek_instagram->tautan
            ];
        } else {
            $instagram = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_youtube = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 5)->first();
        if($cek_youtube)
        {
            $youtube = [
                'status' => 'ada',
                'tautan' => $cek_youtube->tautan
            ];
        } else {
            $youtube = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $item_virtual_tours = ItemVirtualTour::all();

        $kategori_project = MasterKategoriProject::pluck('nama', 'id');

        $testimonials = Testimonial::latest()->get();

        $clients = Client::all();

        $hero_sliders = HeroSlider::all();

        $layanans = Layanan::all()->random(3);

        $about = About::first();

        $cek_pivot_about = PivotAbout::where('razen_project_about_id', $about->id)->first();
        $pivot_about = [];
        if($cek_pivot_about)
        {
            $pivot_about = [
                'status' => 'ada',
                'pivot' => PivotAbout::where('razen_project_about_id', $about->id)->get()
            ];
        } else {
            $pivot_about = [
                'status' => 'tidak_ada',
                'pivot' => ''
            ];
        }

        return view('landing-page-razen-project.index', [
            'profil' => $profil,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'item_virtual_tours' => $item_virtual_tours,
            'kategori_project' => $kategori_project,
            'testimonials' => $testimonials,
            'clients' => $clients,
            'hero_sliders' => $hero_sliders,
            'layanans' => $layanans,
            'about' => $about,
            'pivot_about' => $pivot_about
        ]);
    }

    public function perusahaan()
    {
        $profil = ProfilRazenProject::first();

        $cek_facebook = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 2)->first();
        if($cek_facebook)
        {
            $facebook = [
                'status' => 'ada',
                'tautan' => $cek_facebook->tautan
            ];
        } else {
            $facebook = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_twitter = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 3)->first();
        if($cek_twitter)
        {
            $twitter = [
                'status' => 'ada',
                'tautan' => $cek_twitter->tautan
            ];
        } else {
            $twitter = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_instagram = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 4)->first();
        if($cek_instagram)
        {
            $instagram = [
                'status' => 'ada',
                'tautan' => $cek_instagram->tautan
            ];
        } else {
            $instagram = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_youtube = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 5)->first();
        if($cek_youtube)
        {
            $youtube = [
                'status' => 'ada',
                'tautan' => $cek_youtube->tautan
            ];
        } else {
            $youtube = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $about = About::first();

        $cek_pivot_about = PivotAbout::where('razen_project_about_id', $about->id)->first();
        $pivot_about = [];
        if($cek_pivot_about)
        {
            $pivot_about = [
                'status' => 'ada',
                'pivot' => PivotAbout::where('razen_project_about_id', $about->id)->get()
            ];
        } else {
            $pivot_about = [
                'status' => 'tidak_ada',
                'pivot' => ''
            ];
        }

        $tims = RazenProjectSectionTim::all()->random(4);
        $clients = Client::all();
        $jumlah_proyek = ItemVirtualTour::count();
        $jumlah_tim = RazenProjectSectionTim::count();

        $fitur_perusahaan = RazenProjectFiturPerusahaan::first();

        $cek_pivot = PivotFiturRazenProjectFiturPerusahaan::where('razen_project_fitur_perusahaan_id', $fitur_perusahaan->id)->first();
        $pivot_fitur_perusahaan = [];
        if($cek_pivot)
        {
            $pivot_fitur_perusahaan = [
                'status' => 'ada',
                'pivot' => PivotFiturRazenProjectFiturPerusahaan::where('razen_project_fitur_perusahaan_id', $fitur_perusahaan->id)->get()
            ];
        } else {
            $pivot_fitur_perusahaan = [
                'status' => 'tidak ada',
                'pivot' => ''
            ];
        }


        return view('landing-page-razen-project.perusahaan', [
            'profil' => $profil,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'about' => $about,
            'pivot_about' => $pivot_about,
            'tims' => $tims,
            'clients' => $clients,
            'jumlah_proyek' => $jumlah_proyek,
            'jumlah_tim' => $jumlah_tim,
            'fitur_perusahaan' => $fitur_perusahaan,
            'pivot_fitur_perusahaan' => $pivot_fitur_perusahaan
        ]);
    }

    public function layanan()
    {
        $profil = ProfilRazenProject::first();

        $cek_facebook = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 2)->first();
        if($cek_facebook)
        {
            $facebook = [
                'status' => 'ada',
                'tautan' => $cek_facebook->tautan
            ];
        } else {
            $facebook = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_twitter = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 3)->first();
        if($cek_twitter)
        {
            $twitter = [
                'status' => 'ada',
                'tautan' => $cek_twitter->tautan
            ];
        } else {
            $twitter = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_instagram = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 4)->first();
        if($cek_instagram)
        {
            $instagram = [
                'status' => 'ada',
                'tautan' => $cek_instagram->tautan
            ];
        } else {
            $instagram = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_youtube = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 5)->first();
        if($cek_youtube)
        {
            $youtube = [
                'status' => 'ada',
                'tautan' => $cek_youtube->tautan
            ];
        } else {
            $youtube = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $layanans = Layanan::all();

        return view('landing-page-razen-project.layanan', [
            'profil' => $profil,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'layanans' => $layanans
        ]);
    }

    public function proyek()
    {
        $profil = ProfilRazenProject::first();

        $cek_facebook = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 2)->first();
        if($cek_facebook)
        {
            $facebook = [
                'status' => 'ada',
                'tautan' => $cek_facebook->tautan
            ];
        } else {
            $facebook = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_twitter = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 3)->first();
        if($cek_twitter)
        {
            $twitter = [
                'status' => 'ada',
                'tautan' => $cek_twitter->tautan
            ];
        } else {
            $twitter = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_instagram = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 4)->first();
        if($cek_instagram)
        {
            $instagram = [
                'status' => 'ada',
                'tautan' => $cek_instagram->tautan
            ];
        } else {
            $instagram = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_youtube = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 5)->first();
        if($cek_youtube)
        {
            $youtube = [
                'status' => 'ada',
                'tautan' => $cek_youtube->tautan
            ];
        } else {
            $youtube = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $guzzleClient = new GuzzleHttpClient();

        // $kategori = $guzzleClient->request('GET', 'http://127.0.0.1:8000/api/product/category', [
        //     'debug' => true,
        //     'verify' => false,
        // ]);

        // Kategori Produk
        $kategori = $guzzleClient->get(env('RAZEN_URL').'api/product/category');
        $kategori_results= json_decode($kategori->getBody())->data;

        // Produk
        $produk = $guzzleClient->get(env('RAZEN_URL').'api/product/razen-project/product');
        $produk_results = json_decode($produk->getBody())->data;

        return view('landing-page-razen-project.proyek', [
            'profil' => $profil,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'kategori_results' => $kategori_results,
            'produk_results' => $produk_results
        ]);
    }

    public function kontak()
    {
        $profil = ProfilRazenProject::first();

        $cek_facebook = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 2)->first();
        if($cek_facebook)
        {
            $facebook = [
                'status' => 'ada',
                'tautan' => $cek_facebook->tautan
            ];
        } else {
            $facebook = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_twitter = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 3)->first();
        if($cek_twitter)
        {
            $twitter = [
                'status' => 'ada',
                'tautan' => $cek_twitter->tautan
            ];
        } else {
            $twitter = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_instagram = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 4)->first();
        if($cek_instagram)
        {
            $instagram = [
                'status' => 'ada',
                'tautan' => $cek_instagram->tautan
            ];
        } else {
            $instagram = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_youtube = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 5)->first();
        if($cek_youtube)
        {
            $youtube = [
                'status' => 'ada',
                'tautan' => $cek_youtube->tautan
            ];
        } else {
            $youtube = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        return view('landing-page-razen-project.kontak', [
            'profil' => $profil,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube
        ]);
    }

    public function blog()
    {
        $profil = ProfilRazenProject::first();

        $cek_facebook = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 2)->first();
        if($cek_facebook)
        {
            $facebook = [
                'status' => 'ada',
                'tautan' => $cek_facebook->tautan
            ];
        } else {
            $facebook = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_twitter = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 3)->first();
        if($cek_twitter)
        {
            $twitter = [
                'status' => 'ada',
                'tautan' => $cek_twitter->tautan
            ];
        } else {
            $twitter = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_instagram = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 4)->first();
        if($cek_instagram)
        {
            $instagram = [
                'status' => 'ada',
                'tautan' => $cek_instagram->tautan
            ];
        } else {
            $instagram = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        $cek_youtube = PivotProfilRazenProjectMediaSosial::where('master_media_sosial_id', 5)->first();
        if($cek_youtube)
        {
            $youtube = [
                'status' => 'ada',
                'tautan' => $cek_youtube->tautan
            ];
        } else {
            $youtube = [
                'status' => 'tidak ada',
                'tautan' => ''
            ];
        }

        return view('landing-page-razen-project.blog',[
            'profil' => $profil,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
        ]);
    }

    public function kontak_kami(Request $request)
    {
        $profil = ProfilRazenProject::first();
        $email = $request->contact_email;
        Mail::to($profil->email)->send(new KontakKami($email));
        return new JsonResponse(
            [
                'success' => true,
                'message' => $request->contact_message
            ], 200
        );
    }
}
