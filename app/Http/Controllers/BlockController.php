<?php

namespace App\Http\Controllers;

use App\Block;
use App\BlockLength;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::with('length')->get();

        return view('block.index', compact('blocks'))->with('title', 'Blocks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('block.create')->with('title', 'Create Block');
    }

    public function create_length($id){

        $block = Block::find($id);

        return view('block.create_length', compact('block'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $block = new Block;

        $block->name = $request->input('name');
        $block->save();

        return redirect()->action('BlockController@index');
    }

    public function store_length(Request $request)
    {
        $block = new BlockLength;

        $block->length = $request->input('length');
        $block->block_id = $request->input('block_id');
        $block->stock = $request->input('stock');
        $block->save();

        return redirect()->action('BlockController@index');
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
        $block = Block::findOrFail($id);

        return view('block.update', compact('block'));
    }

     public function edit_length($id)
    {
        $block = BlockLength::findOrFail($id);

        return view('block.update_length', compact('block'));
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
        $block = Block::findOrFail($id);

        $block->name = $request->input('name');
        $block->save();

        return redirect()->action('BlockController@index');
    }

    public function update_length(Request $request, $id)
    {
        $block = BlockLength::findOrFail($id);

        $block->length = $request->input('length');
        $block->stock = $request->input('stock');
        $block->save();

        return redirect()->action('BlockController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Block::find($id);
        $block->delete();

        return redirect()->back();
    }

    public function destroy_length($id)
    {
        $blockL = BlockLength::find($id);
        $blockL->delete();

        return redirect()->back();
    }
}
