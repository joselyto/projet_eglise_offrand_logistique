@extends('app.app')
@section('content') 
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4 ">Ajouter un mouvement dans l'offrande Social</h4>
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
        <form action="{{ route('inser_offr_soc') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Mouvement</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" required='required' name="mouvement">
                        <option value="">Veuillez specifié le mouvement</option>
                        @foreach ($typemouvs as $typemouv)
                            <option value="{{ $typemouv->id }}">{{ $typemouv->libelle }}</option>
                        @endforeach
                    
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Motif</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Veuillez justifier le motif du mouvement" required='required' name="motif" autocomplete="off">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Montant</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="montant" placeholder="Ecrivez le montant" type="number" required='required' autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">La Monnaie</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" required='required' name="monnaie">
                        <option value="">Veuillez Selectionnez la monnaie du mouvement</option>
                        <option value="1">Dollar ($)</option>
                        <option value="2">Franc Congolais (FC)</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Date</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="date_concerner" placeholder="Selectionner la date" type="date" required='required'>
                </div>
            </div><hr>
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </form>
    </div>
@endsection