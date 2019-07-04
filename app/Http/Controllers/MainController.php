<?php

namespace App\Http\Controllers;

use App\Logger;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Handle an index request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            return Logger::orderBy('created_at', 'desc')->paginate(15);
        }

        return view('index');
    }
}
