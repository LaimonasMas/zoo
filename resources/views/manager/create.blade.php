@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Manager</div>

                <div class="card-body">

                    <form method="POST" action="{{route('manager.store')}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="manager_name">
                            <small class="form-text text-muted">You can enter Name here</small>
                        </div>
                        <div class="form-group">
                            <label>Surname: </label>
                            <input type="text" class="form-control" name="manager_surname">
                            <small class="form-text text-muted">You can enter Surname here</small>
                        </div>
                        <label>Choose specie: </label>
                        <select name="specie_id">
                            @foreach ($species as $specie)
                            <option class="form-control" value="{{$specie->id}}">{{$specie->name}} </option>
                            @endforeach
                        </select>
                        @csrf
                        <button class="btn btn-outline-success btn-sm" type="submit">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
