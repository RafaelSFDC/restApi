<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\PostsFilter;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Http\Resources\V1\PostsCollection;
use App\Http\Resources\V1\PostsResource;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PostsFilter();    
        $filterItems = $filter->transform($request);

        $includeComments = $request->query('includeComments');

        $posts = Posts::where($filterItems)->paginate();
        return new PostsCollection($posts->appends($request->query()));

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
    public function store(StorePostsRequest $request)
    {
        //  
    }

    /**
     * Display the specified resource.  
     */
    public function show($id)
    {
        $post = Posts::with('comments')->findOrFail($id); // assuming the comments relationship is named 'comments'
        return new PostsResource($post);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, $id)
    {
        //
        $post = Posts::find($id);
        if(!$post){
            return response()->json(['message' => 'Post não encontrado'], 404);
        }
            $post->update($request->all());
            return response()->json($post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posts = Posts::find($id);
        if(!$posts){
            return response()->json(['message' => 'Post não encontrado'], 404);
        }
         $posts->delete();
        return response()->json(['message' => 'Post deletado com sucesso']);
    }
}
