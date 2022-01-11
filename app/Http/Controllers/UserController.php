<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'birth_date' => 'required',
            'phone' => 'required',
            'cellphone' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'number' => 'required|numeric',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);

        DB::transaction(function() use ($request) {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'cpf' => $request->cpf,
                'rg' => $request->rg,
                'birth_date' => date("Y-m-d", strtotime($request->birth_date)),
                'phone' => $request->phone,
                'cellphone' => $request->cellphone
            ]);

            $user->address()->create([
                'zipcode' => $request->zipcode,
                'address' => $request->address,
                'number' => $request->number,
                'complement' => $request->complement,
                'district' => $request->district,
                'city' => $request->city,
                'state' => $request->state
            ]);
        });

        return Redirect::route('users.index');
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
        $user = User::with('address')->findOrFail($id);
        return view('user_form_update', compact(['user']));
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
        $request->validate([
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'birth_date' => 'required',
            'phone' => 'required',
            'cellphone' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'number' => 'required|numeric',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);

        $user = User::find($id);

        DB::transaction(function() use ($user, $request) {
            $user->update([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'cpf' => $request->cpf,
                'rg' => $request->rg,
                'birth_date' => date("Y-m-d", strtotime($request->birth_date)),
                'phone' => $request->phone,
                'cellphone' => $request->cellphone
            ]);

            $user->address()->update([
                'zipcode' => $request->zipcode,
                'address' => $request->address,
                'number' => $request->number,
                'complement' => $request->complement,
                'district' => $request->district,
                'city' => $request->city,
                'state' => $request->state
            ]);
        });

        return Redirect::route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return Redirect::route('users.index');
    }
}
