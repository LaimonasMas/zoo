@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Managers list</div>

                <div class="card-body">

                    @foreach ($managers as $manager)
                    <li class="list-group-item list-line">
                        <div>
                            <h5>{{$manager->name}}</h5> 
                            <h6>Rūšis, kurią gali prižiūrėti: {{$manager->managerSpecie->name}}.</h6>
                        </div>
                        <div class="list-line__buttons">
                            <div class="form-group">
                                <a class="btn btn-outline-secondary btn-sm" href="{{route('manager.edit',[$manager])}}">EDIT MANAGER</a>
                            </div>
                            <form method="POST" action="{{route('manager.destroy', [$manager])}}">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">DELETE MANAGER</button>
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
