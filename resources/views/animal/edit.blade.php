@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Animal</div>

                <div class="card-body">

                    <form method="POST" action="{{route('animal.update', [$animal])}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="animal_name" value="{{$animal->name}}">
                            <small class="form-text text-muted">You can enter Name here</small>
                        </div>
                        <div class="form-group">
                            <label>Birth year: </label>
                            <input type="text" class="form-control" name="birth_year" value="{{$animal->birth_year}}">
                            <small class="form-text text-muted">You can enter Year here</small>
                        </div>
                        <div class="form-group">
                            <label>Animaml book: </label>
                            <textarea type="text" class="form-control" name="animal_book" id="summernote"></textarea>
                            <small class="form-text text-muted">You can enter Information here</small>
                        </div>
                        <div class="form-group">
                            <label>Choose specie: </label>
                            <select name="specie_id">
                                @foreach ($species as $specie)
                                <option class="form-control" value="{{$specie->id}}" @if($specie->id == $animal->specie_id) selected @endif>{{$specie->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Choose manager: </label>
                            <select name="manager_id">
                                @foreach ($managers as $manager)
                                <option class="form-control" value="{{$manager->id}}" @if($manager->id == $animal->manager_id) selected @endif>{{$manager->name}} {{$animal->animalManagers->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <button class="btn btn-outline-success btn-sm" type="submit">EDIT</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });

</script>
@endsection
