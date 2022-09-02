@extends('app.app')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Gestion des offrandes</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Offrandes</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div class="dropdown">
                    <a href="{{ route('offrande.ordinaireForm') }}" class="btn btn-primary">
                        Ajouter nouveau
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="card-box mb-30">
        
        <div class="pd-20 d-flex justify-content-between">
            <div class="dropdown">
                <a href="#" class="btn btn-success">
                    En dollar($)
                </a>    
            </div>
            <div class="dropdown">
                <a href="{{ route('offrande.ordinaire.franc') }}" class="btn btn-primary">
                    En franc(FC)
                </a>
                
            </div>
            <h4 class="text-blue h4">Vue d'ensemble de l'offrande ordinaire</h4>
            <div class="sold pl-10 d-flex">
                <div class="dol">
                    <span>Solde dollar </span><h4>$ {{ $result_dollar }}</h4>
                </div>
              
            </div>
        </div>
        {{-- <div class="pb-20 pl-20">
            <span>Filtrer par date :</span>
            <input type="date" name="" id="">
        </div><br><hr> --}}
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                  
                        <th>Date saisie</th>
                        <th>Code concerner</th>
                        <th>Mouvement</th>
                        <th>Montant</th>
                        <th>Monnaie</th>
                        <th>Motif</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mouvementoffrandes_dollars as $mouvementoffrandes_dollar)
                        <tr>
                            <td>{{ $mouvementoffrandes_dollar->created_at }}</td>
                            <td>{{ $mouvementoffrandes_dollar->date_concerner }}</td>
                            <td>
                                @if ($mouvementoffrandes_dollar->typemouvementoffrande_id == 1)
                                    Entrée
                                @else
                                    Sortie
                                @endif
                            </td>
                            <td>{{ $mouvementoffrandes_dollar->montant }}</td>
                            <td>
                                @if ($mouvementoffrandes_dollar->monnaie == 1)
                                    $
                                @else
                                    FC
                                @endif
                            </td>
                            <td>{{ $mouvementoffrandes_dollar->motif }}</td>
                            <td>{{ $mouvementoffrandes_dollar->prenom }} {{ $mouvementoffrandes_dollar->nom }}</td>
                        </tr>
                    @endforeach
              
                  
                    
                </tbody>
            </table>
            
        </div>
        
    </div>
@endsection
