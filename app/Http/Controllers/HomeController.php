<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $sql = 'select 
        count(a.name) as quant
        , b.description
        from category b
        left join products a on a.category_id = b.id
        group by description';
        $query = DB::select($sql);
        $chartdata = '';
        foreach ($query as $key => $value) {
            $chartdata .= '['."`$value->description`" .', '. "$value->quant".'],';
        }
        return view('pages.home')->with([
            'sql' => $query,
            'chartdata' => $chartdata
        ]);
    }
}
