<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GroupsRequest;
use App\Models\Group;
use App\Models\Program;


class GroupsController extends Controller
{

    public function index()
    {
        $groups = Group::query()
            ->orderBy('name', 'asc')
            ->get();
        return view('admin.groups.index', compact('groups'));
    }


    public function create(Group $group)
    {
        $programs = Program::query()
            ->select('id', 'title', 'year')
            ->orderBy('year', 'desc')
            ->get();
        return view('admin.groups.form', compact('group','programs'));
    }


    public function store(GroupsRequest $request, Group $group)
    {
        $data = $request->validated();
        $this->save($data, $group, 'groups');
        return view('admin.groups.show', compact('group'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Group $group)
    {
        $students = $group->students()->orderBy('surname')->get();
        return view('admin.groups.show', compact('group', 'students'));
    }


    public function edit(Group $group)
    {
        $programs = Program::query()
            ->select('id', 'title', 'year')
            ->orderBy('year', 'desc')
            ->get();
        return view('admin.groups.form', compact('group','programs'));
    }


    public function update(GroupsRequest $request, Group $group)
    {
        $data = $request->validated();
        $this->save($data, $group, 'groups');
        return view('admin.groups.show', compact('group'))->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('admin.groups.index')->with('alert', 'Дія виконана успішно!');
    }

}
