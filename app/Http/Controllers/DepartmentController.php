<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    
    // Show add form view
    public function createDepartment()
    {
        return view('admin.adddepartment');
    }

    // Add new data department in database
    public function saveDepartment(Request $request)
    {
        $this->validate($request, ['department_name' => 'required|unique:departments']);

        $add = new Department();
        $add->department_name = $request->department_name;
        $add->save();

        return back()->with('success', '' . $add->department_name . ' a été enregistrer.');
    }

    // List the department in database
    public function showDepartment()
    {
        $show = Department::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.showdepartment')->with('departments', $show);
    }

    // Show edit department form view
    public function editDepartment($id)
    {
        $department = Department::find($id);
        return view('admin.editdepartment')->with('department', $department);
    }

    // Editing the department in database
    public function editSave(Request $request)
    {
        $this->validate($request, ['department_name' => 'required|unique:departments']);

        $edit = Department::find($request->id);
        $edit->department_name = $request->department_name;
        $edit->update();

        return redirect('administration/department/list')->with('success', 'La modification du département a été enregistrer.');
    }

    // Delete the department in database
    public function deleteDepartment($id)
    {
        $delete = Department::find($id);
        $delete->delete();

        return redirect('/administration/department/list')->with('success', 'Le ' . $delete->department_name . ' a été supprimer.');
    }

}
