<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    // Show post form view
    public function createPost()
    {
        return view('admin.addpost');
    }

    // save post in database
    public function savePost(Request $request)
    {
        $this->validate($request, ['post_name' => 'required|unique:posts']);
        
        $add = new post();
        $add->post_name = $request->post_name;
        $add->save();

        return back()->with('success', 'Le poste ' . $add->post_name . ' a été enregistrer.');
    }

    // List post in database
    public function showPost()
    {
        $posts = post::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.showpost')->with('posts', $posts);
    }

    // Show post edit form view
    public function editPost($id)
    {
        $post = post::find($id);
        return view('admin.editpost')->with('post', $post);
    }

    // Update post in database
    public function editSave(Request $request)
    {
        $this->validate($request, ['post_name' => 'required|unique:posts']);
        
        $edit = post::find($request->id);
        $edit->post_name = $request->post_name;
        $edit->update();

        return redirect('administration/function/list')->with('success', 'Modification du poste enregistrer.');
    }

    // Delete post in database
    public function deletePost($id)
    {
        $delete = post::find($id);
        $delete->post_name;
        $delete->delete();

        return redirect('administration/function/list')->with('success', 'Le poste de ' . $delete->post_name . ' a été supprimer.');
    }

}
