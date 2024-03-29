<?php

namespace App\Http\Controllers;

use App\Models\Gaia;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\File;

class GaiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('1.gaia');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('1.gaia_upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $name = $file->getClientOriginalName();
                $insert[$key]['name'] = $name;
                $path = $file->storeAs('public/gaia', $name);
                //$path = "storage/gaia/" . $name;
                $insert[$key]['path'] = "storage/gaia/" . $name;
                /* if(Bscs::where('name', $name)->exists())
                {
                    return back()->with('fail', 'Le fichier '.$name .' existe déja dans la base des données');
                }else{
                    $insert[$key]['name'] = $name;
                    //$path = $file->storeAs('public/bscs', $name);
                    $path = "storage/bscs/". $name;
                    $insert[$key]['path'] = "storage/bscs/". $name;
                } */
            }
        }
        Gaia::insert($insert);
        return back()->with('success', 'Multiple File has been uploaded into db and storage directory');
    }

    public function deleteGaia(Request $request)
    {
        $id = $request->id;
        foreach ($id as $imp) {
            $gaia = Gaia::where('id', $imp)->first();
            $path = 'storage/gaia/' . $gaia->name;
            if (File::exists($path)) {
                File::delete($path);
                // return back()->with('success', 'document supprimé');
            } else {
                // return back()->with('fail','File does not exists.');
            }
            Gaia::where('id', $imp)->delete();
        }
        return back()->with('success', 'Files deleted');
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
}
