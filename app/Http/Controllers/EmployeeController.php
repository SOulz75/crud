<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $data = Employee::all();
        return view('datapegawai', compact('data'));
    }

    public function addData(){
        return view('addData');
    }
    public function insertData(Request $request){
        //
        Employee::create($request->all());
        return redirect()->route('pegawai')->with('success', 'Data has been stored.');
    }

    public function showDataEmployee($id){
        $data = Employee::find($id);
        return view('showData', compact('data'));
    }
    public function updateDataEmployee(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data has been update.');
    }
    public function deleteDataEmployee($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data has been deleted.');
    }
}