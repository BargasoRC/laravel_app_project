<?php

namespace App\Http\Controllers;
use App\Models\Buses;
use App\Models\Seats;
use Illuminate\Http\Request;

class Ticketing extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function buses(){
        $post = Buses::get();
        return response()->json($post);
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
        $post = Buses::create($request->all());
        
        return response()->json($post);
    }

    public function seats(Request $request)
    {
        $post = Seats::create($request->all());

        return response()->json($post);
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
        $updateDetails = [
            'name' => $requeset->get('name'),
            'bus_number' => $requeset->get('bus_number'),
            'start_time' => $requeset->get('start_time'),
            'end_time' => $requeset->get('end_time'),
            'regular' => $requeset->get('regular'),
            'non_regular' => $requeset->get('non_regular'),
            'seats_number' => $requeset->get('seats_number'),
            'from' => $requeset->get('from'),
            'to' => $requeset->get('to')
        ];
        
        DB::table('buses')
            ->where('id', $request->get('id'))
            ->update($updateDetails);
        $post = Buses::find($id);
        $post = $request;
        $ret = $post->save();
        return response()->json($ret);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Buses::destroy($id);
        return response()->json($post);
    }

    public function destroy_seats($id)
    {
        try {
            $ids = explode(",", $id);
            $post =  Seats::find($ids)->each(function ($seat, $key) {
                $seat->delete();
            });
            return response()->json($post);
        }
        catch(\Exception $e) {
            return response()->json($e);
        }
    }
}
