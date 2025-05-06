<?php

namespace App\Http\Controllers\Uts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->paginate(10);

        $outPut = [
            "message" => "employees",
            "result" => $employees,
        ];

        return response()->json($outPut, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $employee = Employee::create($input);

        return response()->json(['message' => 'employee created', 'data' => $employee], 201);
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        if (!$employee) return response()->json(['message' => 'employee not found'], 404);

        return response()->json(['message' => 'employee detail', 'data' => $employee], 200);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (!$employee) return response()->json(['message' => 'employee not found'], 404);

        $employee->update($request->all());
        return response()->json(['message' => 'employee updated', 'data' => $employee], 200);
    }


    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (!$employee) return response()->json(['message' => 'employee not found'], 404);

        $employee->delete();
        return response()->json(['message' => 'employee deleted'], 200);
    }
}
