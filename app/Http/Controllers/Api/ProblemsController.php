<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Problems;
use App\Http\Resources\Problem as ResourceProblem;
use App\Models\Tags;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{

    public function __construct()
    {
        request() ->headers->set('Accept', 'application/json');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name =null)
    {
        $query = $name ? Tags::whereSlug($name)->firstOrFail()->problem() : Problems::query();
        $problems = $query->oldest('created_at')->paginate(5);
       // return response(['problem'=>$problems]);

        //$problems = Problems::with('tags', 'users')->get();
        return ResourceProblem::collection($problems);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $problems = new Problems();
        $problems->title =$request->title;
        $problems->body =$request->body;
        $problems->tag =$request->tag;
        $problems->user =$request->user;

        $problems->save();


        if($problems)
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
     * @param  \App\Models\Problems  $problems
     * @return \Illuminate\Http\Response
     */
    public function show(Problems $problems)
    {

        return response(['problems'=>$problems]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Problems  $problems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problems $problems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Problems  $problems
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problems $problems)
    {
        if( $problems->delete())
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
