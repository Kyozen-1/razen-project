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
use App\Models\RazenProject\Admin\ItemVirtualTour;
use App\Models\RazenProject\Admin\RazenProjectMasterKategoriProject as MasterKategoriProject;

class ItemVirtualTourControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $data = ItemVirtualTour::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $button_show = '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-icon waves-effect btn-info" title="Detail Data"><i class="fas fa-eye"></i></button>';
                    $button_edit = '<button type="button" name="edit" id="'.$data->id.'"
                    class="edit btn btn-icon waves-effect btn-warning" title="Edit Data"><i class="fas fa-edit"></i></button>';
                    $button_delete = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-icon waves-effect btn-danger" title="Delete Data"><i class="fas fa-trash"></i></button>';
                    $button = $button_show . ' ' . $button_edit . ' ' . $button_delete;
                    return $button;
                })
                ->editColumn('thumb', function($data){
                    return '<img src="'.asset('images/razen-project/item-virtual-tour/'.$data->thumb).'" style="height:5rem;">';
                })
                ->editColumn('master_kategori_project_id', function($data){
                    return $data->master_kategori_project_id ? $data->master_kategori_project->nama : '';
                })
                ->rawColumns(['aksi', 'thumb'])
                ->make(true);
        }

        $kategori_project = MasterKategoriProject::pluck('nama', 'id');
        return view('razen-project.admin.item-virtual-tour.index', [
            'kategori_project' => $kategori_project
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
            'nama' => 'required | max:255',
            'deskripsi' => 'required',
            'link' => 'required',
            'kode_embed' => 'required',
            'thumb' => 'required | mimes:png,jpeg,jpg',
            'master_kategori_project_id' => 'required'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $thumbExtension = $request->thumb->extension();
        $thumbName = uniqid().'.'.$thumbExtension;
        $thumb = Image::make($request->thumb);
        $cropSize2 = public_path('images/razen-project/item-virtual-tour/'.$thumbName);
        $thumb->save($cropSize2, 60);

        $item_virtual_tour = new ItemVirtualTour;
        $item_virtual_tour->nama = $request->nama;
        $item_virtual_tour->deskripsi = $request->deskripsi;
        $item_virtual_tour->link = $request->link;
        $item_virtual_tour->kode_embed = $request->kode_embed;
        $item_virtual_tour->thumb = $thumbName;
        $item_virtual_tour->master_kategori_project_id = $request->master_kategori_project_id;
        $item_virtual_tour->save();

        return response()->json(['success' => 'Berhasil menyimpan data']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ItemVirtualTour::find($id);
        $data['kategori_project'] = $data->master_kategori_project_id?$data->master_kategori_project->nama:'';

        return response()->json(['result' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ItemVirtualTour::find($id);

        return response()->json(['result' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'nama' => 'required | max:255',
            'deskripsi' => 'required',
            'link' => 'required',
            'kode_embed' => 'required',
            'master_kategori_project_id' => 'required'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        if($request->thumb)
        {
            $errors = Validator::make($request->all(), [
                'thumb' => 'mimes:png,jpeg,jpg'
            ]);

            if($errors -> fails())
            {
                return response()->json(['errors' => $errors->errors()->all()]);
            }
        }

        $item_virtual_tour = ItemVirtualTour::find($request->hidden_id);
        $item_virtual_tour->nama = $request->nama;
        $item_virtual_tour->deskripsi = $request->deskripsi;
        $item_virtual_tour->link = $request->link;
        $item_virtual_tour->kode_embed = $request->kode_embed;
        if($request->thumb)
        {
            $thumb = $item_virtual_tour->thumb;
            File::delete(public_path('images/razen-project/item-virtual-tour/'.$thumb));

            $thumbExtension = $request->thumb->extension();
            $thumbName = uniqid().'.'.$thumbExtension;
            $thumb = Image::make($request->thumb);
            $cropSize2 = public_path('images/razen-project/item-virtual-tour/'.$thumbName);
            $thumb->save($cropSize2, 60);

            $item_virtual_tour->thumb = $thumbName;
        }
        $item_virtual_tour->master_kategori_project_id = $request->master_kategori_project_id;
        $item_virtual_tour->save();

        return response()->json(['success' => 'Berhasil merubah data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item_virtual_tour = ItemVirtualTour::find($id);

        $thumb = $item_virtual_tour->thumb;
        File::delete(public_path('images/razen-project/item-virtual-tour/'.$thumb));

        $item_virtual_tour->delete();
    }
}
