<?php

namespace App\Http\Controllers;

use App\Models\Cro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        $cros = Cro::query()
        ->when($keyword, function ($query) use ($keyword) {
            $query->where('first_name', 'like', '%' . $keyword . '%')  // Search by invoice number
            ->orWhere('role', 'like', '%' . $keyword . '%');
        })
        ->orderBy('id','desc')
        ->paginate(10);
        return view('Cro.list',compact('cros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'company_name' => 'required',
        //     'first_name' => 'required',
        //     'email' => 'nullable',
        //     'phone' => 'required',
        //     'address' => 'nullable',
        //     'hire_date' => 'nullable',
        //     'salary' => 'required',
        // ]);
        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $cro = new Cro();

        $cro->company_name = $request->company_name;
        $cro->first_name = $request->first_name;
        $cro->last_name = $request->last_name;
        $cro->email = $request->email;
        $cro->phone = $request->phone;
        $cro->address = $request->address;
        $cro->role=$request->role;
        $cro->hire_date = $request->hire_date;
        $cro->salary = $request->salary;
        $cro->save();

        return redirect()->route('cro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $member = Cro::find($id);
        return view('Cro.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cro = Cro::findOrFail($id);

$cro->company_name = $request->company_name;
$cro->first_name = $request->first_name;
$cro->last_name = $request->last_name;
$cro->email = $request->email;
$cro->phone = $request->phone;
$cro->address = $request->address;
$cro->role = $request->role;
$cro->hire_date = $request->hire_date;
$cro->salary = $request->salary;
$cro->save();

return redirect()->route('cro.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}