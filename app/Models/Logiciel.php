<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Logiciel extends Model
{
    protected $fillable = ["nom_logiciel", "editeur",  "type_logiciel", "siteWeb", "licence"];
    use HasFactory;
}
