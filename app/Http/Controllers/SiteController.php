<?php

namespace p4\Http\Controllers;

use p4\Http\Controllers\Controller;
use Illuminate\Http\Request;
use p4\Site;

class SiteController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    public function test() {
        #debug GT
        # Get the current logged in user
		$user = \Auth::user();
        if($user) {
            echo 'Hi logged in user '.$user->name.'<br>';
        }

        # Get a user from the database
        #$user = \p4\User::where('name','like','Jamal')->first();
        #echo 'Hi '.$user->name.'<br>';


        # end debug GT
        #$sites = \p4\Site::all();
        #dump($sites);
        # this is working below
        $sites = \p4\Site::orderBy('id','DESC')->get();
        return view('sites.index')->with('sites', $sites);
    }


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
        return view('sites.practice')->with('sites', $sites);
    }

    public function getShow($id = null) {
        $site = \p4\Site::find($id);
        //return view('sites.show');
        //working down to here
        //dump($site);  // this is working
        return view('sites.show')->with('sites', $site);
    }

    /**
    * Responds to requests to GET /sites/edit/{$id}
    */
    public function getEdit($id = null) {

        # Get this site and eager load its tags
        $site = \p4\Site::with('tags')->find($id);

        if(is_null($site)) {
            \Session::flash('flash_message','Site not found.');
            return redirect('\sites');
        }

        # Get all the tags
        $tagModel = new \p4\Tag();
        $tags_for_checkbox = $tagModel->getTagsForCheckboxes();

        /*
        Create a simple array of just the tag names for tags associated with this site;
        will be used in the view to decide which tags should be checked off
        */
        $tags_for_this_site = [];
        foreach($site->tags as $tag) {
            $tags_for_this_site[] = $tag->name;
        }

        return view('sites.edit')
            ->with([
                'site' => $site,
                'tags_for_checkbox' => $tags_for_checkbox,
                'tags_for_this_site' => $tags_for_this_site,
            ]);

    }

    /**
    * Responds to requests to POST /sites/edit
    */
    public function postEdit(Request $request) {

        $site = \p4\Site::find($request->id);

        $site->siteurl = $request->siteurl;
        $site->sitename = $request->sitename;
        $site->sitedesc = $request->sitedesc;

        $site->save();

        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $site->tags()->sync($tags);

        \Session::flash('flash_message','Your site was updated.');
        return redirect('/sites/edit/'.$request->id);

    }

    /**
	*
	*/
    public function getConfirmDelete($site_id) {

        $site = \p4\Site::find($site_id);

        return view('sites.delete')->with('site', $site);
    }

    /**
	*
	*/
    public function getDoDelete($site_id) {

        $site = \p4\Site::find($site_id);

        if(is_null($site)) {
            \Session::flash('flash_message','Site not found.');
            return redirect('\sites');
        }

        if($site->tags()) {
            $site->tags()->detach();
        }

        $site->delete();

        \Session::flash('flash_message',$site->sitename.' was deleted.');

        return redirect('/sites');

    }


    /**
     * Responds to requests to GET /sitelists/create
     */
     public function getCreate() {

         # Get all the possible tags so we can include them with checkboxes in the view
         $tagModel = new \p4\Tag();
         $tags_for_checkbox = $tagModel->getTagsForCheckboxes();

         return view('sites.create')
             ->with('tags_for_checkbox',$tags_for_checkbox);
     }

     /**
      * Responds to requests to POST /sites/create
      */
     public function postCreate(Request $request) {

         $this->validate(
             $request,
             [
                 'sitename' => 'required|min:5',
                 'siteurl' => 'required|url',
                 'sitedesc' => 'required|min:5',
               ]
         );

         # Enter site into the database
         $site = new \p4\Site();
         $site->sitename = $request->sitename;
         $site->siteurl = $request->siteurl;
         $site->sitedesc = $request->sitedesc;
         #$site->user_id = \Auth::id(); # <--- NEW LINE

         $site->save();

         # Add the tags
         if($request->tags) {
             $tags = $request->tags;
         }
         else {
             $tags = [];
         }
         $site->tags()->sync($tags);

         # Done
        \Session::flash('flash_message','Your Site was added!');
        return redirect('/sites');
     }

}
