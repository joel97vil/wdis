<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Establishment;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateEstablishmentRequest;
use App\Http\Requests\StoreEstablishmentRequest;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Establishment::query()->whereNull('deleted_at')->get();
        return view('admin.establishments.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $establishment = new Establishment();
        return view('admin.establishments.form', ['establishment' => $establishment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstablishmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstablishmentRequest $request)
    {
        $establishment = new Establishment();

        $establishment->name = $request->input('name');
        $establishment->description = $request->input('description');
        $establishment->address = $request->input('address');
        $establishment->image = strlen($request->input('image')) > 0 ? $request->input('image') : "";
        $establishment->city = $request->input('city');
        $establishment->establishment_type = $request->input('establishment_type');
        $establishment->postal_code = $request->input('postal_code');
        $establishment->user_id = 1;
        $establishment->created_at = now();
        $establishment->updated_at = now();

        $establishment->save();

        return redirect()->route('admin.establishments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $establishment = Establishment::where('id', $id)->first();
        if($establishment != null)
        {
            return view('admin.establishments.form', ['establishment' => $establishment, 'readonly' => "readonly"]);
        } else {
            abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $establishment = Establishment::where('id', $id)->first();
        if($establishment != null)
        {
            return view('admin.establishments.form', ['establishment' => $establishment]);
        } else {
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstablishmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstablishmentRequest $request)
    {
        $establishment = Establishment::query()->where('id', $request->input('id'))->get()->first();

        if ($establishment != null)
        {
            $establishment->name = $request->input('name');
            $establishment->description = $request->input('description');
            $establishment->address = $request->input('address');
            $establishment->image = strlen($request->input('image')) > 0 ? $request->input('image') : "";
            $establishment->city = $request->input('city');
            $establishment->establishment_type = $request->input('establishment_type');
            $establishment->postal_code = $request->input('postal_code');
            $establishment->user_id = 1;
            $establishment->updated_at = now();

            $establishment->save();
        }

        return redirect()->route('admin.establishments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $user = Establishment::where('id', $id)->first();
        if($user != null)
        {
            $user->deleted_at = now();
            $user->save();
        }

        Session::flash('message', "El edifici s'ha borrat correctament!");
        return redirect()->route('admin.establishments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establishment $establishment)
    {
        //
    }
}
