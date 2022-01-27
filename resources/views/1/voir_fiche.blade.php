@extends('layouts.app', ['page' => 'Fiche Journalière', 'pageSlug' => 'fiche', 'sup' => 'fiche'])
@section('content')
    <div class="container ">
        <div class="d-flex justify-content-between mb-3" style="width: 100%">
            <h3 class="over-title ">FICHE D'OBSERVATION  </h3>
            {{-- <a href="/acquisition" class="btn  btn-primary  fw-bold">RETOURNER</a> --}}
            <a href="{{ url('/fiche_pdf', $fiche) }}"
            class="btn  btn-primary  fw-bold text-white">IMPRIMER</a>
        </div>
        <div class="d-flex justify-content-between " >
            <h5>N° {{ $fiche->id }}</h5>
            <h5>{{ date('d/m/Y', strtotime($fiche->date_ajout)) }}</h5>
        </div>
        <div class="card col mb-3">
            <h4 class="card-header text-center bg-dark text-white">Informations du client</h4>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text txt fw-bold ">Nom ou Raison Sociale</span>
                        <label class="form-control">{{ $fiche->nom_client }} </label> 
                    </div> 
                </div>
                <div class="col-md-12">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text txt fw-bold ">Adresse</span>
                        <label class="form-control">{{ $fiche->adresse_client }} </label> 
                    </div> 
                </div>
                <div class="col-md-12">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text txt fw-bold ">N° Compte</span>
                        <label class="form-control">{{ $fiche->num_compte }} </label> 
                    </div> 
                </div> 
            </div>
        </div>

        <div class="card col mb-3">
            <h4 class="card-header text-center bg-dark text-white">PROPOSITION DC</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt2 fw-bold ">Type</span>
                            <label class="form-control">{{ $fiche->type }} </label> 
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt2 fw-bold ">Service</span>
                            <label class="form-control">{{ $fiche->service }} </label> 
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt2 fw-bold ">Facture N°</span>
                            <label class="form-control">{{ $fiche->num_facture }} </label> 
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt2 fw-bold ">Montant TTC</span>
                            <label class="form-control">{{ $fiche->mont_facture }} FDJ </label> 
                        </div> 
                    </div> 
                </div>
            </div>
        </div>

        <div class="card col mb-3">
            <h4 class="card-header text-center bg-dark text-white">Observation Chef de Service Facturation</h4>
            <div class="card-body">
                <textarea class="form-control textarea" aria-label="With textarea" name="obs_cs_facturation" rows="5"  > {{ $fiche->obs_cs_facturation }}</textarea>
            </div>
        </div>

        @if ($fiche->status != null) 
        <div class="card col mb-3">
            <h4 class="card-header text-center bg-dark text-white">Avis et Observation Chef de Division SI</h4>
            <div class="card-body">
                <div class="col mb-2 d-flex justify-content-between">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="pcb" value="Favorable" @if ($fiche->status == "Favorable") checked  @else disabled  @endif>
                        <label class="form-check-label" for="pcb">Favorable</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="pcp"
                            value="Defavorable" @if ($fiche->status == "Defavorable") checked  @else disabled @endif>
                        <label class="form-check-label" for="pcp">Defavorable</label>
                    </div> 
                </div>
                <textarea class="form-control textarea" aria-label="With textarea" name="obs_cd_si"  >{{ $fiche->obs_cd_si }} </textarea>
            </div>
        </div>
        @endif
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
            width: 170px;
            background: lavender;
        }
        .txt2 {
            width: 100px;
            background: lavender;
        }
        .textarea{
            font-size: 18x;
            font-weight: bold
        }

    </style>

@endsection
