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
use App\Models\RazenProject\Admin\RazenProjectBrosur;

class BrosurController extends Controller
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
            $data = RazenProjectBrosur::latest()->get();
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
                ->editColumn('nama', function($data) {
                    if($data->tipe == 'pdf')
                    {
                        return '<embed src="'.asset('pdf/layanan/'.$data->nama).'" style="width: 100%; height: 20rem;">';
                    }
                    if($data->tipe == 'docx')
                    {
                        return '<iframe src="https://view.officeapps.live.com/op/embed.aspx?src='.asset('docx/layanan/'.$data->nama).'" frameborder="0" style="width: 100%; height: 20rem;"></iframe>';
                    }
                })
                ->editColumn('status', function($data){
                    if($data->status == '1')
                    {
                        return '<span class="badge bg-primary text-uppercase">Aktif</span>';
                    }
                    if($data->status = '0')
                    {
                        return '<span class="badge bg-primary text-secondary">Tidak Aktif</span>';
                    }
                })
                ->rawColumns(['aksi', 'nama', 'status'])
                ->make(true);
        }
        return view('razen-project.admin.brosur.index');
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
            'brosur' => 'required | mimes:pdf,docx'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $brosurExtension = $request->brosur->extension();
        $cek_brosur_by_extension = RazenProjectBrosur::where('tipe', $brosurExtension)->where('status', 1)->first();
        if($cek_brosur_by_extension)
        {
            return response()->json(['errors' => 'Tidak dapat menyimpan karena ada brosur yang aktif!']);
        }

        $brosurName = uniqid().'-'.date("ymd").'.'.$brosurExtension;
        if($brosurExtension == 'pdf')
        {
            $request->brosur->move(public_path('pdf/layanan'), $brosurName);
        }

        if($brosurExtension == 'docx')
        {
            $request->brosur->move(public_path('docx/layanan'), $brosurName);
        }

        $brosur = new RazenProjectBrosur;
        $brosur->tipe = $brosurExtension;
        $brosur->nama = $brosurName;
        $brosur->status = '1';
        $brosur->save();

        return response()->json(['success' => 'Berhasil Menyimpan Brosur!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RazenProjectBrosur::find($id);
        if($data->status == '1')
        {
            $data->status_brosur =  'Aktif';
        }
        if($data->status = '0')
        {
            $data->status_brosur = 'Tidak Aktif';
        }

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
        return response()->json(['result' => RazenProjectBrosur::find($id)]);
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
            'status_brosur' => 'required'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        if($request->brosur)
        {
            $errors = Validator::make($request->all(), [
                'brosur' => 'required | mimes:pdf,docx'
            ]);

            if($errors -> fails())
            {
                return response()->json(['errors' => $errors->errors()->all()]);
            }
        }

        $brosur = RazenProjectBrosur::find($request->hidden_id);

        if($request->brosur)
        {
            $brosurExtension = $request->brosur->extension();
            $cek_brosur_by_extension = RazenProjectBrosur::where('tipe', $brosurExtension)->where('status', 1)->first();
            if($cek_brosur_by_extension->id != $request->hidden_id)
            {
                return response()->json(['errors' => 'Tidak dapat menyimpan karena ada brosur yang aktif!']);
            }

            $brosurName = uniqid().'-'.date("ymd").'.'.$brosurExtension;
            if($brosurExtension == 'pdf')
            {
                File::delete(public_path('pdf/layanan/'.$brosur->nama));

                $request->brosur->move(public_path('pdf/layanan'), $brosurName);
            }

            if($brosurExtension == 'docx')
            {
                File::delete(public_path('docx/layanan/'.$brosur->nama));

                $request->brosur->move(public_path('docx/layanan'), $brosurName);
            }

            $brosur->tipe = $brosurExtension;
            $brosur->nama = $brosurName;
        }
        $brosur->status = $request->status_brosur;
        $brosur->save();

        return response()->json(['success' => 'Berhasil Menyimpan Brosur!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brosur = RazenProjectBrosur::find($id);

        if($brosur->tipe == 'pdf')
        {
            File::delete(public_path('pdf/layanan/'.$brosur->nama));
        }

        if($brosur->tipe == 'docx')
        {
            File::delete(public_path('docx/layanan/'.$brosur->nama));
        }

        $brosur->delete();
    }
}
