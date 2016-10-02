<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use App\Order;
use Illuminate\Support\Facades\Redirect;

class cashierController extends Controller {


    public function getDashboard()
    {


    //view orders
        $newOrders = DB::table('orders')->where('status', 'new')
                    ->join('users', 'orders.customer_id','=','users.id')
                    ->join('order_items', 'orders.order_id','=', 'order_items.order_id')
                    ->join('food_items', 'order_items.item_id','=','food_items.item_id')
                    ->get();
        $inProgressOrders = DB::table('orders')->where('status', 'in-progress')
                    ->join('users', 'orders.customer_id','=','users.id')
                    ->join('order_items', 'orders.order_id','=', 'order_items.order_id')
                    ->get();



        $countInProgress = DB::table('orders')->where('status', 'in-progress')->count();


        $countNewOrders = DB::table('orders')->where('status', 'new')->count();




        return view('cashier_Abhayan.dashboard')->with('countNewOrders',$countNewOrders)
                                                ->with('newOrders',$newOrders)
                                                ->with('countInProgress',$countInProgress)
                                                ->with('inProgressOrders',$inProgressOrders);
    }

    public function postConfirmOrder(){
        if(Input::get('buttonProcessItem')){
            $order = Order::Where('order_id','=',Input::get('hiddenOrderID'))->first();
            $order->status='in-progress';
            $order->save();

            \Session::flash('flash_message', 'Order in-progress');
            return Redirect::route('get-dashboard');
        }
        elseif(Input::get('buttonCancelItem'))
        {
            $order = Order::Where('order_id','=',Input::get('hiddenOrderID'))->first();
            $order->status='cancelled';
            $order->save();
            \Session::flash('flash_message', 'Order cancelled');
            return Redirect::route('get-dashboard');
        }
        else
        {
            $order = Order::Where('order_id','=',Input::get('hiddenOrderID'))->first();
            $order->status='confirmed';
            $order->save();
            \Session::flash('flash_message', 'Order confirmed');
            return Redirect::route('get-dashboard');
        }
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
