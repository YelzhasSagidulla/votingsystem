<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Http\Resources\VoteResource;
use App\Vote;

use Illuminate\Http\Request;


class VoteController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detect = new \Mobile_Detect();

        $data = $request->all();

        /*get record*/
        $candidate = Candidate::firstOrCreate($data);

        /*get user info*/
        $user = [
            'device'     => $detect->isMobile() ? ($detect->isTablet() ? 'Tablet' : 'Phone') : 'Computer',
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'browser'    => $request->header('User-Agent'),
        ];

        /*find vote*/
        $vote = Vote::where($user)->first();

        /*if current user voted before*/
        if($vote)
            $vote->delete();

        /*add one more info*/
        $user['candidate_id'] = $candidate->id;

        Vote::create($user);

        return [
            'status' => 1
        ];
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
