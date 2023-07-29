<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show register/create form
    public function create(){
        return view('users.register');
    }
    
    public function edit(){
        return view('users.change-password');
    }
    
    
    public function update(Request $request, User $user){
        // Make sure logged in user is the owner of the account
        if($user->id != auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        $hashedPassword = $user->password;
        
        $formFields = $request->validate([
            'current_password' => 'required',
            'password'         => 'required|confirmed|min:6'
        ]);
        
        // Verify the current password against the hashed password stored in the database
        $check = Hash::check($formFields['current_password'], $user->password);
        
        if (!$check) {
            // Password is incorrect, handle the error or redirect back with a message
            return back()->withErrors(['current_password' => 'Current Password is Incorrect'])->onlyInput('current_password');
        }else{
            // Hash password
            // Alternative way: $formFields['password'] = bcrypt($formFields['password']);
            $user->password = Hash::make($formFields['password']);
            $user->save();
            
            return back()->with('message', 'Password updated successfully!');
        }
    }
    
    // Show login form
    public function login(){
        return view('users.login');
    }
    
    public function logout(Request $request){
        // other way: auth()->logout();
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('message', 'You have Successfully logout!');
    }
    
    // Store registered user
    public function store(Request $request){
        $formFields = $request->validate([
            'name'                  => ['required', 'min:6'],
            'email'                 => ['required', 'email', Rule::unique('users', 'email')],
            'password'              => 'required|confirmed|min:6',
        ]);
        
        // Hash password
        // Alternative way: $formFields['password'] = bcrypt($request->input('password'));
        $formFields['password'] = Hash::make($formFields['password']);
        // Create
        $user = User::create($formFields);
        // Login
        // other way: auth()->login($user);
        Auth::login($user);
        
        return redirect('/')->with('message', 'User created and logged in');
    }
    
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        
        if(auth()->attempt($formFields)){ 
            $request->session()->regenerate();
            
            return redirect('/')->with('message', 'You are now logged in!');
        }
        
        return back()->withErrors(['invalid' => 'Invalid Email or Password'])->onlyInput('invalid');
    }
    
}
