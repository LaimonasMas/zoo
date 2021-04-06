@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Animals list</div>

                <div class="card-body">

                    @foreach ($animals as $animal)
                    <li class="list-group-item list-line">
                        <div>
                            <h5>{{$animal->name}}</h5> 
                            <h6>Prižiūrėtojas: {{$animal->animalManagers->name}}.</h6>
                        </div>
                        <div class="list-line__buttons">
                            <div class="form-group">
                                <a class="btn btn-outline-secondary btn-sm" href="{{route('animal.edit',[$animal])}}">EDIT ANIMAL</a>
                            </div>
                            <form method="POST" action="{{route('animal.destroy', [$animal])}}">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">DELETE ANIMAL</button>
                            </form>
                        </div>
                    </li>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
