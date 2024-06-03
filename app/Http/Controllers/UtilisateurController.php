<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Http\Requests\StoreUtilisateurRequest;
use App\Http\Requests\UpdateUtilisateurRequest;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateur=Utilisateur::orderBy('id','desc')->get();
        return response(["response"=>$utilisateur],200);

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
        $data = $request->validated();
        $storeUtilisateur=Utilisateur::create($data);
        return response(["response"=>$storeUtilisateur],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $utilisateur=Utilisateur::find($id);
        if($utilisateur)
            $utilisateur->files=$utilisateur->files;

        return response(["response"=>$utilisateur]);
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
    public function update(UpdateUtilisateurRequest $request, $id)
    {
        $data = $request->validated();
        $utilisateur=Utilisateur::find($id);
        $res=$utilisateur->update($data);
        return response(["response"=>$res]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $utilisateur=Utilisateur::find($id);
        if ($utilisateur && $utilisateur->delete()) {
            return response(["response"=>true]);
        }
        return response(["response"=>false]);

    }
}
