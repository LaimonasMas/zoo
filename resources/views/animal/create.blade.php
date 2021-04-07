@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Animal</div>

                <div class="card-body">

                    <form method="POST" action="{{route('animal.store')}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="animal_name" value="{{old('animal_name')}}">
                            <small class="form-text text-muted">You can enter Name here</small>
                        </div>
                        <div class="form-group">
                            <label>Birth year: </label>
                            <input type="text" class="form-control" name="birth_year" value="{{old('birth_year')}}">
                            <small class="form-text text-muted">You can enter Year here</small>
                        </div>
                        <div class="form-group">
                            <label>Animaml book: </label>
                             <textarea type="text" class="form-control" id="summernote" name="animal_book">{{old('animal_book')}}</textarea>
                            <small class="form-text text-muted">You can enter Information here</small>
                        </div>
                        <div class="form-group">
                            <label>Choose specie: </label>
                            <select name="specie_id">
                                @foreach ($species as $specie)
                                <option class="form-control" value="{{$specie->id}}">{{$specie->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Choose manager: </label>
                            <select name="manager_id">
                                @foreach ($managers as $manager)
                                <option class="form-control" value="{{$manager->id}}">{{$manager->name}} {{$manager->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <button class="btn btn-outline-success btn-sm" type="submit">ADD</button>
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
