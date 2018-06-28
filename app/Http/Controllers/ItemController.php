<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class ItemController extends Controller
{
    public function home()
    {
        return view('vueApp');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::get();
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
        $this->validate($request, [
            'item_title' => 'required',
            'item_price' => 'required',
          ]);
  
          $create = Item::create($request->all());
          return response()->json(['status' => 'success','message'=>'item created successfully']);
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
        return Item::where('id','=',$id)
        ->first();
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
        $this->validate($request, [
            'item_title' => 'required',
            'item_price' => 'required',
          ]);
    
          $post = Item::where('id','=',$id)
          ->first();
          if($post->count()){
            $post->update($request->all());
            return response()->json(['status'=>'success','message'=>'Item Updated Successfully']);
          } else {
            return response()->json(['status'=>'error','message'=>'Item not Updated']);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Item::where('id','=',$id)
          ->first();
          if($post->count()){
            $post->delete();
            return response()->json(['status'=>'success','message'=>'Item Deleted Successfully']);
          } else {
            return response()->json(['status'=>'error','message'=>'Item not Deleted']);
          }
    }
}
