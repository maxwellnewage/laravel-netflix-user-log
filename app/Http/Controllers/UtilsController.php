<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public static function readCSV($csvFile, $array)
    {
        $file_handle = fopen($csvFile, 'r');

        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
        }

        fclose($file_handle);
        
        return $line_of_text;
    }
}
