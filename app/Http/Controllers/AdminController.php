<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        $admin = Admin::where('email', $email)->first();

        if (!$email || !Hash::check($password, $admin->password)) {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }
        $token = $admin->createToken('admin_token')->plainTextToken;
        return Response()->json(['status' => 'success', 'message' => 'User Login Successfully', 'token' => $token]);
    }

    public function AdminRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
       Admin::create([
           'email' => $request->input('email'),
           'password' => Hash::make($request->input('password')),
       ]);
       return Response()->json(['status' => 'success', 'message' => 'User Register Successfully']);
    }


    public function CompanyList(Request $request)
    {
        $companies = Company::all();
        return Response()->json(['status' => 'success', 'companies' => $companies]);
    }

    public function CompanyUpdate(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_website' => 'required',
            'company_description' => 'required',
            'company_status' => 'required',
        ]);
        $id = $request->input('id');
        Company::where('id', $id)->update([
            'company_name' => $request->input('company_name'),
            'company_address' => $request->input('company_address'),
            'company_email' => $request->input('company_email'),
            'company_phone' => $request->input('company_phone'),
            'company_website' => $request->input('company_website'),
            'company_description' => $request->input('company_description'),
            'company_status' => $request->input('company_status'),
        ]);
        return Response()->json(['status' => 'success', 'message' => 'Company Updated Successfully']);
    }

    public function CompanyByID(Request $request)
    {
        $id = $request->input('id');
        $company = Company::where('id', $id)->first();
        return Response()->json(['status' => 'success', 'company' => $company]);
    }

    public function CompanyDelete(Request $request)
    {
        $id = $request->input('id');
        Company::where('id', $id)->delete();
        return Response()->json(['status' => 'success', 'message' => 'Company Deleted Successfully']);
    }

    public function CompanyCreate(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_website' => 'required',
            'company_description' => 'required',
            'company_status' => 'required',
        ]);
        Company::create([
            'company_name' => $request->input('company_name'),
            'company_address' => $request->input('company_address'),
            'company_email' => $request->input('company_email'),
            'company_phone' => $request->input('company_phone'),
            'company_website' => $request->input('company_website'),
            'company_description' => $request->input('company_description'),
            'company_status' => $request->input('company_status'),
        ]);
        return Response()->json(['status' => 'success', 'message' => 'Company Created Successfully']);
    }


    public function adminJobList(Request $request)
    {
        $jobs = Job::with('company')->get();
        return Response()->json(['status' => 'success', 'jobs' => $jobs]);
    }
}
