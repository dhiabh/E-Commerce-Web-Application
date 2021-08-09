<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\User;
use Illuminate\Http\Request;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = auth()->user();
        $boutiques = Boutique::orderBy('id', 'DESC')->get()->where('user_id', $user->id);
        if (isset($user->state_id)) {
            $state = State::find($user->state_id);
            $country = Country::find($state->country_id);

            return view('users.index', compact('user', 'boutiques', 'state', 'country'));
        } else {
            return view('users.index', compact('user', 'boutiques'));
        }
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
        //
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
    public function edit(User $user)
    {
        $user = auth()->user();
        $countries = Country::all();
        if (isset($user->state_id)) {
            $state = State::find($user->state_id);
            $country = Country::find($state->country_id);

            $states = State::where('country_id', $country->id)->get();

            return view('users.edit', compact('user', 'state', 'countries', 'states'));
        }else{

            return view('users.edit', compact('user', 'countries'));
        }



        
    }

    public function getStates()
    {
        //$user = auth()->user();
        $country_id = request('country');
        $states = State::where('country_id', $country_id)->get();

        $option = "<option value = ''>Select State</option>";

        foreach ($states as $state) {
            $option .= '<option value = "' . $state->id . '">' . $state->name . '</option>';
        }
        return $option;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'state_id' => $request->state,
            'adresse' => $request->adresse,
            'num_tel' => $request->num_tel,
            'num_tel2' => $request->num_tel2
        ]);


        return redirect()->route('users.index')->with('message', 'Informations mises à jour avec succés');
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
