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
use Auth;
use App\Models\RazenProject\Admin\RazenProjectFiturPerusahaan;
use App\Models\RazenProject\Admin\PivotFiturRazenProjectFiturPerusahaan;

class FiturPerusahaan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return view('razen-project.admin.fitur-perusahaan.index', [
            'fitur_perusahaan' => $fitur_perusahaan,
            'pivot_fitur_perusahaan' => $pivot_fitur_perusahaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'judul_pendek' => 'required | max:255',
            'judul' => 'required | max:255'
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

        $get_fitur_perusahaan = RazenProjectFiturPerusahaan::first();
        if($get_fitur_perusahaan)
        {
            $fitur_perusahaan = RazenProjectFiturPerusahaan::find($get_fitur_perusahaan->id);
        } else {
            $fitur_perusahaan = new RazenProjectFiturPerusahaan;
        }

        $fitur_perusahaan->judul_pendek = $request->judul_pendek;
        $fitur_perusahaan->judul = $request->judul;

        if($request->gambar)
        {
            File::delete(public_path('images/razen-project/gambar-fitur-perusahaan/'.$fitur_perusahaan->gambar));

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/razen-project/gambar-fitur-perusahaan/'.$gambarName);
            $gambar->save($gambarSize, 60);

            $fitur_perusahaan->gambar = $gambarName;
        }

        $fitur_perusahaan->save();

        Alert::success('Berhasil', 'Berhasil memperbaharui Fitur Perusahaan');
        return redirect()->route('razen-project.admin.fitur-perusahaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function edit_fitur_perusahaan(Request $request)
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
            PivotFiturRazenProjectFiturPerusahaan::find($id[$i])->delete();
        }

        return response()->json(['success' => 'Berhasil menghapus']);
    }

    public function tambah_fitur_perusahaan(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'data_pivot_fitur' => 'required',
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $dataPivotFitur = $request->data_pivot_fitur;

        for ($i=0; $i < count($dataPivotFitur); $i++) {
            $pivot_fitur = new PivotFiturRazenProjectFiturPerusahaan;
            $pivot_fitur->razen_project_fitur_perusahaan_id = $dataPivotFitur[$i]['razen_project_fitur_perusahaan_id'];
            $pivot_fitur->judul = $dataPivotFitur[$i]['judul'];
            $pivot_fitur->deskripsi = $dataPivotFitur[$i]['deskripsi'];
            $pivot_fitur->save();
        }

        return response()->json(['success' => 'Data Fitur Perusahaan berhasil ditambahkan!']);
    }
}
