<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Validator;
use Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pegawai = Pegawai::paginate(4);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword)
        {
            //dijalankan jika ada pencarian
            $pegawai = Pegawai::where('name','LIKE',"%$filterKeyword%")->paginate(4);
        }
        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validasi = Validator::make($input,[
            'nik' => 'required',
            'name'=>'required|max:255',
            'jk' => 'required',
            'email'=>'required|email|max:255|unique:users',
            'telp'=>'required',
            'address'=>'required|max:255',
            'photo'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validasi->fails())
        {
            return redirect()->route('pegawai.create')->withInput()->withErrors($validasi);
        }

        if($request->file('photo')->isValid()){
            $photo = $request->file('photo');
            $extention = $photo->getClientOriginalExtension();
            $namaFoto = "pegawai/".date('YmdHis').".".$extention;
            $upload_path = 'public/uploads/pegawai';
            $request->file('photo')->move($upload_path,$namaFoto);
            $input['photo'] = $namaFoto;
        }
        $input['isaktif'] = 1;
        Pegawai::create($input);
        return redirect()->route('pegawai.index')->with('status','Pegawai Berhasil ditambahkan');
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
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit',compact('pegawai'));
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
        $pegawai = Pegawai::findOrFail($id);
        $input = $request->all();

        $validasi = Validator::make($input,[
            'nik' => 'required',
            'name'=>'required|max:255',
            'jk' => 'required',
            'email'=>'required|email|max:255|unique:users',
            'telp'=>'required',
            'address'=>'required|max:255',
            'photo'=>'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        if($validasi->fails())
        {
            return redirect()->route('pegawai.edit')->withInput()->withErrors($validasi);
        }
        if($request->hasFile('photo')){
            if($request->file('photo')->isValid()){
                Storage::disk('upload')->delete($pegawai->photo);
                $photo = $request->file('photo');
                $extention = $photo->getClientOriginalExtension();
                $namaFoto = "pegawai/".date('YmdHis').".".$extention;
                $upload_path = 'public/uploads/pegawai';
                $request->file('photo')->move($upload_path,$namaFoto);
                $input['photo'] = $namaFoto;
            }
        }
         $pegawai->update($input);
         return redirect()->route('pegawai.index')->with('status','Data Pegawai Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        Storage::disk('upload')->delete($pegawai->photo);
        return redirect()->route('pegawai.index')->with('status','Data Pegawai Berhasil dihapus');
    }
}
