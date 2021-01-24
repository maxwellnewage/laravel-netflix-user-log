<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function load_csv(Request $request) {
        $userLogFile = $request->file('csv-file');

        // $seriesFromCSV[1][0] Titulo
        // $seriesFromCSV[1][1] Fecha
        $seriesFromCSV = UtilsController::readCSV($userLogFile, array('delimiter' => ','));
        
        // Elimino cabecera
        unset($seriesFromCSV[0]);

        // Elimino ultima posicion porque es un salto de linea
        array_pop($seriesFromCSV);
        
        return view('result', ['series' => $seriesFromCSV]);
    }
}
