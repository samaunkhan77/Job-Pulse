<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function CreateUserProfile(Request $request)
    {
        $user_id = Auth::id();
        $user_name = $request->input('user_name');
        $user_phone = $request->input('user_phone');
        $user_email = $request->input('user_email');
        $user_address = $request->input('user_address');
        $user_father_name = $request->input('user_father_name');
        $user_mother_name = $request->input('user_mother_name');
        $user_gender = $request->input('user_gender');
        $user_dob = $request->input('user_dob');
        $user_nid = $request->input('user_nid');
        $user_passport = $request->input('user_passport');
        $user_nationality = $request->input('user_nationality');
        $user_facebook = $request->input('user_facebook');
        $user_github = $request->input('user_github');
        $user_linkedin = $request->input('user_linkedin');
        $user_website = $request->input('user_website');
        $user_university = $request->input('user_university');
        $user_degree = $request->input('user_degree');
        $user_passing_year = $request->input('user_passing_year');
        $user_college = $request->input('user_college');
        $user_subject = $request->input('user_subject');
        $user_passing_year2 = $request->input('user_passing_year2');
        $user_training = $request->input('user_training');
        $user_passing_year3 = $request->input('user_passing_year3');
        $user_job_experience = $request->input('user_job_experience');
        $user_skill = $request->input('user_skill');
        $user_bio = $request->input('user_bio');
        $user_current_salary = $request->input('user_current_salary');
        $user_expected_salary = $request->input('user_expected_salary');

        $user_image = $request->file('user_image');
        $t = time();
        $file_name =$user_image->getClientOriginalName();
        $image_name =("{$user_id}-$t-{$file_name}");
        $image_url="uploads/{$image_name}";

        $user_image->move(public_path('uploads'), $image_name);

        Profile::create([
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_phone' => $user_phone,
            'user_email' => $user_email,
            'user_address' => $user_address,
            'user_father_name' => $user_father_name,
            'user_mother_name' => $user_mother_name,
            'user_gender' => $user_gender,
            'user_dob' => $user_dob,
            'user_nid' => $user_nid,
            'user_passport' => $user_passport,
            'user_nationality' => $user_nationality,
            'user_facebook' => $user_facebook,
            'user_github' => $user_github,
            'user_linkedin' => $user_linkedin,
            'user_website' => $user_website,
            'user_university' => $user_university,
            'user_degree' => $user_degree,
            'user_passing_year' => $user_passing_year,
            'user_college' => $user_college,
            'user_subject' => $user_subject,
            'user_passing_year2' => $user_passing_year2,
            'user_training' => $user_training,
            'user_passing_year3' => $user_passing_year3,
            'user_job_experience' => $user_job_experience,
            'user_skill' => $user_skill,
            'user_bio' => $user_bio,
            'user_current_salary' =>  $user_current_salary,
            'user_expected_salary' => $user_expected_salary,
            'user_image' => $image_url
        ]);

        return Response()->json(['status' => 'success', 'message' => 'User Profile Created Successfully']);
    }

    public function UserProfileUpdate(Request $request)
    {
        $user_id = Auth::id();
        $user_name = $request->input('user_name');
        $user_phone = $request->input('user_phone');
        $user_email = $request->input('user_email');
        $user_address = $request->input('user_address');
        $user_father_name = $request->input('user_father_name');
        $user_mother_name = $request->input('user_mother_name');
        $user_gender = $request->input('user_gender');
        $user_dob = $request->input('user_dob');
        $user_nid = $request->input('user_nid');
        $user_passport = $request->input('user_passport');
        $user_nationality = $request->input('user_nationality');
        $user_facebook = $request->input('user_facebook');
        $user_github = $request->input('user_github');
        $user_linkedin = $request->input('user_linkedin');
        $user_website = $request->input('user_website');
        $user_university = $request->input('user_university');
        $user_degree = $request->input('user_degree');
        $user_passing_year = $request->input('user_passing_year');
        $user_college = $request->input('user_college');
        $user_subject = $request->input('user_subject');
        $user_passing_year2 = $request->input('user_passing_year2');
        $user_training = $request->input('user_training');
        $user_passing_year3 = $request->input('user_passing_year3');
        $user_job_experience = $request->input('user_job_experience');
        $user_skill = $request->input('user_skill');
        $user_bio = $request->input('user_bio');
        $user_current_salary = $request->input('user_current_salary');
        $user_expected_salary = $request->input('user_expected_salary');

        if ($user_image = $request->file('user_image')) {
            $t = time();
            $file_name =$user_image->getClientOriginalName();
            $image_name =("{$user_id}-$t-{$file_name}");
            $image_url="uploads/{$image_name}";
            $user_image->move(public_path('uploads'), $image_name);
            $filePath =$request->input('filePath');
            File::delete($filePath);

            return Profile::where('user_id', $user_id)->update([
                'user_name' => $user_name,
                'user_phone' => $user_phone,
                'user_email' => $user_email,
                'user_address' => $user_address,
                'user_father_name' => $user_father_name,
                'user_mother_name' => $user_mother_name,
                'user_gender' => $user_gender,
                'user_dob' => $user_dob,
                'user_nid' => $user_nid,
                'user_passport' => $user_passport,
                'user_nationality' => $user_nationality,
                'user_facebook' => $user_facebook,
                'user_github' => $user_github,
                'user_linkedin' => $user_linkedin,
                'user_website' => $user_website,
                'user_university' => $user_university,
                'user_degree' => $user_degree,
                'user_passing_year' => $user_passing_year,
                'user_college' => $user_college,
                'user_subject' => $user_subject,
                'user_passing_year2' => $user_passing_year2,
                'user_training' => $user_training,
                'user_passing_year3' => $user_passing_year3,
                'user_job_experience' => $user_job_experience,
                'user_skill' => $user_skill,
                'user_bio' => $user_bio,
                'user_current_salary' => $user_current_salary,
                'user_expected_salary' => $user_expected_salary,
                'user_image' => $image_url

            ]);
        }
        else {
            return Profile::where('user_id', $user_id)->update([
                'user_name' => $user_name,
                'user_phone' => $user_phone,
                'user_email' => $user_email,
                'user_address' => $user_address,
                'user_father_name' => $user_father_name,
                'user_mother_name' => $user_mother_name,
                'user_gender' => $user_gender,
                'user_dob' => $user_dob,
                'user_nid' => $user_nid,
                'user_passport' => $user_passport,
                'user_nationality' => $user_nationality,
                'user_facebook' => $user_facebook,
                'user_github' => $user_github,
                'user_linkedin' => $user_linkedin,
                'user_website' => $user_website,
                'user_university' => $user_university,
                'user_degree' => $user_degree,
                'user_passing_year' => $user_passing_year,
                'user_college' => $user_college,
                'user_subject' => $user_subject,
                'user_passing_year2' => $user_passing_year2,
                'user_training' => $user_training,
                'user_passing_year3' => $user_passing_year3,
                'user_job_experience' => $user_job_experience,
                'user_skill' => $user_skill,
                'user_bio' => $user_bio,
                'user_current_salary' => $user_current_salary,
                'user_expected_salary' => $user_expected_salary,


            ]);
        }
    }

    public function UserProfile()
    {
        $user_id = Auth::id();
        return Profile::where('user_id', $user_id)->first();
    }

    public function UserProfileDelete(Request $request)
    {
        $user_id = Auth::id();
        $filePath = $request->input('filePath');
        File::delete($filePath);
        return Profile::where('user_id', $user_id)->delete();
    }

}
