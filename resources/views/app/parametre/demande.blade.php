@extends('app.app_parametre')
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
                        <li class="breadcrumb-item active" aria-current="page">demmande d'acces</li>
                    </ol>
                </nav>
            </div>
          
        </div>
    </div>
    <div class="card-box mb-30">
        
        <div class="pd-20 d-flex justify-content-between">
            
            <h4 class="text-blue h4">Vue d'ensemble de demandes d'acces</h4>
          
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{-- <div class="pb-20 pl-20">
            <span>Filtrer par date :</span>
            <input type="date" name="" id="">
        </div><br><hr> --}}
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                  
                        <th>Date</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>email</th>
                        <th>Logistique</th>
                        <th>l'offrande</th>
                        <th>videos</th>
                        <th>email</th>
                        <th>Admin</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demandes as $demande)
                        <tr>
                            <td>{{ $demande->created_at }}</td>
                            <td>{{ $demande->nom }}</td>
                            
                            <td>{{ $demande->prenom }}</td>
                          
                            <td>{{ $demande->email }}</td>
                             
                            <td><a href="{{ route('valider1', $demande->id) }}" class="btn btn-primary">Valider</a>
                            <td><a href="{{ route('valider2', $demande->id) }}" class="btn btn-primary">Valider</a>
                            <td><a href="{{ route('valider3', $demande->id) }}" class="btn btn-primary">Valider</a>
                            <td><a href="{{ route('valider4', $demande->id) }}" class="btn btn-primary">Valider</a>
                            <td><a href="{{ route('valider5', $demande->id) }}" class="btn btn-danger">Valider</a>

                        </tr>
                    @endforeach
 
                </tbody>
            </table>
            
        </div>
        
    </div>
@endsection
