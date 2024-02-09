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
        $queryItems = $filter->transform($request);

        if(count($queryItems) > 0){
            $posts = Posts::where($queryItems)->paginate();
            return new PostsCollection($posts->appends($request->query()));
        }
        return new PostsCollection(Posts::paginate());
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
        $post = Posts::findOrFail($id);
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
    public function update(UpdatePostsRequest $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
