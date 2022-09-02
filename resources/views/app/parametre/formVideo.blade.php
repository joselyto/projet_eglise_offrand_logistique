@extends('app.app_parametre')
@section('content') 
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4 ">Ajouter des videos</h4>
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
        <form action="{{ route('inser_videos') }}" method="POST">
            @csrf
           
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">lien de la video</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="" required='required' name="video" autocomplete="off">
                </div>
            </div>
            
                <hr>
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </form>
    </div>
@endsection