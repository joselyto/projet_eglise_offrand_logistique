@extends('app.app_logistique')
@section('content') 
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4 ">Effectuer un mouvement : {{ $materiel->libelle }}</h4>
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
        <form action="{{ route('inser.mouv_logistique.form', $materiel->id) }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Quantité</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="number" placeholder="Quantité" required='required' name="qte" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Mouvement</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" required='required' name="mouvement">
                        <option value="">Veuillez Selectionnez la categorie du mouvement</option>
                        @foreach ($typesmouvs as $typesmouv)
                            <option value="{{ $typesmouv->id }}">{{ $typesmouv->libelle }}</option>     
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Motif</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="motif" placeholder="Motive" type="text"  autocomplete="off">
                </div>
            </div>
            
            <hr>
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </form>
    </div>
@endsection