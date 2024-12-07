<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class UserController extends Controller
{
    public function login(){
        return view('user-login');
    }

    public function register(){
        return view('user-register');
    }
    public function registerPost(Request $request){
        
        $validatedData =  $request->validate([
           "name"=>'required',
           "email"=>'email|required',
           "password"=>'required'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), 
        ]);
      
      return redirect('login')->with('success', 'Registration successful. Please login.');

    }

    public function loginPost(Request $request)
    {
       
        $request->validate([
            "email" => 'email|required',
            "password" => 'required'
        ]);
    
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
    
        if (Auth::guard('users')->attempt($credentials)) {
          
            // Debugging or your actual logic
            $user = Auth::guard('users')->user();
           
            return redirect('Home-page')->with('success', 'Login successful.');

        } else {
           
            return redirect()->back()->with('error', 'Invalid credentials');
        }   
    }
    
    public function homepage(){

        $Allpost=Post::get();

        return view('user-panel',['Allpost'=>$Allpost]);
    }

    public function createPost(){
        return view('create-post');
    }


    public function addCreatePost(Request $request)
    {
    
        $validatedData = $request->validate([
            'title' => 'required|max:255',     
            'description' => 'nullable|string|max:1000',
        ]);

    
        $user = Auth::guard('users')->user();

        Post::create([
            'title' => $validatedData['title'],
            'user_id' => $user->id,
            'description' => $validatedData['description'],  
        ]);
        return redirect()->back()->with('success', 'Post created successfully.');
    }

    public function myPost()
    {
        $user = Auth::guard('users')->user();
        
        $Allpost=Post::where('user_id', $user->id)->get();
      
        return view('my-post',['Allpost'=>$Allpost]);
    }
    public function deletePost(Request $request ,$p_id)
    {  
        $post = Post::where('id',$p_id)->first();
       
        if ($post->delete())
        {
            return redirect()->back()->with('success', ' Post deleted successfully.');
        }
        else
        {
            return redirect()->back()->with([
                'error' => 'Please Re-Enter  Post Data !', 
            ]);
        } 
    }
    public function editPost($pid){

        $Allpost=Post::where('id',$pid)->first();
      
        return view('edit-post',['Allpost'=>$Allpost]);
    }
    public function saveEditPost( Request $request,$pid)
    {  
        $post=Post::where('id',$pid)->first();
        $post->title= $request->title;
        $post->description=$request->description;
        $post->save();
        return redirect()->back()->with('success', 'Post Updated successfully.');
    }

    public function logout(Request $request)
    {
        Auth::guard('users')->logout();
        $request->session()->flush(); // Flushes the session of the admin guard
        $request->session()->regenerateToken();
        return redirect('user-login')->with('success', 'LogOut successful.');
    }

    
}
