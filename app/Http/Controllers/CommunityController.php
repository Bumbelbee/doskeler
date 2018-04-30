<?php

namespace App\Http\Controllers;

use App\Community;
use Illuminate\Http\Request;
Use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $all = DB::table('communities')->select('id','title','description')->get();
        $communities = User::find($user->id)->communities()->orderBy('title')->get(); 
       
        $lastId = Community::find(1)->orderBy('id','Desc')->limit(1)->get();
        return view('community.index',compact('user','communities','all','lastId'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $community = new Community;

        $community->title = $request->title;
        $community->description = $request->desc;
        $community->creator = $request->creator;
        $community->save();

        // insert creator to followers

        $commId = $request->lastId;
        $userId = Auth::user()->id;
        DB::table('community_user')->insert(['user_id'=>$userId,'community_id'=>$commId]);
        DB::table('communities')->where('title',$community->title)->increment('followers');
        
        return redirect()->route('community.show',$community->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {   $user = Auth::user();
        $id = DB::table('communities')->where('title',$title)->value('id');
        $wall = [
            'new_post_group_id' => $id
        ];
        $community = DB::table('communities')->where('title',$title)->get();
        return view('community.show',compact('title','user','community','wall'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }

    public function follow(Request $request){
        $title = $request->title;
        $commId = $request->commId;
        $userId = $request->userId;

        DB::table('community_user')->insert(['user_id'=>$userId,'community_id'=>$commId]);
        DB::table('communities')->where('title',$title)->increment('followers');
        
        Session::flash('success',"now you follow this community");  
        return redirect()->route('community.show',$title);
    }

    public function unfollow(Request $request){
        $title = $request->title;
        $comm_id = $request->commId;
        $user_id = $request->userId;

        DB::table('communities')->where('title',$title)->decrement('followers');
        DB::table('community_user')->where(['user_id'=>$user_id,'community_id'=>$comm_id]);
        Session::flash('success',"now you unfollow ~$title~");  
        return redirect()->route('community.index');
    }

}
