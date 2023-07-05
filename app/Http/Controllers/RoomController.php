<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\RoomServices;
use App\Models\User;

class RoomController extends Controller
{
    public function index()
    {
        $role = auth()->user() != null ? auth()->user()->role : '0';

        if ($role=='800'){
			$users = $this->getUsersRooms();
        }
		else
        {
            $user_id = auth()->user() != null ? auth()->user()->id : null;
			$users = $this->getUsersRooms($user_id);
        }

        return view('admin.rooms.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = new Room();
        return view('admin.rooms.form', ['room' => $room]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        $room = new Room();

        $room->name = $request->input('name');
        $room->description = strlen($request->input('description')) > 0 ? $request->input('description') : "";
        $room->address = $request->input('address');
        if($request->hasFile('photo')){
            $room->photo = $request->photo->getClientOriginalName();
            $request->photo->storeAs('assets/img/uploaded', $request->photo->getClientOriginalName());
        }
        else
        {
            $room->photo = "";
        }
        $room->occupancy = $request->input('occupancy');
        $room->price = $request->input('price');
        $room->comments = strlen($request->input('comments')) > 0 ? $request->input('comments') : "";
        $room->establishment_id = $request->input('establishment');
        $room->user_id = auth()->user()->id;
        $room->created_at = now();
        $room->updated_at = now();

        $room->save();

        if($request->input('services') != null)
        {
            foreach($request->input('services') as $srv)
            {
                $service = new RoomServices();
                $service->service_id = $srv;
                $service->room_id = $room->id;
                $service->save();
            }
        }

        return redirect()->route('admin.rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::query()->where('id', $id)->whereNull('deleted_at')->first();
        if($room) {
            return view('user.rooms.show', ['room' => $room]);
        }

        abort('404');
    }


    public function edit($id)
    {
        $room = Room::query()->where('id', $id)->whereNull('deleted_at')->first();

        if($room) {
            return view('admin.rooms.form', ['room' => $room]);
        }

        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request)
    {
        $room = Room::query()->where('id', $request->input('id'))->get()->first();

        $room->name = $request->input('name');
        $room->description = strlen($request->input('description')) > 0 ? $request->input('description') : "";
        $room->address = $request->input('address');
        if($request->hasFile('photo')){
            $room->photo = $request->photo->getClientOriginalName();
            $request->photo->storeAs('assets/img/uploaded', $request->photo->getClientOriginalName());
        }
        $room->occupancy = $request->input('occupancy');
        $room->price = $request->input('price');
        $room->comments = strlen($request->input('comments')) > 0 ? $request->input('comments') : "";
        $room->establishment_id = $request->input('establishment');
        $room->updated_at = now();

        $room->save();

        RoomServices::where('room_id', $room->id)->delete();
        if($request->input('services') != null)
        {
            foreach($request->input('services') as $srv)
            {
                $service = new RoomServices();
                $service->service_id = $srv;
                $service->room_id =  $room->id;
                $service->save();
            }
        }

        return redirect()->route('admin.rooms');
    }

    public function delete($id)
    {
        $room = Room::query()->where('id', $id)->get()->first();
        $room->deleted_at = now();
        $room->save();

        Session::flash('message', "L'habitació/apartament s'ha borrat correctament!");
        return redirect()->route('admin.rooms');
    }

    private function getUsersRooms($id = null)
    {
        return User::with(['rooms' => function ($q) {
            return $q->whereNull('deleted_at');
        }])->when($id !== null, function ($q) use ($id) {
            return $q->where('id', $id);
        })->whereNull('deleted_at')->get();
    }
}
