<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use DB;

class foodItemsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view("foodItems.addFootItems");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $num=rand(1,500);
        $itemID="BA".$num;
        $itemName=Request::input('itemName');
        $itemPrice=Request::input('itemPrice');
        $unitType=Request::input('itemType');
        $quantity=Request::input('quantity');
        $imagePath="";
        $isRemove=0;
        date_default_timezone_set('Asia/Colombo');
        $date_time=date("Y-m-d H:i:s");
        if(Input::hasFile('orderImage'))
        {
            $file=Input::file('orderImage');
            $file->move('Images',$file->getClientOriginalName());
            $imagePath="Images/".$file->getClientOriginalName();

        }
        DB::table('food_items')->insert(
            ['item_id' => $itemID,
                'item_name'=>$itemName,
                'unit_price'=>$itemPrice,
                'unit_type'=>$unitType,
                'available_quantity'=>$quantity,
                'item_image_path'=>$imagePath,
                'is_remove'=>$isRemove,
                'created_at'=>$date_time

            ]
        );
        return view("foodItems.addFootItems");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

    public function displayItems()
    {
        $items= DB::table('food_items')->get();

        foreach ($items as $item)
        {
           // var_dump($item->item_name);
        }
        return view("foodItems.foodItemsView",compact('items'));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
