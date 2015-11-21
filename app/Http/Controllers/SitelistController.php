<?php

namespace p4\Http\Controllers;

use p4\Http\Controllers\Controller;

class SitelistController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /sitelists/show
    */
    public function getIndex() {
        return 'List all the sites from controller';
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
