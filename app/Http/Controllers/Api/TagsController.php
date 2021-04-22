<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tag as ResourceTag;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return ResourceTag::collection(Tags::orderByDesc('created_at')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Tags::create($request->all()))
        {
            return response()->json([
                'success' => 'Tag cree avec succes'
            ], 200);
        }

        else{
            return response()->json([
                'success' => 'Ajout a echoue'
            ], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(Tags $tags)
    {

    return  ResourceTag($tags);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tags $tags)
    {
        if($tags->update($request->all()))
        {
            return response()->json([
                'success' => 'Tag modifie avec succes'
            ], 200);
        }
        else{
            return response()->json([
                'success' => 'Modification a echoue'
            ], 200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tags $tags)
    {
       if( $tags->delete())
       {
           return response()->json([
               'success' => 'Tag supprime avec succes'
           ], 200);
       }
       else
           {
               return response()->json([
                   'success' => 'Tag pas accessible'
               ], 200);
       }

    }
}
