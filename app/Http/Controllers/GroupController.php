<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Repositories\GroupRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct(Public GroupRepository $group, public UserRepository $user)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All the group the user is participating in.
        $groups = $this->user->getUserGroups(auth()->user()->id)['groups'];
        // Get all public groups
        $publicGroups = $this->group->getPublicGroups();
        // Return the view with the groups and public groups
        return view('pages.group.index',)->with('groups', $groups)->with('publicGroups', $publicGroups);
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
    public function store(GroupRequest $request)
    {
        $request['admin'] = auth()->user()->id;
        $request['group_id'] = md5(auth()->user()->id . time());
        if($request->visibility == 'private'){
            $request['privateMails'] = $request->privateMails;
        }
        else {
            $request->privateMails = null;
        }
        $store = $this->group->create($request->all());
        if ($store['status'] == true) {
            return redirect()->route('group.index')->with('success', 'Group Created Successfully');
        } 
        else {
            return redirect()->route('group.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
