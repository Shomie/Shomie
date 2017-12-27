<?php

namespace App\Http\Controllers;

use Request;
use App\Property;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$properties = Property::paginate(10);

	return view('home', ['properties' => $properties]);

    }

    public function single_bed(){

        $properties = Property::where("type","Room")->paginate(10);
	return view('home', ['properties' => $properties]);

    }

    public function double_bed(){

        $properties = Property::where("type","Room(double)")->paginate(10);
	return view('home', ['properties' => $properties]);

    }

    public function expenses_included(){
        $properties = Property::where("expenses_included",1)->paginate(10);
	return view('home', ['properties' => $properties]);

    }

    public function comfort(){
	$properties = Property::where("type","not like","%Room%")->paginate(10);
        return view('home', ['properties' => $properties]);

    }

    public function bargain(){
	$average_price = Property::avg('price');
	$properties = Property::where("price","<", $average_price)->paginate(10);

        return view('home', ['properties' => $properties]);


    }

 public function search()
    {
      $keyword =    Request::input('my_search_data');
    $properties = Property::where('price', 'like', '%' . $keyword . '%')->paginate(10);

        return view('home', ['properties' => $properties]);

    }

    public function show($id){
      $img = Property::where("id",$id);


	return view('property/{$id}');
    }

    public function add_to_wishlist($id){

    }

}
