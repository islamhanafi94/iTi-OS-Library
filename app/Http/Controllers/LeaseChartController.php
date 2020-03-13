<?php

namespace App\Http\Controllers;

use App\Lease;
use App\Charts\LeaseChart;
use Illuminate\Http\Request;

class LeaseChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chartData = LeaseController::getChartData();  
        $date  = LeaseController::getLeasedate($chartData);
        $cost  = LeaseController::getLeaseProfits($chartData);

        $Chart = new LeaseChart;
        $Chart->labels($date);
        $Chart->dataset('Profit by trimester', 'line', $cost)
              ->color("rgb(255, 99, 132, 1.0)")
              ->backgroundcolor("rgb(255, 99, 132, 0.2)"); 
                
        return view('reports', [ 'Chart' => $Chart ] );
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
}
