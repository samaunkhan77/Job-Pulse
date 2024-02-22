<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    public function CompanyRegister(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_website' => 'required',
            'company_logo' => 'required',
            'company_description' => 'required',
            'company_password' => 'required',
        ]);
        $img = $request->file('company_logo');
        $t = time();
        $file_name =$img->getClientOriginalName();
        $img_name =("-$t-{$file_name}");
        $img_url="uploads/{$img_name}";

        $img->move(public_path('uploads'), $img_name);
        Company::create([
            'company_name' => $request->input('company_name'),
            'company_address' => $request->input('company_address'),
            'company_email' => $request->input('company_email'),
            'company_phone' => $request->input('company_phone'),
            'company_website' => $request->input('company_website'),
            'company_logo' => $img_url,
            'company_description' => $request->input('company_description'),
            'company_password' => Hash::make($request->input('company_password')),
        ]);
        return Response()->json(['status' => 'success', 'message' => 'User Register Successfully']);
    }

    public function CompanyLogin(Request $request)
    {
        $request->validate([
            'company_email' => 'required',
            'company_password' => 'required',
        ]);

        $company = Company::where('company_email', $request->input('company_email'))->where('company_status', 'active')->first();

        if(!$company || !Hash::check($request->input('company_password'), $company->company_password)){
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }
       $token = $company->createToken('authToken')->plainTextToken;
        return Response()->json(['status' => 'success', 'message' => 'User Login Successfully','token' => $token]);
    }


    public function CompanyLogout(Request $request)
    {
        $request->user()->token()->delete();
        return redirect('/company-login');
    }

    public function CompanyOtp(Request $request)
    {
        $request->validate([
            'company_email' => 'required',
        ]);
       $email = $request->input('company_email');
       $otp = rand(100000,999999);
       $count = Company::where('company_email', $email)->count();

       if($count == 1){
           Mail::to($email)->send(new OTPMail($otp));
          Company::where('company_email', $email)->update(['company_otp' => $otp]);
          return Response()->json(['status' => 'success', 'message' => 'OTP Sent Successfully']);
       }
       else{
           return Response()->json(['status' => 'error', 'message' => 'Email Not Found']);
       }

    }

    public function CompanyVerifyOtp(Request $request)
    {
        $request->validate([
            'company_email' => 'required',
            'company_otp' => 'required',
        ]);
        $email = $request->input('company_email');
        $otp = $request->input('company_otp');

        $company = Company::where('company_email', $email)->where('company_otp', $otp)->first();
        if (!$company) {
            return Response()->json(['status' => 'error', 'message' => 'Invalid OTP']);
        }
        Company::where('company_email', $email)->update(['company_otp' => 0]);
        $token = $company->createToken('authToken')->plainTextToken;
        return Response()->json(['status' => 'success', 'message' => 'User Login Successfully','token' => $token]);

    }

    public function CompanyPasswordReset(Request $request)
    {
        $request->validate([
            'company_email' => 'required',
        ]);
        $id = Auth::id();
        $password = $request->input('company_password');
        Company::where('id', $id)->update(['company_password' => Hash::make($password)]);
        return Response()->json(['status' => 'success', 'message' => 'Password Reset Successfully']);
    }

    public function CompanyProfile()
    {
        $id = Auth::id();

        $company = Company::where('id', $id)->first();
        return Response()->json(['status' => 'success', 'data' => $company]);
    }

    public function CompanyProfileUpdate(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_website' => 'required',
            'company_description' => 'required',
        ]);
        $id = Auth::id();
        Company::where('id', $id)->update([
            'company_name' => $request->input('company_name'),
            'company_address' => $request->input('company_address'),
            'company_email' => $request->input('company_email'),
            'company_phone' => $request->input('company_phone'),
            'company_website' => $request->input('company_website'),
            'company_description' => $request->input('company_description'),
        ]);
        return Response()->json(['status' => 'success', 'message' => 'Company Profile Update Successfully']);
    }
}
