<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    protected $fillable = ["logiciel_id", "salle_id", "version_logiciel"];

    use HasFactory;


    public function logiciels()
    {
        return $this->hasOne('App\Models\logiciel');
    }
}
