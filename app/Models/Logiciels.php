<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Logiciels extends Model {

	    use HasFactory;
	    protected $fillable = ["nom_logiciel", "auteur", "type", "licence", "site"];
	}
?>