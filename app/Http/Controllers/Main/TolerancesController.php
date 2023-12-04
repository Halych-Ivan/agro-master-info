<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Tolerance;
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

        return view('agromaster.tolerances');
    }

    public function show($group)
    {
        $tolerances = Tolerance::query()
            ->where('group', 'like', '%' . $group . '%')
            ->orderBy('group')
            ->orderBy('title')
            ->get();

        return view('agromaster.tolerances_show', compact('tolerances'));
    }

}
