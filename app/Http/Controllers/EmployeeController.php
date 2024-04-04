<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\Pagination\Paginator;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Validator;
use PDF;

class EmployeeController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Employee::where('name', 'LIKE', '%'.$request->search.'%')->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }
        return view('datapegawai', compact('data'));

    }



    public function addData(){
        return view('addData');
    }
    public function insertData(Request $request){

        //validation
        $this->validate($request,[
            'name' => 'required|min:5|max:255',
            'notelephone' => 'required|min:10|max:11',
        ]);

        // $rules = [
        //     'name' => 'required|string|max:255', // Example validation rule for a name field
        //     'notelephone' => 'required|string|max:11', // Example validation rule for an email field
        //     // Add more validation rules as needed
        // ];
        // // Define custom error messages
        // $messages = [
        //     'name.required' => 'The name field is required.',
        //     'email.required' => 'The phone number field is required.',
        //     // Add more custom error messages as needed
        // ];

        // // Perform validation
        // $validator = Validator::make($request->all(), $rules, $messages);
        // // Check if validation fails
        // if ($validator->fails()) {
        //     // Redirect back with errors and old input
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // Validation passed, continue with your logic


        $data = Employee::create($request->all());

        if($request->hasFile('photo')){
            //dd($request);
            $request->file('photo')->move('photoEmployees/', $request->file('photo')-> getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
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
    public function exportPDF(){
        $data = Employee::all();
        view()->share('data', $data );
        $pdf = PDF::loadView('employeedetails-pdf');
        return $pdf->download('data.pdf');
    }
}
