@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Species list</div>

                <div class="card-body">

                    @foreach ($species as $specie)
                    <li class="list-group-item list-line">
                        <div>
                            {{$specie->name}}
                        </div>
                        <div class="list-line__buttons">
                            <div class="form-group">
                                <a class="btn btn-outline-secondary btn-sm" href="{{route('specie.edit',[$specie])}}">EDIT</a>
                            </div>
                            <form method="POST" action="{{route('specie.destroy', [$specie])}}">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">DELETE</button>
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
