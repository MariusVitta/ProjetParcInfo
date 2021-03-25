<?php

if (!function_exists('array_to_object')) {

    /**
     * Convert Array into Object in deep
     *
     * @param array $array
     * @return
     */
    function array_to_object($array)
    {
        return json_decode(json_encode($array));
    }
}

if (!function_exists('empty_fallback')) {

    /**
     * Empty data or null data fallback to string -
     *
     * @return string
     */
    function empty_fallback ($data)
    {
        return ($data) ? $data : "-";
    }
}

if (!function_exists('create_button')) {

    function create_button ($action, $model)
    {
        $action = str_replace($model, "", $action);

        return [
            'submit_text' => ($action == "update") ? "Mettre à jour" : "Valider",
            'submit_response' => ($action == "update") ? "Mis à jour." : "Validé.",
            'submit_response_notyf' => ($action == "update") ? "Données administrateur mises à jour" : "Admin bien enregistré"
        ];
    }
}
