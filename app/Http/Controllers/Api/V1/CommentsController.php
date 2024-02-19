<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\CommentsFilter;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Http\Requests\StoreCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;
use App\Http\Resources\V1\CommentsCollection;
use App\Http\Resources\V1\CommentsResource;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        //
        $filter = new CommentsFilter();    
        $queryItems = $filter->transform($request);

        $comments = Comments::where($queryItems)->paginate();
        return new CommentsCollection($comments->appends($request->query()));
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
    public function store(StoreCommentsRequest $request)
    {
        //
        return $comments = Comments::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $comments = Comments::findOrFail($id);
        return new CommentsResource($comments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentsRequest $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
