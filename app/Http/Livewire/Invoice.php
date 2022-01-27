<?php

namespace App\Http\Livewire;

use App\Models\Impaye;
use Livewire\Component;
use Livewire\WithPagination;

class Invoice extends Component
{
    //public $invoices ;
    public $searche ;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        /* $searche = '%'. $this->searche .'%' ; */
        // sleep(1);
        $searche =  $this->searche ;

        $invoices =  Impaye::where('name', 'Like', '%' . $searche . '%') ->orderBy('id', 'asc')->paginate(50);
        //$this->invoices =  Impaye::all();
        return view('livewire.invoice', ['invoices' => $invoices]);
    }
}
