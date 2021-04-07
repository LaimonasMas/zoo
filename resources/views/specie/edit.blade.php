@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Specie</div>

                <div class="card-body">

                    <form method="POST" action="{{route('specie.update',[$specie->id])}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="specie_name" value="{{old('specie_name',$specie->name)}}">
                            <small class="form-text text-muted">You can edit Name here</small>
                        </div>
                        @csrf
                        <button class="btn btn-outline-secondary btn-sm" type="submit">EDIT</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
