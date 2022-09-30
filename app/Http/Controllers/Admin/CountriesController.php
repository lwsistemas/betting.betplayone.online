<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload;
use App\Models\Countrie;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    use Upload;

    public function listaCountrie()
    {
        $data['page_title'] = "Payout Method";
        $data['data'] = Countrie::orderBy('id','asc')->get();
        return view('admin.countries.index', $data);
    }


}
