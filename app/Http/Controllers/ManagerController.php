<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Specie;
use Illuminate\Http\Request;
use Validator;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = Manager::all();
        return view('manager.index', ['managers' => $managers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
        return view('manager.create', ['species' => $species]);
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
                'manager_name' => ['required', 'min:3', 'max:64'],
                'manager_surname' => ['required', 'min:3', 'max:64'],
            ],
            [
                'manager_name.min' => 'Manager name has to be at least 3 characters.',
                'manager_name.required' => 'Manager name has to be entered.',
                'manager_surname.min' => 'Manager surname has to be at least 3 characters.',
                'manager_surname.required' => 'Manager surname has to be entered.'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $manager = new Manager;
        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();
        return redirect()->route('manager.index')->with('success_message', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $species = Specie::all();
        return view('manager.edit', ['manager' => $manager, 'species' => $species]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'manager_name' => ['required', 'min:3', 'max:64'],
                'manager_surname' => ['required', 'min:3', 'max:64'],
            ],
            [
                'manager_name.min' => 'Manager name has to be at least 3 characters.',
                'manager_name.required' => 'Manager name has to be entered.',
                'manager_surname.min' => 'Manager surname has to be at least 3 characters.',
                'manager_surname.required' => 'Manager surname has to be entered.'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();
        return redirect()->route('manager.index')->with('success_message', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        if ($manager->managerAnimals()->count()) {
            return redirect()->route('manager.index')->with('info_message', 'Could not delete, because manager still has animals.');
        }
        $manager->delete();
        return redirect()->route('manager.index')->with('success_message', 'Deleted successfully.');
    }
}
