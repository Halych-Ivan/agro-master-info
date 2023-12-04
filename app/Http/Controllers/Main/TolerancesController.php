<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Maatwebsite\Excel\Facades\Excel;

class TolerancesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $file = "uploads/tolerances/123.xlsx";

        dd($file);

        $data = Excel::toArray([], $file);





        return view('agromaster.tolerances', compact('data'));
    }

}
