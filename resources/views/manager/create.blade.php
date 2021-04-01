<form method="POST" action="{{route('manager.store')}}">
    Manager name: <input type="text" name="manager_name">
    Manager surname: <input type="text" name="manager_surname">
    Choose specie: <select name="specie_id">
        @foreach ($species as $specie)
        <option value="{{$specie->id}}">{{$specie->name}} </option>
        @endforeach
    </select>
    @csrf
    <button type="submit">ADD</button>
</form>
