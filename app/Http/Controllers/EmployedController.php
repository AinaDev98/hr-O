<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use App\Models\employed;
use App\Models\post;
use Illuminate\Http\Request;

class EmployedController extends Controller
{

    // Show login form view
    public function formLogin()
    {
        return view('front.login');
    }
    
    // Show form view employed
    public function createEmployed()
    {
        $categories = Category::all()->pluck('category_name', 'category_name');
        $departments = Department::all()->pluck('department_name', 'department_name');
        $posts = post::all()->pluck('post_name', 'post_name');
        
        return view('admin.register')->with('categories', $categories)->with('departments', $departments)->with('posts', $posts);
    }

    // Save employed in database
    public function saveEmployed(Request $request)
    {
        $this->validate($request, [
            'civility' => 'nullable',
            'birthday' => 'nullable',
            'firstname' => 'nullable',
            'lastname' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'category' => 'required',
            'department' => 'required',
            'function' => 'required',
            'matricule' => 'required|unique:employeds',
            'profile_image' => 'image|nullable|max:2000',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($request->hasFile('profile_image')) {
           // get file name with extension
           $fileNameWithExtension = $request->file('profile_image')->getClientOriginalName();

           // get just file name
           $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

           // get just extension
           $extension = $request->file('profile_image')->getClientOriginalExtension();

           // unique name and store the image
           $fileNameStore = $fileName.'_'.time().'.'.$extension;

           // Upload image
           $path = $request->file('profile_image')->storeAs('public/employed_images', $fileNameStore);
        }
        else
        {
            // Upload default image
            $fileNameStore = 'profileImage.jpg';
        }

        $add = new employed();
        $add->civility = $request->civility;
        $add->birthday = $request->birthday;
        $add->firstname = $request->firstname;
        $add->lastname = $request->lastname;
        $add->phone = $request->phone;
        $add->address = $request->address;
        $add->category = $request->category;
        $add->department = $request->department;
        $add->function = $request->function;
        $add->matricule = $request->matricule;
        $add->profile_image = $fileNameStore;

        $add->email = $request->email;
        $add->password = bcrypt($request->password);

        $add->save();

        return back()->with('success', 'Employer ' . $add->firstmane . ' ' . $add->lastname . ' a été enregistrer.');
    }

}