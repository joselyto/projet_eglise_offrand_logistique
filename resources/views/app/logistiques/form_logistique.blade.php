@extends('app.app_logistique')
@section('content') 
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4 ">Ajouter les materiels</h4>
            </div>
            <br>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>                    
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('inser.logistique.form') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Libelle</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Veuillez inserer le libellé de votre materiel" required='required' name="libelle" autocomplete="off">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Quantité</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="quantite" placeholder="Ecrivez la quantité" type="number" required='required' autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Categorie du materiel</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" required='required' name="categorie">
                        <option value="">Veuillez Selectionnez la categorie du mouvement</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                            
                        @endforeach
                    </select>
                </div>
            </div>
            
           <hr>
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </form>
    </div>
@endsection