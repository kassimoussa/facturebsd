<?php

namespace App\Http\Livewire;

use App\Models\Gaia;
use Livewire\Component;
use Livewire\WithPagination;

class Facturegaia extends Component
{
    public $searche ;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $searche =  $this->searche ;

        $invoices =  Gaia::where('name', 'Like', '%' . $searche . '%') ->orderBy('id', 'asc')->paginate(50);
        return view('livewire.facturegaia', ['invoices' => $invoices]);
    }
}
