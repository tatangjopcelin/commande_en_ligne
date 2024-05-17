<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Http\Requests\StoreUtilisateurRequest;
use App\Http\Requests\UpdateUtilisateurRequest;

class UtilisateurController extends Controller
{


    public function showProfile(Request $request){
        $utilisateur = Auth::user();
        if($utilisateur->role === 'admin'){
            return response()->json(['profile'=>$utilisateur],200);

        }else{
            return response()->json(['profile'=>[
                'id'=>$utilisateur->id,
                'numero'=>$utilisateur->numero,
                'adresse'=>$utilisateur->adresse,
                'role'=>$utilisateur->role,
                'password'=>$utilisateur->password
                ]], 200);
        }
    }

    public function updateProfile(Request $request, $id){
        $utilisateur = Utilisateur::find($id);
        if(!$utilisateur){
            return response()->json(['erro'=>'utilisateur not found'],404);
        }
        if(Auth::user()->role === 'admin' ||Auth::id() == $id){
              // Autoriser les administrateurs à mettre à jour n'importe quel profil
            // ou l'utilisateur connecté à mettre à jour son propre profil
            // Logique de mise à jour du profil
            return response()->json(['message'=>'profil mis ajour avec succes'], 200);

        }else{
            return response()->json(['erro'=>'non autorise a effectuer cette action'], 403);
        }

    }

    public function deleteAccount($id)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return response()->json(['error' => 'Utilisateur non trouvé'], 404);
        }

        if (Auth::user()->role === 'admin' || Auth::id() == $id) {
            // Autoriser les administrateurs à supprimer n'importe quel compte utilisateur
            // ou l'utilisateur connecté à supprimer son propre compte
            // Logique de suppression du compte...
            return response()->json(['message' => 'Compte supprimé avec succès'], 200);
        } else {
            return response()->json(['error' => 'Non autorisé à effectuer cette action'], 403);
        }
    }


    /**
     * Display a listing of the resource.
     */
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
    public function store(StoreUtilisateurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUtilisateurRequest $request, Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        //
    }

}
