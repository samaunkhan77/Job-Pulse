<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    public function JobApply(Request $request)
    {
        $user_id =Auth::id();
        $job_id = $request->input('job_id');
        $company_id = $request->input('company_id');

        Apply::create([
            'profile_id' => $user_id,
            'job_id' => $job_id,
            'company_id' => $company_id
        ]);
        return response()->json(['message' => 'Job Apply Successfully'], 200);
    }

    public function jobApplyList(Request $request)
    {
        $company_id = Auth::id();

        $jobApply = Apply::with('profile', 'job', 'company')->where('company_id', $company_id)->get();

        return response()->json($jobApply, 200);
    }
}
