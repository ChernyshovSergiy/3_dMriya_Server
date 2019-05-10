<?php

namespace App\Traits\Methods;


use DB;

trait CastToJson
{
    /**
     * @param $json
     * @return \Illuminate\Database\Query\Expression
     * @throws \Exception
     */
    public function castToJson($json): \Illuminate\Database\Query\Expression
    {
        // Convert from array to json and add slashes, if necessary.
        if (is_array($json)) {
            $json = addslashes(json_encode($json));
        }
        // Or check if the value is malformed.
        elseif ($json === null || json_decode($json) === null) {
            throw new \Exception('A valid JSON string was not provided.');
        }
        return DB::raw("CAST('{$json}' AS JSON)");
    }

}
