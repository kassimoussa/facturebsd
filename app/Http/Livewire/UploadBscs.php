<?php

namespace App\Http\Livewire;

use App\Models\Bscs;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadBscs extends Component
{
    use WithFileUploads;

    public $files = [];
    public $fileNames = [];


    public function save()
    {
        foreach ($this->files as $key => $file) {
            $name = $file->getClientOriginalName();
            if (Bscs::where('name', $name)->exists()) {
                continue;
            }
            $bscs = new Bscs();
            $bscs->name = $name;
            $bscs->path = "storage/bscs/" . $name;
            $bscs->save();

            /* $insert[$key]['name'] = $name;
            $insert[$key]['path'] = "storage/bscs/" . $name; */
        }
        /* $query =  Bscs::insert($insert);
        if ($query) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Ajout réussi!']
            );
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Erreur lors de l'ajout!"]
            );
        } */
    }

    public function storeFileNames($fileNames)
    {
        foreach ($fileNames as $fileName) {
            Bscs::insert(['name' => $fileName, 'path' => "storage/bscs/".$fileName]);
        }
    }

    public function render()
    {
        return view('livewire.upload-bscs');
    }
}
