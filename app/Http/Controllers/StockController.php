<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\StockType;
use App\Stock;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // account type achterhalen + optie's
        $loggedInUser = \Auth::user()->id;

        // opties ophalen voor de ingelogde user
        $account_options = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('options');

        // de id van ingelogde user ophalen uit user_permissions
        $account_id = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('user_id');

        $stockTypes = StockType::all();

        return view('stock.index', compact('stockTypes', 'account_options', 'account_id'))
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
        // account type achterhalen + optie's
        $loggedInUser = \Auth::user()->id;

        // opties ophalen voor de ingelogde user
        $account_options = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('options');

        // de id van ingelogde user ophalen uit user_permissions
        $account_id = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('user_id');
        return view('stock.create', compact('account_options', 'account_id'))
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
        // account type achterhalen + optie's
        $loggedInUser = \Auth::user()->id;

        // opties ophalen voor de ingelogde user
        $account_options = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('options');

        // de id van ingelogde user ophalen uit user_permissions
        $account_id = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('user_id');
        $stock = StockType::with('stock')->findOrFail($id);

        return view('stock.create', compact('stock', 'account_options', 'account_id'))
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
