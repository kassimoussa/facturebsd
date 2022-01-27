@extends('layouts.app', ['page' => 'Accueil', 'pageSlug' => 'accueil', 'sup' => ''])

@section('content')
    <div class="row  py-3 px-3">
        <div class="d-flex justify-content-between mb-4 ">
            <h3 class="over-title ">Facture </h3>
            <a href="/export" class="btn   btn-primary  fw-bold">Exporter</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($message = Session::get('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif 

        <div class=" ">
            <form action="">
            <div class="d-flex justify-content-start mb-2">
                <div class="input-group  mb-3">
                    <button type="submit" class="input-group-text bg-dark text-white fw-bold ">Recherche</button>
                    <input type="text" class="form-control " name="searche"
                        placeholder="Par  invoice number ou username,  ">
                </div>
            </div>
        </form>
            <div>
                <table class="table tablesorter table-sm table-hover" id="">
                    <thead class=" text-primary text-center">
                        <th scope="col">Invoice Number</th> 
                    </thead>
                    <tbody class=" text-center">
                        @if (!empty($files)  )
                            @php
                                $cnt = 1;
                            @endphp
        
                            @foreach ($files as   $invoice) 
                                <tr  >
                                    <td>{{ $invoice }}</td>  
                                    <td class="td-actions ">
                                        <a href="21/{{ $invoice->getFilename() }}" target="_blank" class="btn btn-link" data-bs-toggle="tooltip"
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
        
            </div>
        </div>
        
    </div>
 
    <script>
        jQuery(document).ready(function($) {
            $('*[data-href]').on('click', function() {
                window.location = $(this).data("href");
            });
        });
    </script>

@endsection
