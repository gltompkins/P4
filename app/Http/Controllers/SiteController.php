<?php

namespace p4\Http\Controllers;

use p4\Http\Controllers\Controller;

use p4\Site;

class SiteController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    public function test() {
        $sites = \p4\Site::all();
        #dump($sites);
        # this is working below
        return view('sites.index');
        #return view('books.index')->with('books',$books);
    }

    /**
    * Responds to requests to GET /books
    */
    #public function getIndex(Request $request) {
    #    $books = \App\Book::orderBy('id','DESC')->get();
    #    //dump($books->toArray());
    #    return view('books.index')->with('books',$books);
    #}

    /**
    * Responds to requests to GET /sitelists/show
    */
    public function getIndex() {
        $sites = \p4\Site::orderBy('id','DESC')->get();
        return view('sites.index')->with('sites', $sites);
    }

    /**
    * Responds to requests to GET /sitelists/show
    */
    public function getPracticeIndex() {
        $sites = \p4\Site::orderBy('id','DESC')->get();
        #dump($sites);
        #return view('books.index')->with('books',$books);
        return view('sites.practice')->with('sites', $sites);
    }

    public function getShow($id = null) {
        $site = \p4\Site::find($id);
        //return view('sites.show');
        //working down to here
        //dump($site);  // this is working
        return view('sites.show')->with('sites', $site);



        //return view('sites.index'->with array('site' => $sites));
        //return view('books.show')->with('title', $title);
    }

    /**
     * Responds to requests to GET /sitelists/create
     */
    public function getCreate() {
        return 'Form to create a new site';
    }

    /**
     * Responds to requests to POST /sitelists/create
     */
    public function postCreate() {
        return 'Process adding new site';
    }
}
