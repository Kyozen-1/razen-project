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
use App\Models\RazenProject\Admin\MasterJabatanTim;
use App\Models\RazenProject\Admin\RazenProjectSectionTim;
use App\Models\RazenProject\Admin\PivotRazenProjectSectionTimMediaSosial;
use App\Models\RazenProject\Admin\MasterMediaSosial;

class TimController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $data = RazenProjectSectionTim::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $button_show = '<a href="'.route('razen-project.admin.tim.detail', ['id' => $data->id]).'" class="detail btn btn-icon waves-effect btn-info" title="Detail Data"><i class="fas fa-eye"></i></a>';
                    $button_edit = '<a href="'.route('razen-project.admin.tim.edit', ['id' => $data->id]).'" class="edit btn btn-icon waves-effect btn-warning" title="Edit Data"><i class="fas fa-edit"></i></a>';
                    $button_delete = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-icon waves-effect btn-danger" title="Delete Data"><i class="fas fa-trash"></i></button>';
                    $button = $button_show . ' ' . $button_edit . ' ' . $button_delete;
                    return $button;
                })
                ->editColumn('master_jabatan_tim_id', function($data){
                    return $data->master_jabatan_tim->nama;
                })
                ->addColumn('media_sosial', function($data){
                    $pivots = PivotRazenProjectSectionTimMediaSosial::where('razen_project_section_tim_id', $data->id)->get();
                    $list = '<ul>';
                    foreach ($pivots as $pivot) {
                        $list .='<li>'.$pivot->master_media_sosial->nama.': '.$pivot->tautan.'</li>';
                    }
                    $list .='</ul>';
                    return $list;
                })
                ->editColumn('gambar', function($data){
                    return '<img src="'.asset('images/razen-project/gambar-tim/'.$data->gambar).'" style="height:5rem;">';
                })
                ->rawColumns(['aksi', 'gambar', 'media_sosial'])
                ->make(true);
        }
        return view('razen-project.admin.tim.index');
    }

    public function create()
    {
        $media_sosial = MasterMediaSosial::pluck('nama', 'id');
        $jabatan = MasterJabatanTim::pluck('nama', 'id');
        return view('razen-project.admin.tim.create', [
            'media_sosial' => $media_sosial,
            'jabatan' => $jabatan
        ]);
    }

    public function store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'nama' => 'required | max:255',
            'master_jabatan_tim_id' => 'required | max:255',
            'gambar' => 'required | mimes:png,jpg,jpeg,webp',
            'data_media_sosial' => 'required'
        ]);

        if($errors -> fails())
        {
            return back()->withErrors($errors)->withInput();
        }

        $gambarExtension = $request->gambar->extension();
        $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
        $gambar = Image::make($request->gambar);
        $gambarSize = public_path('images/razen-project/gambar-tim/'.$gambarName);
        $gambar->save($gambarSize, 60);

        $razen_project_section_tim = new RazenProjectSectionTim;
        $razen_project_section_tim->master_jabatan_tim_id = $request->master_jabatan_tim_id;
        $razen_project_section_tim->nama = $request->nama;
        $razen_project_section_tim->gambar = $gambarName;
        $razen_project_section_tim->save();

        $data_media_sosial = $request->data_media_sosial;
        for ($i=0; $i < count($data_media_sosial); $i++) {
            $pivot = new PivotRazenProjectSectionTimMediaSosial;
            $pivot->master_media_sosial_id = $data_media_sosial[$i]['master_media_sosial_id'];
            $pivot->razen_project_section_tim_id = $razen_project_section_tim->id;
            $pivot->tautan = $data_media_sosial[$i]['tautan'];
            $pivot->save();
        }

        Alert::success('Berhasil', 'Berhasil menambahkan data');
        return redirect()->route('razen-project.admin.tim.index');
    }

    public function detail($id)
    {
        $razen_project_section_tim = RazenProjectSectionTim::find($id);

        $get_pivot = PivotRazenProjectSectionTimMediaSosial::where('razen_project_section_tim_id', $id)->first();
        $pivot = [];
        if($get_pivot)
        {
            $pivot = [
                'status' => 'ada',
                'data' => PivotRazenProjectSectionTimMediaSosial::where('razen_project_section_tim_id', $id)->get()
            ];
        } else {
            $pivot = [
                'status' => 'tidak_ada',
                'data' => ''
            ];
        }

        return view('razen-project.admin.tim.detail', [
            'razen_project_section_tim' => $razen_project_section_tim,
            'pivot' => $pivot
        ]);
    }

    public function edit($id)
    {
        $razen_project_section_tim = RazenProjectSectionTim::find($id);

        $get_pivot = PivotRazenProjectSectionTimMediaSosial::where('razen_project_section_tim_id', $id)->first();
        $pivot = [];
        if($get_pivot)
        {
            $pivot = [
                'status' => 'ada',
                'data' => PivotRazenProjectSectionTimMediaSosial::where('razen_project_section_tim_id', $id)->get()
            ];
        } else {
            $pivot = [
                'status' => 'tidak_ada',
                'data' => ''
            ];
        }

        $media_sosial = MasterMediaSosial::pluck('nama', 'id');
        $jabatan = MasterJabatanTim::pluck('nama', 'id');

        return view('razen-project.admin.tim.edit', [
            'razen_project_section_tim' => $razen_project_section_tim,
            'pivot' => $pivot,
            'media_sosial' => $media_sosial,
            'jabatan' => $jabatan
        ]);
    }

    public function update(Request $request, $id)
    {
        $razen_project_section_tim = RazenProjectSectionTim::find($id);
        $razen_project_section_tim->master_jabatan_tim_id = $request->master_jabatan_tim_id;
        $razen_project_section_tim->nama = $request->nama;
        if($request->gambar)
        {
            $razenProjectSectionTim = $razen_project_section_tim->gambar;
            File::delete(public_path('images/razen-project/gambar-tim/'.$razenProjectSectionTim));

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/razen-project/gambar-tim/'.$gambarName);
            $gambar->save($gambarSize, 60);

            $razen_project_section_tim->gambar = $gambarName;
        }
        $razen_project_section_tim->save();

        if($request->edit_data_tim)
        {
            $edit_data_tim = array_values($request->edit_data_tim);
            for ($i=0; $i < count($edit_data_tim); $i++) {
                $pivot = PivotRazenProjectSectionTimMediaSosial::find($edit_data_tim[$i]['pivot_razen_project_section_tim_media_sosial_id']);
                $pivot->master_media_sosial_id = $edit_data_tim[$i]['master_media_sosial_id'];
                $pivot->tautan = $edit_data_tim[$i]['tautan'];
                $pivot->save();
            }
        }

        if($request->hapus_id_pivot)
        {
            $hapus_id_pivot = explode(',', $request->hapus_id_pivot);
            for ($i=0; $i < count($hapus_id_pivot); $i++) {
                PivotRazenProjectSectionTimMediaSosial::find($hapus_id_pivot[$i])->delete();
            }
        }

        if($request->data_media_sosial)
        {
            $data_media_sosial = $request->data_media_sosial;
            for ($i=0; $i < count($data_media_sosial); $i++) {
                $pivot = new PivotRazenProjectSectionTimMediaSosial;
                $pivot->razen_project_section_tim_id = $id;
                $pivot->master_media_sosial_id = $data_media_sosial[$i]['master_media_sosial_id'];
                $pivot->tautan = $data_media_sosial[$i]['tautan'];
                $pivot->save();
            }
        }

        Alert::success('Berhasil', 'Berhasil merubah data');
        return redirect()->route('razen-project.admin.tim.index');
    }

    public function delete($id)
    {
        $razen_project_section_tim = RazenProjectSectionTim::find($id);

        $razenProjectSectionTim = $razen_project_section_tim->gambar;
        File::delete(public_path('images/razen-project/gambar-tim/'.$razenProjectSectionTim));

        $pivots = PivotRazenProjectSectionTimMediaSosial::where('razen_project_section_tim_id', $id)->get();
        foreach ($pivots as $pivot) {
            PivotRazenProjectSectionTimMediaSosial::where('razen_project_section_tim_id', $pivot->id)->delete();
        }
        $razen_project_section_tim->delete();
    }
}
