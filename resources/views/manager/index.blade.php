@foreach ($managers as $manager)
  {{$manager->name}} {{$manager->managerSpecie->name}} <a href="{{route('manager.edit',[$manager])}}">EDIT MANAGER</a>
  
  <form method="POST" action="{{route('manager.destroy', [$manager])}}">
   @csrf
   <button type="submit">DELETE MANAGER</button>
  </form>
  <br>
@endforeach
