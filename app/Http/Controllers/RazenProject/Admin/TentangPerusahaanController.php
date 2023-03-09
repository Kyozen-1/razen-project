<?php

namespace App\Http\Controllers\RazenProject\Admin;

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
use App\Models\RazenProject\Admin\RazenProjectAbout;
use App\Models\RazenProject\Admin\PivotRazenProjectAbout;

class TentangPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = RazenProjectAbout::first();

        $cek_pivot = PivotRazenProjectAbout::where('razen_project_about_id', $about->id)->first();
        $pivot_razen_project_about = [];
        if($cek_pivot)
        {
            $pivot_razen_project_about = [
                'status' => 'ada',
                'pivot' => PivotRazenProjectAbout::where('razen_project_about_id', $about->id)->get()
            ];
        } else {
            $pivot_razen_project_about = [
                'status' => 'tidak_ada',
                'pivot' => ''
            ];
        }
        return view('razen-project.admin.section.tentang-perusahaan.index', [
            'about' => $about,
            'pivot_razen_project_about' => $pivot_razen_project_about
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'about' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
        ]);
        if($errors -> fails())
        {
            return back()->withErrors($errors)->withInput();
        }

        if($request->gambar)
        {
            $errors = Validator::make($request->all(), [
                'gambar' => 'mimes:png,jpeg,jpg,webp',
            ]);
            if($errors -> fails())
            {
                return back()->withErrors($errors)->withInput();
            }
        }

        $get_about = RazenProjectAbout::first();
        if($get_about)
        {
            $about = RazenProjectAbout::find($get_about->id);
        } else {
            $about = new RazenProjectAbout;
        }

        $about->about = $request->about;
        $about->misi = $request->misi;
        $about->tujuan = $request->tujuan;

        if($request->gambar)
        {
            File::delete(public_path('images/razen-project/gambar-tentang-perusahaan/'.$about->gambar));

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/razen-project/gambar-tentang-perusahaan/'.$gambarName);
            $gambar->save($gambarSize, 60);

            $about->gambar = $gambarName;
        }

        $about->save();

        Alert::success('Berhasil', 'Berhasil memperbaharui Tentang Perusahaan');
        return redirect()->route('razen-project.admin.tentang-perusahaan.index');
    }

    public function edit_pivot_about(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $id = $request->id;
        for ($i=0; $i < count($id); $i++) {
            PivotRazenProjectAbout::find($id[$i])->delete();
        }

        return response()->json(['success' => 'Berhasil menghapus']);
    }

    public function add_pivot_about(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'data_pivot_about' => 'required',
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $data_pivot_about = $request->data_pivot_about;

        for ($i=0; $i < count($data_pivot_about); $i++) {
            $pivot = new PivotRazenProjectAbout;
            $pivot->razen_project_about_id = $data_pivot_about[$i]['razen_project_about_id'];
            $pivot->judul = $data_pivot_about[$i]['judul'];
            $pivot->deskripsi = $data_pivot_about[$i]['deskripsi'];
            $pivot->save();
        }

        return response()->json(['success' => 'Data Pivot berhasil ditambahkan!']);
    }
}
