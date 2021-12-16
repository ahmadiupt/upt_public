<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gedung;
use Validator;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gedung = Gedung::paginate(4);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword)
        {
            //dijalankan jika ada pencarian
            $gedung = Gedung::where('namagedung','LIKE',"%$filterKeyword%")->paginate(4);
        }
        return view('gedung.index',compact('gedung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gedung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data,[
            'namagedung'=>'required|max:255|',
            'detilgedung'=>'required|max:255',
            'denahgedung'=>'max:255'
        ]);

        if($validasi->fails())
        {
            return redirect()->route('gedung.create')->withInput()->withErrors($validasi);
        }

        Gedung::create($data);
        return redirect()->route('gedung.index')->with('status','Gedung Berhasil ditambahkan');
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
        $gedung = Gedung::findOrFail($id);
        return view('gedung.edit',compact('gedung'));
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
        $gedung = Gedung::findOrFail($id);
        $data = $request->all();
        $validasi = Validator::make($data,[
            'namagedung'=>'required|max:255|',
            'detilgedung'=>'required|max:255',
            'denahgedung'=>'max:255'
        ]);

        if($validasi->fails())
        {
            return redirect()->route('gedung.edit',[$id])->withErrors($validasi);
        }

        $gedung->update($data);
        return redirect()->route('gedung.index')->with('status','Gedung Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Gedung::findOrFail($id);
        $data->delete();
        return redirect()->route('gedung.index')->with('status','Gedung Berhasil didelete');
    }
}
