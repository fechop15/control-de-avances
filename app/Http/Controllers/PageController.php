<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\UserStory;

class PageController extends Controller
{
    /**
     * Show specified view.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $countUserStory = 0;
        $countTickets = 0;
        foreach (auth()->user()->company->projets as $projet) {
            $countUserStory += $projet->userStories->count();
            foreach ($projet->userStories as $userStory) {
                $countTickets += $userStory->tickets->count();
            }

        }
        return view('page/home', compact('countUserStory','countTickets'));
    }

    public function projet($id=null)
    {
        if ($id==null){
            session(['idProjet' => null]);
            $projets=auth()->user()->company->projets;
            return view('page/projets',compact("projets"));
        }else{
            session(['idProjet' => $id]);
            $projet=Project::findOrFail($id);
            return view('page/projet',compact("projet"));
        }
    }

    public function userStory($id,$id2)
    {
        session(['idUserStory' => $id2]);
        session(['idProjet' => $id]);
        $userStory=UserStory::findOrFail($id2);
        return view('page/userHistory',compact('userStory'));

    }

}
