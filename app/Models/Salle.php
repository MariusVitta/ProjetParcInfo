<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = ["nom_salle","quantitePC", 'systemeExploitationPC', 'numero',  'type_salle',  'departement_id'];
    use HasFactory;
}
