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
    public function showCountries()
    {
        return response()->json(Benchmark::select('country')->distinct()->get());
    }

    public function filterByIndCountry($TRBC,$country,$name=null)
    {
        $list = Benchmark::limit(5);
        if($TRBC && $TRBC!=null && $TRBC!=''&& $TRBC!=0)
            $list =$list->where('trbc', $TRBC);
        if($country && $country!=null && $country!=''&& $country!='null')
            $list =$list->where('country', $country);
         if($name && $name!=null && $name!=0)
            $list =$list->where('instrument','like', "%".$name."%");
        $list =$list->get()->toArray();
        return response()->json($list);
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
