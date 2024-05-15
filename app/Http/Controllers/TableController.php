<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table=Table::orderBy('id','desc')->get();
        return response(["response"=>$table],200);
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
    public function store(StoreTableRequest $request)
    {
        $data = $request->validated();
        $storeTable=Table::create($data);
        return response(["response"=>$storeTable],201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $table=Table::find($id);
        if($table)
            $table->files=$table->files;

        return response(["response"=>$table]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, $id)
    {
        $data = $request->validated();
        $table=Table::find($id);
        $res=$table->update($data);
        return response(["response"=>$res]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $table=Table::find($id);
        if ($table && $table->delete()) {
            return response(["response"=>true]);
        }
        return response(["response"=>false]);
    }
}
