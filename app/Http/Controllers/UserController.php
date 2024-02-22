<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
   public function UserRegister(Request $request)
   {
       $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'required',
       ]);

       $userName = $request->input('name');
       $userEmail = $request->input('email');
       $userPassword = $request->input('password');

       User::create([
           'name' => $userName,
           'email' => $userEmail,
           'password' => Hash::make($userPassword)
       ]);

       return response()->json(["message" => "User Registered Successfully"]);
   }

   public function UserLogin(Request $request)
   {
       $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);
       $email = $request->input('email');
       $password = $request->input('password');

       $user = User::where('email', $email)->first();

       if(!$user || !Hash::check($password, $user->password)) {
           return response()->json(["message" => "Invalid email or password"]);
       }
       $token = $user->createToken('authToken')->plainTextToken;

       return response()->json(["token" => $token]);
   }

   public function UserLogout(Request $request)
   {
       $request->user()->currentAccessToken()->delete();
       return response()->json(["message" => "User Logged Out Successfully"]);

   }

   public function sentOtp(Request $request)
   {
       $request->validate([
           'email' => 'required|email',
       ]);

       $email = $request->input('email');
       $otp = rand(100000,999999);
       $count = User::where('email', $email)->count();

       if($count == 1){
           Mail::to($email)->send(new OTPMail($otp));
           User::where('email', $email)->update(['otp' => $otp]);
           return Response()->json(['status' => 'success', 'message' => 'OTP Sent Successfully']);
       }
       else{
           return Response()->json(['status' => 'error', 'message' => 'Email Not Found']);
       }

   }

   public function verifyOtp(Request $request)
   {
       $request->validate([
           'email' => 'required',
           'otp' => 'required',
       ]);
       $email = $request->input('email');
       $otp = $request->input('otp');

       $user = User::where('email', $email)->where('otp', $otp)->first();

       if(!$user) {
           return Response()->json(['status' => 'error', 'message' => 'Invalid OTP']);
       }
       User::where('email', $email)->update(['otp' => 0]);
       $token = $user->createToken('authToken')->plainTextToken;
       return Response()->json(['status' => 'success', 'message' => 'User Login Successfully','token' => $token]);
   }

   public function UserPasswordReset(Request $request)
   {
       $id = Auth::id();
       $password = $request->input('password');
       User::where('id', $id)->update(['password' => Hash::make($password)]);
       return Response()->json(['status' => 'success', 'message' => 'Password Reset Successfully']);
   }


   public function UserCompanyList(Request $request)
   {
       $company = Company::all();
       return response()->json($company);
   }


   public function UserJobList()
   {
       $job = Job::with('company')->get();
       return response()->json($job);
   }

   public function UserCategoryList()
   {
       $job = Category::all();
       return response()->json($job);
   }

   public function UserSingleJob(Request $request)
   {
       $id = $request->id;

       $job = Job::with('company')->where('id', $id)->first();
       return view('user.pages.single-job-page', ['job' => $job, 'id' => $id]);
       //return response()->json($job);
   }
}
