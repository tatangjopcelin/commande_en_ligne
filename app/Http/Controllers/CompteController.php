<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Http\Requests\StoreCompteRequest;
use App\Http\Requests\UpdateCompteRequest;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function inscription(Resquest $request){
        $userDonner = $request->validate([
            "nom"=>['required','string','max:255'],
            "numero"=>['required','integer','max:9'],
            "adresse"=>['required','string','max:255'],
            "role"=>['nullable','in:CESSIER,ADMIN'],
            "email"=>['required','email','unique:users','email'],
            "password"=>['required','string','min:8','max:30','confirmed'],

        ]);

        $utilisateurs = Compte::create([
            "nom" => $userDonner['nom'],
            "numero" => $userDonner['numero'],
            "adresse" => $userDonner['adresse'],
            "role" => $userDonner['role'],
            "email" => $userDonner['email'],
            "password" => bcrypt($userDonner['password'])


        ]);
        return response($userDonner, 201);
    }

    public function connexion(Request $request){
        $userDonner = $request->validate([
            "email" => ['required','email'],
            "password" => ['required','string','min:8','max:30']
        ]);
        $utilisateur = Compte::where('email', $userDonner['email'])->first();
        if(!$utilisateur)
            return response(["message" => " aucun utilisateur nexiste avec ce email suivante $userDonner[email]"], 401);
        if(!Hash::check($userDonner['password'], $utilisateur->password)){
            return response(['message' => 'aucun utilisateur de ce password trouver'], 401);
        }
        $token = $utilisateur->createToken('CLE_SECRETE')->plainTextToken;
        return response(['utilisateur' => $utilisateur,
        'token' => $token], 200);


    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Compte $compte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compte $compte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompteRequest $request, Compte $compte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compte $compte)
    {
        //
    }
}
