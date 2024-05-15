<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commande=Commande::orderBy('id','desc')->get();
        return response(["response"=>$commande],200);
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
    public function store(StoreCommandeRequest $request)
    {
        $data = $request->validated();
        $storeCommande=Commande::create($data);
        return response(["response"=>$storeCommande],201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $commande=Commande::find($id);
        if($commande)
            $commande->files=$commande->files;

        return response(["response"=>$commande]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommandeRequest $request,$id)
    {
        $data = $request->validated();
        $commande=Commande::find($id);
        $res=$commande->update($data);
        return response(["response"=>$res]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commande=Commande::find($id);
        if ($commande && $commande->delete()) {
            return response(["response"=>true]);
        }
        return response(["response"=>false]);

    }
}
