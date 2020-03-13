<?php

namespace App\Http\Controllers;

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
    public static function getLeaseDate()
    {
        // $week = DB::table('leases')->where(DB::raw("(DATE_FORMAT(leased_date,'%d'))"),'<=',date('d+7'))->get();
        $dateDB = DB::table('leases')
            ->select('leased_date')
            ->get();
        $index = 0; 
        $dates = array();
        foreach ($dateDB as $date){
            $dates[] = $date->leased_date;
        }
        return $dates;
    }
    public static function getLeaseCost()
    {
        $costDB = DB::table('leases')
            ->select('cost')
            ->get();
        $costs = array();
        foreach ($costDB as $cost){
            $costs[] = $cost->cost;
        }    
        return $costs;
    }
}
