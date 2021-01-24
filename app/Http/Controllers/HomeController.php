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

        $userLogArr = UtilsController::readCSV($userLogFile, array('delimiter' => ','));

        dd($userLogArr);

        return view('result');
    }
}
