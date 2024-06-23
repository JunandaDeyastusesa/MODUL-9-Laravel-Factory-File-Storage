<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $pageTitle = 'Employee List';

    //     // RAW SQL QUERY
    //     $employees = DB::table('employees')
    //             ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
    //             ->select('employees.*', 'employees.id as employee_id', 'positions.name as position_name')
    //             ->get();

    //     return view('employee.index', [
    //         'pageTitle' => $pageTitle,
    //         'employees' => $employees
    //     ]);
    // }

    public function index()
    {
        $pageTitle = 'Employee List';
        // ELOQUENT
        $employees = Employee::all();
        return view('employee.index', [
            'pageTitle' => $pageTitle,
            'employees' => $employees
        ]);
    }

    // public function create()
    // {
    //     $pageTitle = 'Create Employee';
    //     // RAW SQL Query
    //     $positions = DB::table('positions')->get();

    //     return view('employee.create', compact('pageTitle', 'positions'));
    // }

    // public function store(Request $request)
    // {
    //     $messages = [
    //         'required' => ':Attribute harus diisi.',
    //         'email' => 'Isi :attribute dengan format yang benar',
    //         'numeric' => 'Isi :attribute dengan angka'
    //     ];

    //     $validator = Validator::make($request->all(), [
    //         'firstName' => 'required',
    //         'lastName' => 'required',
    //         'email' => 'required|email',
    //         'age' => 'required|numeric',
    //     ], $messages);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // INSERT QUERY
    //     DB::table('employees')->insert([
    //         'firstname' => $request->firstName,
    //         'lastname' => $request->lastName,
    //         'email' => $request->email,
    //         'age' => $request->age,
    //         'position_id' => $request->position,
    //     ]);

    //     return redirect()->route('employees.index');
    // }

    public function create()
    {
        $pageTitle = 'Create Employee';
        // ELOQUENT
        $positions = Position::all();
        return view('employee.create', compact('pageTitle', 'positions'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('cv');

        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();

            // Store File
            $file->store('public/files');
        }

        // ELOQUENT
        $employee = new Employee;
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;

        if ($file != null) {
            $employee->original_filename = $originalFilename;
            $employee->encrypted_filename = $encryptedFilename;
        }

        $employee->save();

        return redirect()->route('employees.index');
    }

    public function downloadFile($employeeId)
    {
        $employee = Employee::find($employeeId);
        $encryptedFilename = 'public/files/' . $employee->encrypted_filename;
        $downloadFilename = str::lower($employee->firstname . '_' . $employee->lastname . '_cv.pdf');

        if (Storage::exists($encryptedFilename)) {
            return Storage::download($encryptedFilename, $downloadFilename);
        }
    }



    // public function show(string $id)
    // {
    //     $pageTitle = 'Employee Detail';

    //     // Query Builder
    //     $employee = collect(DB::table('employees')
    //         ->select('employees.*', 'employees.id as employee_id', 'positions.name as position_name')
    //         ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
    //         ->where('employees.id', $id)
    //         ->get())->first();

    //     return view('employee.show', compact('pageTitle', 'employee'));
    // }

    public function show(string $id)
    {
        $pageTitle = 'Employee Detail';
        // ELOQUENT
        $employee = Employee::find($id);
        return view('employee.show', compact('pageTitle', 'employee'));
    }

    // public function edit(string $id)
    // {
    //     $pageTitle = 'Employee Detail';

    //     // Mengambil data employee berdasarkan ID
    //     $employee = collect(DB::select('
    //     select *, employees.id as employee_id, positions.name as position_name
    //     from employees
    //     left join positions on employees.position_id = positions.id
    //     where employees.id = ?
    //     ', [$id]))->first();

    //     // Mengambil semua data posisi
    //     $positions = DB::table('positions')->get();

    //     return view('employee.edit', compact('pageTitle', 'employee', 'positions'));
    // }

    // public function update(Request $request, string $id)
    // {
    //     $messages = [
    //         'required' => ':Attribute harus diisi.',
    //         'email' => 'Isi :attribute dengan format yang benar',
    //         'numeric' => 'Isi :attribute dengan angka'
    //     ];

    //     $validator = Validator::make($request->all(), [
    //         'firstName' => 'required',
    //         'lastName' => 'required',
    //         'email' => 'required|email',
    //         'age' => 'required|numeric',
    //         'position' => 'required' // Pastikan ini sesuai dengan name yang ada pada form
    //     ], $messages);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // Mengambil data employee berdasarkan ID
    //     DB::table('employees')->where('id', $id)->update([
    //         'firstname' => $request->firstName,
    //         'lastname' => $request->lastName,
    //         'email' => $request->email,
    //         'age' => $request->age,
    //         'position_id' => $request->position,
    //     ]);

    //     return redirect()->route('employees.index')->with('success', 'Employee data updated successfully.');
    // }

    public function edit(string $id)
    {
        $pageTitle = 'Edit Employee';
        // ELOQUENT
        $positions = Position::all();
        $employee = Employee::find($id);
        return view('employee.edit', compact(
            'pageTitle',
            'positions',
            'employee'
        ));
    }
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $employee = Employee::findOrFail($id);
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            $file->store('public/files');

            $employee->original_filename = $originalFilename;
            $employee->encrypted_filename = $encryptedFilename;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    // public function destroy(string $id)
    // {
    //     DB::table('employees')
    //         ->where('id', $id)
    //         ->delete();

    //     return redirect()->route('employees.index');
    // }

    public function destroy(string $id)
    {
        // ELOQUENT
        Employee::find($id)->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
