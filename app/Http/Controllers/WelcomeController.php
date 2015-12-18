<?php

namespace p4\Http\Controllers;

use p4\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    /**
    * Responds to requests to GET /
    */
    public function getIndex() {

        if(\Auth::check()) {
            return redirect()->to('/sites');
        }
        return view('welcome.index');
    }

}
