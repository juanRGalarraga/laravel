<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Store::all();
        return response()->json([
            'status' => 'success',
            'articles' => $all
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);

        Store::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Article created successfully',
            'article' => Store::all()->last()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        $store = Store::findOrFail($request->id);
        return response()->json([
            'status' => 'success',
            'todo' => $store,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);

        Store::findOrFail($request->id);
        Store::where('id', $request->id)
                ->update($request->all());

        $store = Store::select()->orderBy('created_at')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Article update successfully',
            'todo' => $store,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $store = Store::findOrFail($request->id);
        $store->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Article deleted successfully',
            'todo' => $store,
        ]);
    }
}
