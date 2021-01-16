<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class RequeteSalle extends FormRequest {

        /**
         * Détermine si l'utilisateur est autorisé à faire cette requête.
         *
         * @return bool
         */
        public function authorize() {
            return true;
        }

        /**
         * Règles de validation qui s'appliquent à la requête.
         *
         * @return array
         */
        public function rules() {
            return [
                "salle" => "bail|required|between:1,50" /* Champ obligatoire avec une longueur comprise entre 1 et 50 */
            ];
        }
    }

?>