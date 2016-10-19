<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\StockType;
use App\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockTypes = StockType::all();

        return view('stock.index', compact('stockTypes'))
               ->with('title', 'Stock');
    }

    public function increase($id){
        $stock = Stock::findOrFail($id);
        $stock->increment('tonnage');  
        $stock->save();

        return redirect()->back();
    }

    public function decrease($id){
        $stock = Stock::findOrFail($id);
        $stock->decrement('tonnage');  
        $stock->save();

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create')
               ->with('title', 'Grondstof type toevoegen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = Stock::create([
            'tonnage' => $request->input('tonnage'),
            'image' => '',
        ]);

        $stockType = StockType::create([
            'type' => $request->input('type'),
            'stock_id' => $stock->id
        ]);

        return redirect()->action('StockController@index');
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
        $stock = StockType::with('stock')->findOrFail($id);

        return view('stock.create', compact('stock'))
               ->with('title', 'Grondstof aanpassen');
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
        $stockType = StockType::findOrFail($id);
        $stock = Stock::findOrFail($stockType->stock_id);

        $stockType->type = $request->input('type');
        $stock->tonnage = $request->input('tonnage');

        $stockType->save();
        $stock->save();

        return redirect()->action('StockController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stockType = StockType::findOrFail($id);
        $stock = Stock::findOrFail($stockType->stock_id);

        $stockType->delete();
        $stock->delete();

        return redirect()->back();
    }
}
