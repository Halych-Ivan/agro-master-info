<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatementsRequest;
use App\Models\Statement;
use Illuminate\Http\Request;

class StatementsController extends Controller
{

    public function index()
    {
        dd(123);
    }


    public function create()
    {
        //
    }


    public function store(StatementsRequest $request)
    {
        //
    }


    public function show(Statement $statement)
    {
        //
    }


    public function edit(Statement $statement)
    {
        //
    }


    public function update(StatementsRequest $request, Statement $statement)
    {
        //
    }


    public function destroy(Statement $statement)
    {
        //
    }
}
