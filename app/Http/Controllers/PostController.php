<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Posts::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        return Posts::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Posts::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Posts::find($id);
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Posts::destroy($id);
    }

    /**
     * Search by title
     */
    public function search(string $title)
    {
        return Posts::where('title', 'like', '%' . $title . '%')->get();
    }
}
