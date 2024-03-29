<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use PhpParser\Node\Arg;

class ArticleController extends Controller
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
        $all = Article::all();
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
            'price' => 'numeric',
            'stock' => 'integer',
            'store_id' => 'required|integer'
        ]);

        Article::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Article created successfully',
            'article' => Article::all()->last()
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
        $article = Article::findOrFail($request->id);
        return response()->json([
            'status' => 'success',
            'todo' => $article,
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
            'price' => 'numeric',
            'stock' => 'integer',
            'store_id' => 'required|integer'
        ]);

        Article::findOrFail($request->id);
        Article::where('id', $request->id)
                ->update($request->all());

        $article = Article::select()->orderBy('created_at')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Article update successfully',
            'todo' => $article,
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
        $article = Article::findOrFail($request->id);
        $article->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Article deleted successfully',
            'todo' => $article,
        ]);
    }
}
