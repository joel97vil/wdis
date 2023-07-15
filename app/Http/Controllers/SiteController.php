<?php

namespace App\Http\Controllers;


use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{

    public function index()
    {
        $rooms = Room::query()->whereNull('deleted_at')->take(12)->get();

        return view('welcome', ['rooms' => $rooms]);
    }

    /**
     *
     */
    public function login()
    {
        return view('common.login');
    }

    /**
     * Authenticates the user by the login params and saves user's data on session storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('/');
        } else {
            $messages = [
                'username.required' => 'Nom d\'usuari requerit',
                'password.required' => 'Contrassenya requerida'
            ];

            $validated = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ], $messages);

            return redirect('/login')->withErrors([
                'login' => 'Usuari o contrassenya invàlid/es'
            ]);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Register user for the application.
     */
    public function register()
    {
        return view('common.register');
    }

    /**
     * Register user for the application.
     *
     * @param  \Illuminate\Http\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(StoreUserRequest $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->password = strlen($request->input('password')) > 0 ? Hash::make($request->input('password')) : "";
        $user->nif = $request->input('nif');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->postal_code = $request->input('postal_code');
        $user->role = $request->input('role');
        $user->profile_photo = strlen($request->input('profile_photo')) > 0 ? : "";
        $user->created_at = now();
        $user->updated_at = now();

        $user->save();

        //After save the user, stay the created user on session
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function termes(){
        return view('common.termes');
    }

    public function roomsList(Request $request){
        $rooms = Room::with(['services'])->whereNull('deleted_at')->get();
        $rooms = $rooms->map(function ($room) {
            $services = [];
            $room->groups = [
                "e_{$room->establishment->id}",
            ];

            foreach ($room->services as $service) {
                $services[] = "s_{$service->service_id}";
            }

            $room->groups = array_merge($room->groups, $services);

            return $room;
        });

        $searchTxt = null;
        if($request->query("search-text") != null){
            $searchTxt = $request->query("search-text");
        }

        return view('common.rooms-list', ['rooms' => $rooms, 'searchTxt' => $searchTxt]);
    }

}
