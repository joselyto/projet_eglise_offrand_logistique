@extends('app.app_logistique')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Gestion des materiels</h4>
                </div>
              
            </div>
           
        </div>
    </div>
    <div class="card-box mb-30">
      
        <div class="pd-20 d-flex justify-content-between">
            {{-- <div class="dropdown">
                <a href="{{ route('offrande.ordinaire.dollar') }}" class="btn btn-primary">
                    En dollar($)
                </a>
                
            </div>
            <div class="dropdown">
                <a href="{{ route('offrande.ordinaire.franc') }}" class="btn btn-primary">
                    En franc(FC)
                </a>
                
            </div> --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h4 class="text-blue h4">Vue d'ensemble des Mouvements</h4>
        
        </div>
        {{-- <div class="pb-20 pl-20">
            <span>Filtrer par date :</span>
            <input type="date" name="" id="">
        </div><br><hr> --}}
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                  
                        <th>Date</th>
                        <th>Libelle</th>
                        <th>Quantité</th>
                        <th>Type Mouv</th>
                        <th>Motif</th>
                        <th>Utilisateur</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mouvements as $mouvement)
                        <tr>
                            <td>{{ $mouvement->created_at }}</td>
                            <td>{{ $mouvement->libelle }}</td>
                            <td>{{ $mouvement->quantite }}</td>
                            @if ($mouvement->typemouvementmateriel_id == 1)
                                <td>Entrée</td>
                            @else
                                <td>Sortie</td>
                            @endif
                       
                            <td>{{ $mouvement->motif }}</td>
                            <td>{{ $mouvement->prenom }} {{ $mouvement->nom }}</td>
                    @endforeach              
                </tbody>
            </table>
            
        </div>
        
    </div>
@endsection
