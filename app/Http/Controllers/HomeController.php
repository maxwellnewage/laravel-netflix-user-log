<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

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

        // Armo un array de objetos para la tabla
        $contentList = [];

        foreach($seriesFromCSV as $s) {
            /* 
                Netflix llama temporada o partes a sus series,
                por lo cual esto puede producir errores en el parseo.
            */
            $hasSeasons = strpos($s[0],'Temporada');

            $contentType = $hasSeasons ? 'Serie' : 'Pelicula';

            // separo valores por dos puntos y quito espacios
            $separatedContent = array_map('trim', explode(':',$s[0]));

            $content = new Content();
            $content->type = $contentType;
            $content->name = $separatedContent[0];

            if($contentType == 'Serie'){
                $content->seasonNumber = $separatedContent[1];
                $content->seasonTitle = $separatedContent[2];
            }

            $content->date = $s[1];

            array_push($contentList, $content);
        }

        return view('result', ['contentList' => $contentList]);
    }
}
