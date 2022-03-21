<?php

namespace App\Http\Controllers;

use App\Models\Impaye;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InvoiceExport;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('1.files_upload');
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
                if(Impaye::where('name', $name)->exists())
                {
                    return back()->with('fail', 'Le fichier '.$name .' existe déja dans la base des données');
                }else{
                    $insert[$key]['name'] = $name;
                   // $path = $file->storeAs('public/files', $name);
                    $path = "public/files/". $name;
                    $insert[$key]['path'] = $path;
                }
                
            }
         }
         Impaye::insert($insert);
        return back()->with('success', 'Multiple File has been uploaded into db and storage directory');
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

   

    public function getFiles(Request $request)
    {

        //dd($files);
        $search = $request['search'] ?? "";
        if ($request->has('search')) {
            $search = $request['search'];

            $path = public_path('21');
            $files = File::files($path);
        } else {
            $path = public_path('21');
            $files = File::allFiles($path);
        }
        return view('1.list', compact('files'));
    }
 
}
