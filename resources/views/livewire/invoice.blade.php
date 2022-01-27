<div class=" ">
 
    <div class="d-flex justify-content-start mb-2">
        <div class="input-group  mb-3">
            <span class="input-group-text bg-dark text-white fw-bold ">Recherche</span>
            <input type="text" class="form-control " wire:model="searche"
                placeholder="Par invoice number">
        </div>
    </div>

    <div>
        <table class="table tablesorter table-sm table-hover" id="">
            <thead class=" text-primary text-center">
                <th scope="col">#</th>
                <th scope="col">File Name</th> 
                <th scope="col">Action</th>
            </thead>
            <tbody class=" text-center">
                @if (!empty($invoices) && $invoices->count())
                    @php
                        $cnt = 1;
                    @endphp

                    @foreach ($invoices as $key => $invoice) 
                        <tr  >
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->name }}</td> 
                            <td class="td-actions ">
                                <a href="{{asset('storage/files/'.$invoice->name) }}" target="_blank" class="btn btn-link" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Télécharger la facture ">
                                    <i class="fas fa-download"></i>
                                </a> 
                            </td>
                        </tr>
                        
                        @php
                            $cnt = $cnt + 1;
                        @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">Aucune fiche trouvée pour cette recherche.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $invoices->links() }}
        </div>
       

    </div>
</div>
