<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Award;
use App\Http\Resources\AwardResource;
class AwardController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $awards = Award::all();
        return response()->json(AwardResource::collection($awards));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $award = Award::create($request->all());
        return response()->json(AwardResource::make($award));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $award = Award::find($id);
        return response()->json(AwardResource::make($award));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $award = Award::find($id);
        $award->delete();
        return response()->json(true);
    }
    public function getByEventId(Request $request)
    {
        //
        $event_id = $request['event_id'];
        // dd($event_id);
        $award = Award::where('event_id', $event_id)->get();
        if($award) {
            return response()->json(AwardResource::collection($award));
        }
        return response()->json(0);
    }
}
