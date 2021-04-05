@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Manager</div>

                <div class="card-body">

                    <form method="POST" action="{{route('manager.update',[$manager])}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="manager_name" value="{{$manager->name}}">
                            <small class="form-text text-muted">You can edit Name here</small>
                        </div>
                        <div class="form-group">
                            <label>Surname: </label>
                            <input type="text" class="form-control" name="manager_surname" value="{{$manager->surname}}">
                            <small class="form-text text-muted">You can edit Surname here</small>
                        </div>
                        <div class="form-group">
                            <select name="specie_id">
                                @foreach ($species as $specie)
                                <option class="form-control" value="{{$specie->id}}" @if($specie->id == $manager->specie_id) selected @endif>
                                    {{$specie->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <button class="btn btn-outline-secondary btn-sm" type="submit">EDIT MANAGER</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
