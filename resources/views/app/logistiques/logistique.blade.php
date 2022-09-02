@extends('app.app_logistique')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Gestion des materiels</h4>
                </div>
              
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div class="dropdown">
                    <a href="{{ route('logistique.form') }}" class="btn btn-primary">
                        Ajouter nouveau
                    </a>
                    
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
            <h4 class="text-blue h4">Vue d'ensemble des materiaux</h4>
        
        </div>
        {{-- <div class="pb-20 pl-20">
            <span>Filtrer par date :</span>
            <input type="date" name="" id="">
        </div><br><hr> --}}
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                  
                        <th>N°</th>
                        <th>Libelle</th>
                        <th>Quantité</th>
                        <th>Date</th>
                      
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materiels as $materiel)
                        <tr>
                            <td>{{ $materiel->id }}</td>
                            <td>{{ $materiel->libelle }}</td>
                            <td>{{ $materiel->quantite }}</td>
                           
                            <td>{{ $materiel->created_at }}</td>
                            <td><a href="{{ route('mouv.logistique.form', $materiel->id) }}" class="btn btn-primary">Mouvement</a>
                            </tr>
                    @endforeach
              
                  
                    
                </tbody>
            </table>
            
        </div>
        
    </div>
@endsection
