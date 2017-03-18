<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Order;
use App\Shape;
use App\OrderLine;

class OrderLineController extends Controller
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
    public function index($order)
    {
        
        $ord = Order::find($order);
        $lines = $ord->order_lines;
        $dateFormat = 'M j, Y H:i';
        $counter = 1;


       return view('order_lines.index')->withLines($lines)->withFormat($dateFormat)->withCounter($counter)->withOrd($ord);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order)
    {
        return view('order_lines.create')->withOrder($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $orderId)
    {
        $this->validate($request, array(
          'description' => 'required'
        ));

        $orderLine = new OrderLine;

        $orderLine->order_id = $request->order_id;
        $orderLine->quantity = $request->quantity;
        $orderLine->height = $request->height;
        $orderLine->width = $request->width;
        $orderLine->okleina_a = $request->has('okleina_a');
        $orderLine->okleina_b = $request->has('okleina_b');
        $orderLine->okleina_c = $request->has('okleina_c');
        $orderLine->okleina_d = $request->has('okleina_d');
        $orderLine->description = $request->description;


        $orderLine->save();
        Session::flash('success', 'Post zapisano pomyślnie!');
        return redirect()->route('orders.order_lines.index', [$orderId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($order, $id)
    {
        $ol = OrderLine::find($id);

        $dateFormat = 'M j, Y H:i';
        return view('order_lines.edit')->withOl($ol)->withFormat($dateFormat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orderId, $id)
    {

        $orderLine = OrderLine::find($id);
        $orderLine->order_id = $request->order_id;
        $orderLine->quantity = $request->quantity;
        $orderLine->height = $request->height;
        $orderLine->width = $request->width;
        $orderLine->okleina_a = $request->has('okleina_a');
        $orderLine->okleina_b = $request->has('okleina_b');
        $orderLine->okleina_c = $request->has('okleina_c');
        $orderLine->okleina_d = $request->has('okleina_d');
        $orderLine->description = $request->description;


        $orderLine->save();
        Session::flash('success', 'Post zapisano pomyślnie!');
        return redirect()->route('orders.order_lines.index', [$orderId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderId, $orderLineId)
    {
        $orderLine = OrderLine::find($orderLineId);
        $orderLine->delete();
        Session::flash('success', 'zapas usunięto pomyślnie!');
        return redirect()->route('orders.order_lines.index', [$orderId]);
    }
}
