<?php

namespace App\Http\Controllers;
use App\Models\Benchmark;

class BenchmarkController extends Controller
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
        return response()->json(Benchmark::offset(10)->limit(5)->get());
    }

    public function showIndustry()
    {
        return response()->json(Benchmark::select('trbc','industry')->distinct()->get());
    }

    public function showByInd($TRBC)
    {
        return response()->json(Benchmark::offset(10)->limit(5)->where('trbc', $TRBC)->get());
    }
    public function showByCompany($name)
    {
        return response()->json(Benchmark::where('instrument', $name)->get());
    }
    public function rankCompany($id)
    {
        $company = Benchmark::where('id', $id)->first();
        $array = Benchmark::where('trbc', $company->trbc)->orderBy('esgscore', 'DESC')->get()->toArray();

        $rank = array_search($id, array_column($array, 'id'));
        return response()->json(['company'=>$company,'rank'=>$rank+1, 'total' => count($array)]);
    }
    //
}
