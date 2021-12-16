<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use Validator;
use Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produk = Produk::paginate(4);
        $kategori = Kategori::all();
        $nama_kategori ='';
        $filterKeyword = $request->get('keyword');
        if($filterKeyword)
        {
            //dijalankan jika ada pencarian
            $produk = Produk::where('name','LIKE',"%$filterKeyword%")->paginate(4);
        }
        $filter_by_kategori = $request->get('id');
        if($filter_by_kategori){
            $produk = Produk::where('kategori_id',$filter_by_kategori)->paginate(4);

            $data_kategori = Kategori::find($filter_by_kategori);
            $nama_kategori = $data_kategori->kategori;
        }

        return view('produk.index',compact('produk','kategori','nama_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create',compact('kategori'));
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
            'name' => 'required|max:255',
            'description'=>'required|max:255',
            'kategori_id' => 'required|numeric',
            'port'=>'numeric',
            'photo'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validasi->fails())
        {
            return redirect()->route('produk.create')->withInput()->withErrors($validasi);
        }

        if($request->file('photo')->isValid()){
            $photo = $request->file('photo');
            $extention = $photo->getClientOriginalExtension();
            $namaFoto = "produk/".date('YmdHis').".".$extention;
            $upload_path = 'public/uploads/produk';
            $request->file('photo')->move($upload_path,$namaFoto);
            $input['photo'] = $namaFoto;
        }
        $input['stok'] = 0;
        Produk::create($input);
        return redirect()->route('produk.index')->with('status','Produk Berhasil ditambahkan');
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
        $kategori = Kategori::all();
        $produk = Produk::findOrFail($id);
        return view('produk.edit',compact('produk','kategori'));
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
        $produk = Produk::findOrFail($id);
        $input = $request->all();

        $validasi = Validator::make($input,[
            'name' => 'required|max:255',
            'description'=>'required|max:255',
            'kategori_id' => 'required|numeric',
            'port'=>'numeric',
            'photo'=>'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validasi->fails())
        {
            return redirect()->route('produk.edit')->withInput()->withErrors($validasi);
        }
        if($request->hasFile('photo')){
            if($request->file('photo')->isValid()){
                Storage::disk('upload')->delete($produk->photo);
                $photo = $request->file('photo');
                $extention = $photo->getClientOriginalExtension();
                $namaFoto = "produk/".date('YmdHis').".".$extention;
                $upload_path = 'public/uploads/produk';
                $request->file('photo')->move($upload_path,$namaFoto);
                $input['photo'] = $namaFoto;
             }
        }
        $produk->update($input);
        return redirect()->route('produk.index')->with('status','Data Produk Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        Storage::disk('upload')->delete($produk->photo);
        return redirect()->route('produk.index')->with('status','Data Produk Berhasil dihapus');
    }
}
