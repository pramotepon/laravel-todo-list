<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\todolist;

use Carbon\Carbon;

class TodoListController extends Controller
{
    public function index(){
        $todos = todolist::all();
        return view('welcome', compact('todos'));
    }

    // เพิ่ม todo
    public function store(Request $request){
        $status = 0;
        $request->validate([
            'todo_name' => 'required|max:255'
        ],[
            'todo_name.required' => 'กรุณาใส่ข้อมูล',
            'todo_name.max' => 'ห้ามเกิน 255 ตัวอักษร'
        ]);

        todolist::insert([
            'todo_name' => $request->todo_name,
            'todo_status' => $status,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'เพิ่มข้อมูลเรียบร้อย');
    }

    // เรียกดูข้อมูลแก้ไข
    public function edit($id){
        $todo = todolist::find($id);
        return view('edit', compact('todo'));
    }

    // แก้ไขข้อมูล
    public function update(Request $request, $id){
        $request->validate([
            'todo_name' => 'required|max:255'
        ],[
            'todo_name.required' => 'กรุณาใส่ข้อมูล',
            'todo_name.max' => 'ห้ามเกิน 255 ตัวอักษร'
        ]);
        todolist::find($id)->update([
            'todo_name' => $request->todo_name
        ]);
        return redirect()->route('home')->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }

    // แก้ไขสถานะ
    public function updateStatus($id){
        $old_status = todolist::find($id);
        if($old_status->todo_status == 0){
            $status = 1;
        }else{
            $status = 0;
        }
        
        todolist::find($id)->update([
            'todo_status' => $status
        ]);

        return redirect()->back();
    }

    // ลบข้อมูล
    public function deleted($id){
        todolist::find($id)->delete();
        return redirect()->back()->with('danger', 'ลบข้อมูลแล้ว');
    }
}