<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Installations extends Model {
		
	    use HasFactory;
	    protected $fillable = ["id_logiciel", "id_salle", "version_logiciel"];
	}
?>