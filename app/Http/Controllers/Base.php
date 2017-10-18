<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
class Base extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $date=[];
    public function __construct()
    {
        $this->date['footerServ']=Category::where('active',1)->get()->take(4);
    }

    public function index(){

        return view('home');
    }
}
