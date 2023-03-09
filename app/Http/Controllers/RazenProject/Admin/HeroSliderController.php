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
use App\Models\RazenProject\Admin\RazenProjectHeroSlider;

class HeroSliderController extends Controller
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
            $data = RazenProjectHeroSlider::latest()->get();
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
                ->editColumn('gambar', function($data) {
                    return '<img src="'.asset('images/razen-project/gambar-slider/'.$data->gambar).'" style="height:5rem;">';
                })
                ->rawColumns(['aksi', 'gambar'])
                ->make(true);
        }
        return view('razen-project.admin.section.hero-slider.index');
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
            'heading' => 'required | max:255',
            'title' => 'required | max:255',
            'gambar' => 'required | mimes:png,jpg,jpeg,webp'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $gambarExtension = $request->gambar->extension();
        $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
        $gambar = Image::make($request->gambar);
        $gambarSize = public_path('images/razen-project/gambar-slider/'.$gambarName);
        $gambar->save($gambarSize, 60);

        $hero_slider = new RazenProjectHeroSlider;
        $hero_slider->heading = $request->heading;
        $hero_slider->title = $request->title;
        $hero_slider->gambar = $gambarName;
        $hero_slider->save();

        return response()->json(['success' => 'Berhasil menambahkan data']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RazenProjectHeroSlider::find($id);

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
        $data = RazenProjectHeroSlider::find($id);

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
            'heading' => 'required | max:255',
            'title' => 'required | max:255'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        if($request->gambar)
        {
            $errors = Validator::make($request->all(), [
                'gambar' => 'required | mimes:png,jpg,jpeg,webp'
            ]);

            if($errors -> fails())
            {
                return response()->json(['errors' => $errors->errors()->all()]);
            }
        }

        $hero_slider = RazenProjectHeroSlider::find($request->hidden_id);
        $hero_slider->heading = $request->heading;
        $hero_slider->title = $request->title;
        if($request->gambar)
        {
            File::delete(public_path('images/razen-project/gambar-slider/'.$hero_slider->gambar));

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/razen-project/gambar-slider/'.$gambarName);
            $gambar->save($gambarSize, 60);
            $hero_slider->gambar = $gambarName;
        }
        $hero_slider->save();

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
        $hero_slider = RazenProjectHeroSlider::find($id);

        File::delete(public_path('images/razen-project/gambar-slider/'.$hero_slider->gambar));

        $hero_slider->delete();
    }
}
