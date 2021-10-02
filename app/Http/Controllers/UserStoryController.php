<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserStoryRequest;
use App\Models\Ticket;
use App\Models\UserStory;
use Illuminate\Http\Request;

class UserStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserStoryRequest $request)
    {
        //
        $userStory = UserStory::create([
            'name' => $request->user_story_name,
            'comment' => $request->user_story_comment,
            'project_id' => session('idProjet')
        ]);

         Ticket::create([
            'name' => $request->ticket_name,
            'comment' => $request->ticket_comment,
            'user_stories_id' => $userStory->id
        ]);

        return response(['message' => 'Informacion Agregada con exito', 'userStory' => $userStory]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
