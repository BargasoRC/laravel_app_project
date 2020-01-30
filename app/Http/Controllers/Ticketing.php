<?php

namespace App\Http\Controllers;
use App\Models\Buses;
use App\Models\Seats;
use Illuminate\Http\Request;
use DB;


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
    public function searchBus(Request $request){
        //return response()->json("ok");
        // $this->validate($request,[
        //     'to'=> 'required',
        //     'from' => 'required'
        // ]);
        $buses = Buses::where('from','=',$request->get('from'))
                        ->where('to','=',$request->get('to'))
                        ->get();
    
        return response()->json($buses);
    }

    public function retrieveAllBus(){
        $buses = Buses::get();
        return response()->json($buses);
    }

    public function retrieveSchedules(){
        $post = Buses::select('name','bus_number','from','to','start_time','end_time')->get();
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
    public function update(Request $request)
    {
        $updateDetails = [
            'name' => $request->get('name'),
            'bus_number' => $request->get('bus_number'),
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time'),
            'regular' => $request->get('regular'),
            'non_regular' => $request->get('non_regular'),
            'seats_number' => $request->get('seats_number'),
            'from' => $request->get('from'),
            'to' => $request->get('to')
        ];
        DB::table('buses')
            ->where('id', $request->get('id'))
            ->update($updateDetails);
        Seats::where('bus_id', $request->get('id'))->delete();
        for($i = 1; $i <= $request->get('seats_number'); ++$i)
        {
            $data = [
                'bus_id'=>$request->get('id'),
                'seat_number'=> $i,
                'status'=>'vaccant'
            ];
            Seats::create($data);

        }
        return response()->json('{"status":"success"}');
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


    
}
