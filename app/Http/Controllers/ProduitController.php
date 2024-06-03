<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produit=Produit::orderBy('id','desc')->get();
        return response(["response"=>$produit],200);

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
    public function store(StoreProduitRequest $request)
    {
        $data = $request->validated();
        $storeProduit=Produit::create($data);
        return response(["response"=>$storeProduit],201);

        $produit = Produit::find($request->input('produit_id'));
        $image = $request->file('image');
        $imageName = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('image'), $imageName);
        $produit->image = $imageName;
        $produit->save();
        return redirect()->back()->with('success', 'Image telecharger avec succes');

    }

    // public function uploadImage(StoreProduitRequest $request){
    //     $produit = Produit::find($request->input('produit_id'));
    //     $image = $request->file('image');
    //     $imageName = time().'_'.$image->getClientOriginalName();
    //     $image->move(public_path('image'), $imageName);
    //     $produit->image = $imageName;
    //     $produit->save();
    //     return redirect()->back()->with('success', 'Image telecharger avec succes');
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produit=Produit::find($id);
        if($produit)
            $produit->files=$produit->files;

        return response(["response"=>$produit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduitRequest $request, $id)
    {
        $data = $request->validated();
        $produit=Produit::find($id);
        $res=$produit->update($data);
        return response(["response"=>$res]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit=Produit::find($id);
        if ($produit && $produit->delete()) {
            return response(["response"=>'supprimer avec succes']);
        }
        return response(["response"=>'aucun produit trouver avec cet identifiant']);

    }
}
