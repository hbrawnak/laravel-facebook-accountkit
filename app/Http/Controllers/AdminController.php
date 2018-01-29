<?php

namespace App\Http\Controllers;

use App\Admin;
use App\File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['index', 'login']);
    }
    
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request['email'];
        $password = $request['password'];

        $admin = Admin::where('email', $email)->first();
        if(!$admin) return redirect()->back()->with(['error' => 'Unknown admin']);

        if(Auth::guard('admin')->attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return redirect()->back()->with(['error' => 'Email or Password does not match!']);
        }
    }

    public function dashboard()
    {
        $users = User::count();
        $files = File::count();
        $report = File::where('type', 'Report')->count();
        $prescription = File::where('type', 'Prescription')->count();
        $invoice = File::where('type', 'Invoice')->count();
        return view('admin.index', compact('users', 'files', 'report', 'prescription', 'invoice'));
    }

    public function users()
    {
        $users = DB::table('users')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.users', compact('users'));
    }

    public function getFiles($id)
    {
        $files = File::where('user_id', $id)->get();
        return view('admin.files', compact('files'));
    }


    public function files()
    {
        $files = File::orderBy('created_at', 'desc')->get();
        return view('admin.files', compact('files'));
    }


    public function logout()
    {
        auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
