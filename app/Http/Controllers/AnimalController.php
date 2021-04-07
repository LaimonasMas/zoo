<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Specie;
use App\Models\Manager;
use Illuminate\Http\Request;
use Validator;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();
        $managers = Manager::all();
        return view('animal.index', ['animals' => $animals, 'managers' => $managers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
        $managers = Manager::all();
        return view('animal.create', ['species' => $species, 'managers' => $managers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'animal_name' => ['required', 'min:3', 'max:64'],
                'birth_year' => ['required', 'min:3', 'max:64'],
                'animal_book' => ['required', 'min:3', 'max:64'],
            ],
            [
                'animal_name.min' => 'Animal name has to be at least 3 characters.',
                'animal_name.required' => 'Animal name has to be entered.',
                'birth_year.min' => 'Animal birth year has to be at least 3 characters.',
                'birth_year.required' => 'Animal birth year has to be entered.',
                'animal_book.min' => 'Description has to be at least 3 characters.',
                'animal_book.required' => 'Description has to be entered.'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $animal = new Animal;
        $animal->name = $request->animal_name;
        $animal->birth_year = $request->birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->specie_id = $request->specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $species = Specie::all();
        $managers = Manager::all();
        return view('animal.edit', ['animal' => $animal, 'species' => $species, 'managers' => $managers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'animal_name' => ['required', 'min:3', 'max:64'],
                'birth_year' => ['required', 'min:3', 'max:64'],
                'animal_book' => ['required', 'min:3', 'max:64'],
            ],
            [
                'animal_name.min' => 'Animal name has to be at least 3 characters.',
                'animal_name.required' => 'Animal name has to be entered.',
                'birth_year.min' => 'Animal birth year has to be at least 3 characters.',
                'birth_year.required' => 'Animal birth year has to be entered.',
                'animal_book.min' => 'Description has to be at least 3 characters.',
                'animal_book.required' => 'Description has to be entered.'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        $animal->name = $request->animal_name;
        $animal->birth_year = $request->birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->specie_id = $request->specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animal.index')->with('success_message', 'Deleted successfully.');
    }
}
