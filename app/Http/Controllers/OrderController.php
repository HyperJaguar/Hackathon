<?php namespace App\Http\Controllers;

use App\Cart;
use App\Fooditems;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;


class OrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $foodItems = Fooditems::all();

        return view('Order.createOrder',compact('foodItems'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

    public function create()
	{
		//
	}

    public function addToCart()
    {
        $input = Request::all();
        $customer_id = $input['customer_id'];
        $item_id = $input['item_id'];
        $quantity = $input['quantity'];

        $newCart = new Cart();
        $newCart->id = $customer_id;
        $newCart->item_id = $item_id;
        $newCart->quantity = $quantity;

        $newCart->save();

        $cart = Cart::all();
        return view('Order.createOrder',compact('cart'));
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
