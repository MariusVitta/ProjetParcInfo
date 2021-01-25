<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Salles extends Model {
		
	    use HasFactory;
	    protected $fillable = ["numero_salle", "nom_salle", "type_salle", "nom_OS", "type_OS", "version_OS"];
	}
?>