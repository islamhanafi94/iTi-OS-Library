<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Lease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaseController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function show(Lease $lease)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lease $lease)
    {
        //
    }

    public static function getChartData()
    {
        $data = DB::table('leases')
            ->select('leased_date', 'cost')
            ->get();
        $cahrtData = array();
        $profit = 0;
        $index = 1;
        $first = DB::table('leases')->select('leased_date')->get()->first();
        $week = (new Carbon($first->leased_date))->addDays(6);

        foreach ($data as $obj) {
            if ($obj->leased_date <= $week) {
                $profit += $obj->cost;
            } else {
                $cahrtData[] = ['week' => 'Week '.$index++, 'profit' => $profit];
                $profit = $obj->cost;
                $week = (new Carbon($first->leased_date))->addDays(7);
                $first->leased_date = $week;
            }
        }
        $cahrtData[] = ['week' => 'Week '.$index++, 'profit' => $profit];

        return  $cahrtData;
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
