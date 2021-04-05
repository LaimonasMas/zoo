<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    public function animalManagers()
    {
        return $this->belongsTo('App\Models\Manager', 'manager_id', 'id');
    }

    public function animalSpecies()
    {
        return $this->belongsTo('App\Models\Specie', 'specie_id', 'id');
    }

}
