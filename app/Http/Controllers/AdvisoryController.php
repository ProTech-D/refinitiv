<?php

namespace App\Http\Controllers;
use App\Models\Advisory;


class AdvisoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAll()
    {
        return response()->json(Advisory::get()->toArray());
    }
 
}
