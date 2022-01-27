@extends('layouts.app', ['page' => 'Modifier fiche', 'pageSlug' => 'list', 'sup' => 'fiche'])
@section('content')
    <div class="row mt-3">
        <div class="d-flex justify-content-between mb-3 ">
            <h3 class="fw-bold">Fiche d'observation</h3>
            <a href="/index" class="btn   btn-primary  fw-bold"> <i class="fas fa-arrow-left"></i> RETOURNER</a>
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

            <form action="{{ url('/update', $fiche) }}" role="form" method="post" class="form">
                @csrf
                @method('PUT')
                <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white">Informations du client</h4>
                    <div class="card-body">
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Nom ou Raison Sociale <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nom_client" value="{{ $fiche->nom_client }}" required>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Adresse <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="adresse_client" value="{{ $fiche->adresse_client }}" required>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">N° Compte <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="num_compte" value="{{ $fiche->num_compte }}" required>
                        </div>
                    </div>
                </div>

                <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white"> PROPOSITION DC</h4>
                    <div class="card-body">
                        <div class="row"> 
                            
                            <div class="form-group control-label mb-1 col-md-3">
                                <label class="control-label">Type <span class="text-danger">*</span></label>
                                <select class="form-select js-select2" name="type" id="services">
                                    <option value="" disabled selected>Select type</option>
                                    <option value="Dégrevement" @if($fiche->type == "Dégrevement") selected @endif>Dégrevement</option>
                                    <option value="Ajustement" @if($fiche->type == "Ajustement") selected @endif>Ajustement</option>
                                    <option value="OCC" @if($fiche->type == "OCC") selected @endif>OCC</option>
                                </select>
                            </div>
                            <div class="form-group control-label mb-1 col-md-3">
                                <label class="control-label">Service <span class="text-danger">*</span></label>
                                <select class="form-select js-select2" name="service" >
                                    <option value="" disabled selected>Select service</option>
                                    <option value="Internet" @if($fiche->service == "Internet") selected @endif >Internet</option>
                                    <option value="Fix" @if($fiche->service == "Fix") selected @endif >Fix</option>
                                    <option value="Mobile" @if($fiche->service == "Mobile") selected @endif >Mobile</option>
                                </select>
                            </div>
                            <div class="form-group control-label mb-1 col-md-3">
                                <label class="control-label">N° Facture <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="num_facture" value="{{ $fiche->num_facture }}" required>
                            </div>
                            <div class="form-group control-label mb-1 col-md-3">
                                <label class="control-label">Montant TTC <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="mont_facture" value="{{ $fiche->mont_facture }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white">Observation Chef de Service Facturation</h4>
                    <div class="card-body">
                        <textarea class="form-control" aria-label="With textarea" name="obs_cs_facturation"
                            rows="8" required > {{ $fiche->obs_cs_facturation }}</textarea>
                    </div>
                </div>

                {{-- <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white">Avis et Observation Chef de Division SI</h4>
                    <div class="card-body">
                        <textarea class="form-control" aria-label="With textarea" name="obs_cd_si" rows="2"> </textarea>
                    </div>
                </div> --}}

                <div class="row mb-3">
                    <div class=" form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary fw-bold">Modifier</button>
                        <button type="reset" class="btn btn-outline-danger  fw-bold">Annuler</button>
                        <input type="text" name="date_ajout" value="{{ date('Y-m-d H:i:s') }}" hidden>

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
