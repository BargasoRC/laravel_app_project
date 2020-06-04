<?php

namespace App\Http\Controllers;
use App\Models\Buses;
use App\Models\Seats;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Passengers;
use App\Models\Tickets;


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

    public function dashboard(Request $request){
        return response()
                    ->json(
                        Tickets::with('relations_passenger','relations_bus')
                        ->where('date',$request->get('date'))
                        ->get()
                    );
    }

    public function buses(){
        $post = Buses::get();
        return response()->json($post);
    }
    public function searchBus(Request $request){
        $buses = Buses::where('from','=',$request->get('from'))
                        ->where('to','=',$request->get('to'))
                        ->get();
        return response()->json($buses);
    }

    public function retrieveAllBus(){
        $buses = Buses::get();
        return response()->json($buses);
    }
    
    public function retrieveSeats($busId){
        $data = Seats::where('bus_id','=',$busId)
                       ->where('status','=','vaccant')->get();
        return response()->json($data);
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


    public function storePassengers(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required', 'unique',
            'phone' => 'required',
        ]);
        $passengers = new Passengers([
            'name' => $request->get('name'),
            'age' =>  $request->get('age'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'email' =>  $request->get('email'),
            'phone' =>  $request->get('phone'),
        ]);
        $passenger_data = [
            'name' => $request->get('name'),
            'age' =>  $request->get('age'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'email' =>  $request->get('email'),
            'phone' =>  $request->get('phone'),
        ];
        $passengers->save();
        $ticket_numbers = [];  //list of ticket numbers to be sent back to the user
        for($i=0;$i<count($request->get('seat_number'));$i++){
            DB::table('seats')
                ->where('bus_id',(int)$request->get('bus_id'))
                ->where('seat_number',(int)$request->get('seat_number')[$i])
                ->update(['status' => 'Occupied']);
        }

        for($i = 0; $i < count($request->get('bill')); $i++){
            $passenger_id_data = Passengers::where($passenger_data)->get();
            $ticket_number = $this->ticket_generator();
            $passenger_id = (int)$passenger_id_data[0]->id;
            $status = 'pending';
            $ticket_info = new Tickets([
                        'date'=>$request->get('date'),
                        'from'=>$request->get('from'),
                        'to'=>$request->get('to'),
                        'bus_id'=>$request->get('bus_id'),
                        'seat_number'=>$request->get('seat_number')[$i],
                        'departure'=>$request->get('departure'),
                        'arrival'=>$request->get('arrival'),
                        'bill'=>$request->get('bill')[$i],
                        'ticket_number'=>$ticket_number,
                        'passenger_id'=>$passenger_id,
                        'status'=>$status
            ]);
            $ticket_info->save();
            array_push($ticket_numbers,$ticket_number);
        }
        return response()->json($ticket_numbers); //response 
    }
    public function storeTickets(Request $request){
        $ticket = Tickets::create($request->all());
        return response()->json($ticket);
    }

    public function ticket_generator() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 7; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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

    public function release_ticket(Request $request){
        DB::table('tickets')
            ->where('id',$request->get('id'))
            ->update(['status'=>'released']);
        return response()->json('{"status":"success"}');
    }

    public function hold_ticket(Request $request){
        DB::table('seats')
            ->where('seat_number',$request->get('seat_number'))
            ->update(['status'=>'vaccant']);
        DB::table('tickets')
            ->where('id',$request->get('id'))
            ->update(['status'=>'hold']);
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

    public function logout()
    {
        Auth::logout();
        return response()->json(["success" => true], 200);
    }

}
