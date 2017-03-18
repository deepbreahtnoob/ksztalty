<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Session;

class OrderController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $dateFormat = 'M j, Y H:i';
        $counter = 1;


       return view('orders.index')->withOrders($orders)->withFormat($dateFormat)->withCounter($counter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
          'name' => 'required'
        ));

        $order = new Order;

        $order->name = $request->name;
        $order->printed = 0;



        $order->save();
        Session::flash('success', 'Post zapisano pomyślnie!');
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $lines = $order->order_lines;
        $dateFormat = 'M j, Y H:i';

        return view('orders.show')->withOrder($order)->withLines($lines)->withFormat($dateFormat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('orders.edit')->withOrder($order);
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
        //znalezienie w bazie nazwy
        $order = Order::find($id);

        //Zapisanie wartości z forma

        $order->name = $request->name;
        $order->printed = 0;

        $order->save();
        Session::flash('success', 'Zmieniono zamówienie!');
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
