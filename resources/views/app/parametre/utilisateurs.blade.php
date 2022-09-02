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
                        <th>Responsabilité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($utilisateurs as $utilisateur)
                        <tr>
                            <td>{{ $utilisateur->created_at }}</td>
                            <td>{{ $utilisateur->nom }}</td>
                            
                            <td>{{ $utilisateur->prenom }}</td>
                          
                            <td>{{ $utilisateur->email }}</td>
                             <td>
                                 @if($utilisateur->types == 1)
                                    Logistique
                                @elseif($utilisateur->types == 2)
                                    Offrande
                                @elseif($utilisateur->types == 3)
                                    videos
                                @elseif($utilisateur->types == 4)
                                    Email
                                @elseif($utilisateur->types == 5)
                                    Administrateur
                                @endif
                             </td>
                        </tr>
                    @endforeach
 
                </tbody>
            </table>
            
        </div>
        
    </div>
@endsection
