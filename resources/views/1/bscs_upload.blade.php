@extends('layouts.app', ['page' => 'Ajout', 'pageSlug' => 'bscs', 'sup' => 'fiche'])
@section('content')
    <div class="row mt-3">
        <div class="d-flex justify-content-between mb-3 ">
            <h3 class="fw-bold">Factures bscs uploading</h3>
            <a href="bscs" class="btn   btn-primary  fw-bold"> <i class="fas fa-arrow-left"></i> RETOURNER</a>
        </div>
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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

            <form action="bscsstore" role="form" method="post" class="form" enctype="multipart/form-data">
                @csrf

                <div class="p-3">
                    <div class="card  mb-3">
                        <h4 class="card-header bg-dark text-center">Facture</h4>
                        <div class="card-body">
                            <div class="mb-3">
                                <input class="form-control" type="file" name="files[]" id="formFile" multiple>
                                @error('files')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class=" form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary fw-bold">Ajouter</button>
                            <button type="reset" class="btn btn-outline-danger  fw-bold">Annuler</button>
                            <input type="text" name="date_ajout" value="{{ date('Y-m-d H:i:s') }}" hidden>

                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <style>
        .btn-default:hover {
            background-color: red !important;
            color: white;
        }

        .btn-primary {
            color: white;
        }

        .txt {
            width: 150px;
            background: lavender;
        }

    </style>

@endsection
