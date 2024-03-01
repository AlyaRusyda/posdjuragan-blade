<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BEController\EmployeeProcess;

class EmployeeController extends Controller
{
    public function indexCs()
    {
        $search = request('search');

        // Menyimpan nilai pencarian dalam session
        Session::put('employee_search', $search);


        return view('admin.data-cs.data-cs', [
            'title' => 'Data Customer Service',
            'search' => $search,
            'data_cs' => Employee::filter(['search' => $search, 'role' => 'cs'])->paginate(9)->withQueryString()
        ]);
    }
    public function indexAdmin()
    {
        $search = request('search');

        // Menyimpan nilai pencarian dalam session
        Session::put('employee_search', $search);


        return view('super-admin.data-admin.main', [
            'title' => 'Data Customer Service',
            'search' => $search,
            'data_admin' => Employee::filter(['search' => $search, 'role' => 'admin'])->paginate(9)->withQueryString()
        ]);
    }

    public function addCs(){
        return view('admin.data-cs.add',["title"=>"tambah data"]);
    }
    public function createCs(Request $request)
    {
        $request->merge(['role' => 'cs']);
        $employeeProcess = new EmployeeProcess;
        $employeeProcess->addEmployee($request);

        return redirect()->route('dataCs')->with('success', 'Data successfully add.');
    }

    public function createAdmin(Request $request)
    {
        $employeeProcess = new EmployeeProcess;
        $employeeProcess->addEmployee($request);

        return redirect()->route('dataAdmin')->with('success', 'Data successfully add.');
    }

    public function editCs(Request $request, $id)
    {
        //
        $employeeProcess = new EmployeeProcess;
        $employeeProcess->updateDataEmploye($request, $id);

        return redirect()->route('dataCs')->with('success', 'Data Berhasil di update');
    }

    public function editAdmin(Request $request, $id)
    {
        //
        $employeeProcess = new EmployeeProcess;
        $employeeProcess->updateDataEmploye($request, $id);

        return redirect()->route('dataAdmin')->with('success', 'Data Berhasil di update');
    }

    public function changePassword(Request $request, $id){
        $employeeProcess = new EmployeeProcess;
        $employeeProcess->changePasswordEmployee($request, $id);

        return back()->with('success', 'Berhasil mengubah password');
    }

    public function destroy($id){
        $employeeProcess = new EmployeeProcess;
        $employeeProcess->deleteData($id);

        return back()->with('success', 'Data Berhasil di hapus');
    }
}
