<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shape;
use Session;

class ShapeController extends Controller
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
       $shapes = Shape::all();
       $dateFormat = 'M j, Y H:i';
       $counter = 1;


       return view('shapes.index')->withShapes($shapes)->withFormat($dateFormat)->withCounter($counter);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shapes.create');
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
          'height' => 'required',
          'width' => 'required',
        ));

        $shape = new Shape;

        $shape->height = $request->height;
        $shape->width = $request->width;
        $shape->description = $request->description;
        $shape->okleina_a = $request->has('okleina_a');
        $shape->okleina_b = $request->has('okleina_b');
        $shape->okleina_c = $request->has('okleina_c');
        $shape->okleina_d = $request->has('okleina_d');

        $shape->save();
        Session::flash('success', 'Post zapisano pomyślnie!');
        return redirect()->route('shapes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shape = Shape::find($id);
        $dateFormat = 'M j, Y H:i';
        return view('shapes.index')->withShape($shape)->withFormat($dateFormat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shape = Shape::find($id);

        $dateFormat = 'M j, Y H:i';
        return view('shapes.edit')->withShape($shape)->withFormat($dateFormat);

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

      $shape = Shape::find($id);

      $shape->height = $request->height;
      $shape->width = $request->width;
        $shape->okleina_a = $request->has('okleina_a');
        $shape->okleina_b = $request->has('okleina_b');
        $shape->okleina_c = $request->has('okleina_c');
        $shape->okleina_d = $request->has('okleina_d');
      $shape->description = $request->description;

      $shape->save();
      Session::flash('success', 'zapas zmodyfikowano pomyślnie!');
      return redirect()->route('shapes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shape = Shape::find($id);
        $shape->delete();
        Session::flash('success', 'zapas usunięto pomyślnie!');
        return redirect()->route('shapes.index');
    }
}
