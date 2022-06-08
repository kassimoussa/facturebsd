@extends('layouts.app', ['page' => 'Facture BSCS', 'pageSlug' => 'bscs', 'sup' => ''])

@section('content')
    <div class="row  py-3 px-3">
        <div class="d-flex justify-content-between mb-4 ">
            <h3 class="over-title ">Facture BSCS </h3>
            @if (session('level')== "1")
             <a href="upload_bscs" class="btn   btn-primary  fw-bold">Upload</a>   
            @endif
            
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

        @livewire('facturebscs')
    </div>
 
    <script>
        jQuery(document).ready(function($) {
            $('*[data-href]').on('click', function() {
                window.location = $(this).data("href");
            });
        });
    </script>

@endsection
