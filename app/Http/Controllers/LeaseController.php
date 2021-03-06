<?php

namespace App\Http\Controllers;

use App\Book;
use App\Favorite;
use Carbon\Carbon;
use App\Lease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return view('leases', ['leases' => Auth::user()->leases, 'favorites' => Favorite::all()]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(isset($request->days) && isset($request->cost)) {
            Auth::user()->leases()->attach($request->id, ['leased_date' => date('yy-m-d'), 'days' => $request->days, 'cost' => $request->cost]);
            $book = Book::find($request->id);
            $book->available_copies -= 1;
            $book->save();
            return redirect()->route('home')->with('errors', '');
        }
        else{
            return redirect()->route('home')->with('errors', 'You must enter the number of days to lease a book.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function show(Lease $lease)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function edit(Lease $lease)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lease $lease)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Lease $lease)
    {
        $expirey_date = Carbon::createFromFormat('Y-m-d', $lease->leased_date);
        $expirey_date->addDays($lease->days);
        $date = date('yy-m-d');
        if($date == $expirey_date) {
            $book = Book::find($lease->book_id);
            $book->available_copies += 1;
            $book->save();
            Auth::user()->leases()->detach($lease);
        }
    }

    public static function getChartData()
    {
        $data = DB::table('leases')
            ->select('leased_date', 'cost')
            ->get();
        $chartData = array();
        $profit = 0;
        $index = 1;
        $first = DB::table('leases')->select('leased_date')->get()->first();
        $week = (new Carbon($first->leased_date))->addDays(6);

        foreach ($data as $obj) {
            if ($obj->leased_date <= $week) {
                $profit += $obj->cost;
            } else {
                $chartData[] = ['week' => 'Week '.$index++, 'profit' => $profit];
                $profit = $obj->cost;
                $week = (new Carbon($first->leased_date))->addDays(7);
                $first->leased_date = $week;
            }
        }
        $chartData[] = ['week' => 'Week '.$index++, 'profit' => $profit];

        return  $chartData;
    }

    public static function getLeaseDate(array $cahrtData)
    {
        $dates = array();
        foreach ($cahrtData as $date) {
            $dates[] = $date['week'];
        }

        return $dates;
    }
    public static function getLeaseProfits(array $cahrtData)
    {
        $profits = array();
        foreach ($cahrtData as $profit) {
            $profits[] = $profit['profit'];
        }

        return $profits;
    }
}
