<?php

namespace App\Http\Controllers;

use App\Model\Person;
use App\Model\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ReservationController extends Controller{
    //
    public function userSubmit(Request $request){
        $person = Person::find($request->email);
        if($person === null){
            $person = Person::create(['email' => $request->email, 'name' => $request->name]);
        }
        return view('party', ['person'=> $person]);
    }
    public function available($date){
        $reservations = Reservation::where([
            ['open', '=', true],
            ['date_time', '<=', $date],
            ['end', '>=', $date]
        ])->get();
        $tables = 0;
        foreach ($reservations as $rec){
            $tables+=$rec->tables;
        }
        if($tables >= getenv('MAX_TABLES')){
            return response(collect(['status'=>false, 'message' => 'unavailable']),200);
        }else{
            return response(collect(['status' => true, 'message' =>'available']),200);
        }
    }
    public function store(Request $request){
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $request->date_time);
        $res_count = Reservation::where([
            ['open', '=', true],
            ['date_time', '<=', $date],
            ['end', '>=', $date]
        ])->count();
        $tables = $request->tab_count;
        $end = $date->addHours($request->duration);
        $now = new Carbon();
        $owner = Person::find($request->email);
        $res = new Reservation();
        $res->table_number = $request->tab_count;
        $res->people_number = $request->head_count;
        $res->date_time = $date;
        $res->end = $end;
        if($date->ge($now->addDay())){
            if($tables > (getenv('MAX_TABLES') - $res_count)){
                return view('info', ['person' => $owner, 'res' => $res, 'text' => 'overload']);
            }
            $owner->reservations()->save();
            return view('confirm', ['person' => $owner, 'res' => $res]);
        }else{
            return view('info', ['person' => $owner, 'res' => $res, 'text' => 'invalid']);
        }
    }
    public function indexView(){
        return view('tables');
    }
    public function index(){
        $today = Carbon::now();
        $today->minute(00)->second(0);
        $hour = $today;
        $future = $today;
        $future->addDays(7);
        $arr = new Collection();
        $i = 0;
        while($i < (24*7)){
            $count = Reservation::where([
                ['open', '=', true],
                ['closed', '=', false],
                ['date_time', '<=', $hour],
                ['end', '>=', $hour]
            ])->sum('tables');
            $arr->push(new Collection([
                'date' => $hour->format('l, d F, Y'),
                'time' => $hour->format('g:i a'),
                'available_tables' => getenv('MAX_TABLES') - $count
            ]));
            $hour = $hour->addHour(1); $i++;
        }
        return  collect($arr);
//        return view('tables', ['reservations' => collect($arr)]);
    }
    public function confirm(Request $request){
        if($request->confirm === null){
            $res = Reservation::find($request->res);
            $res->closed = true;
            return view('info', ['res' => $res, 'owner' => $res->owner, 'text' => 'cancelled']);
        }else{
            $res = Reservation::find($request->res);
            return view(' info', ['res' => $res, 'owner' => $res->owner, 'text' => 'confirmed']);
        }
    }
    public function uRes(){
        return view('my_res');
    }
    public function uResView(Request $request){
        $owner = Person::find($request->email);
        if($owner == null){
            return view('my_res_next', ['text' => 'absent']);
        }else{
            return view('my_res_next', ['text' => 'real', 'owner' => $owner]);
        }
    }
    public function youIndex($email){
        $user = Person::find($email);
        $ress = $user->reservations()->where([
            ['open', '=', true],
            ['closed', '=', false],
        ]);
        $arr = new Collection();
        foreach ($ress as $res){
            $date = new Carbon($res->date_time);
            $end = new Carbon($res->end);
            $arr->push(new Collection([
                'date' => $date->format('l, d F, Y'),
                'time' => $date->format('g:i a'),
                'till' => $end->format('g:i a'),
                'number_of_People' =>$res->people,
                'number_of_Tables' => $res->tables
            ]));
        }
        return collect($arr);
    }
}
