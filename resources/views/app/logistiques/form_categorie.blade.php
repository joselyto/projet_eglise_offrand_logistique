@extends('app.app_logistique')
@section('content') 
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4 ">Ajouter une categorie</h4>
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
        <form action="{{ route('inser.categorie.form') }}" method="POST">
            @csrf
 
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Libelle</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Libelle des Categories" required='required' name="libelle" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="desc" placeholder="Description de la categorie" type="text"  autocomplete="off">
                </div>
            </div>
            <hr>
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </form>
    </div>
@endsection