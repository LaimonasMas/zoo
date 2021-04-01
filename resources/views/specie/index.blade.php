@foreach ($species as $specie)
  {{$specie->name}} <a class="btn btn-outline-secondary btn-sm" href="{{route('specie.edit',[$specie])}}">EDIT</a>
  <form method="POST" action="{{route('specie.destroy', [$specie])}}">
   @csrf
   <button class="btn btn-outline-danger btn-sm" type="submit">DELETE</button>
  </form>
  <br>
@endforeach
