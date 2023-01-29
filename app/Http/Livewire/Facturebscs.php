<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bscs;
use Livewire\WithPagination;

class Facturebscs extends Component
{
    public $searche ;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $searche =  $this->searche ;

        $invoices =  Bscs::where('name', 'Like', '%' . $searche . '%') ->orderBy('id', 'asc')->paginate(50);
        return view('livewire.facturebscs', ['invoices' => $invoices]);
    }
}
