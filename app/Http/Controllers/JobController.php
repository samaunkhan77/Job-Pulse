<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function JobCreate(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'job_description' => 'required',
            'job_location' => 'required',
            'job_type' => 'required',
            'job_qualification' => 'required',
            'job_experience' => 'required',
            'job_deadline' => 'required',
            'job_benefits' => 'required',
            'job_salary' => 'required',
            'category_id' => 'required',
        ]);
        $company_id = Auth::id();
        $job_title = $request->input('job_title');
        $job_description = $request->input('job_description');
        $job_location = $request->input('job_location');
        $job_type = $request->input('job_type');
        $job_qualification = $request->input('job_qualification');
        $job_experience = $request->input('job_experience');
        $job_deadline = $request->input('job_deadline');
        $job_benefits = $request->input('job_benefits');
        $job_salary = $request->input('job_salary');
        $category_id = $request->input('category_id');


        Job::create([
            'job_title' => $job_title,
            'job_description' => $job_description,
            'job_location' => $job_location,
            'job_type' => $job_type,
            'job_qualification' => $job_qualification,
            'job_experience' => $job_experience,
            'job_deadline' => $job_deadline,
            'job_salary' => $job_salary,
            'job_benefits' => $job_benefits,
            'company_id' => $company_id,
            'category_id' => $category_id

        ]);

        return response()->json(['success' => 'Job Created Successfully.']);
    }

    public function jobUpdate(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'job_description' => 'required',
            'job_location' => 'required',
            'job_type' => 'required',
            'job_qualification' => 'required',
            'job_experience' => 'required',
            'job_deadline' => 'required',
            'job_benefits' => 'required',
            'job_salary' => 'required',
            'category_id' => 'required',
        ]);
        $company_id = Auth::id();
        $job_id = $request->input('id');
        $job_title = $request->input('job_title');
        $job_description = $request->input('job_description');
        $job_location = $request->input('job_location');
        $job_type = $request->input('job_type');
        $job_qualification = $request->input('job_qualification');
        $job_experience = $request->input('job_experience');
        $job_deadline = $request->input('job_deadline');
        $job_benefits = $request->input('job_benefits');
        $job_salary = $request->input('job_salary');
        $category_id = $request->input('category_id');

        Job::where('id', $job_id)->update([
            'job_title' => $job_title,
            'job_description' => $job_description,
            'job_location' => $job_location,
            'job_type' => $job_type,
            'job_qualification' => $job_qualification,
            'job_experience' => $job_experience,
            'job_deadline' => $job_deadline,
            'job_benefits' => $job_benefits,
            'job_salary' => $job_salary,
            'category_id' => $category_id,
            'id' => $company_id
        ]);

        return response()->json(['success' => 'Job Updated Successfully.']);

    }

    public function JobDelete(Request $request)
    {
        $job_id = $request->input('id');
        Job::where('id', $job_id)->delete();
        return response()->json(['success' => 'Job Deleted Successfully.']);
    }

    public function JobList()
    {
        $company_id = Auth::id();
        $jobs = Job::with('category','apply')->where('company_id', $company_id)->get();
        return response()->json($jobs);
    }

    public function JobListByID(Request $request)
    {
        $company_id = Auth::id();
        $job_id = $request->input('id');
        $jobs = Job::where('company_id', $company_id)->where('id', $job_id)->get();
        return response()->json($jobs);
    }



}
