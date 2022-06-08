<?php

namespace App\Http\Controllers;

use App\Models\Bscs;
use Illuminate\Http\Request; 
use PDF;
use Illuminate\Support\Facades\File;

class BscsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('1.bscs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('1.bscs_upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
         
        if($request->hasfile('files'))
         {
            foreach($request->file('files') as $key => $file)
            {
                $name = $file->getClientOriginalName();
                if(Bscs::where('name', $name)->exists())
                {
                    return back()->with('fail', 'Le fichier '.$name .' existe déja dans la base des données');
                }else{
                    $insert[$key]['name'] = $name;
                    $path = $file->storeAs('public/bscs', $name);
                    //$path = "public/files/". $name;
                    $insert[$key]['path'] = "storage/bscs/". $name;
                }
                
            }
         }
         Bscs::insert($insert);
        return back()->with('success', 'Multiple File has been uploaded into db and storage directory');
    }

    public function deleteBscs(Request $request)
	{
		$id = $request->id;
		foreach ($id as $imp) 
		{
            $bscs = Bscs::where('id', $imp)->first();
            $path = 'storage/bscs/'.$bscs->name;
        if(File::exists($path)){
            File::delete($path); 
           // return back()->with('success', 'document supprimé');
        }else{
           // return back()->with('fail','File does not exists.');
        }
        Bscs::where('id', $imp)->delete();
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
