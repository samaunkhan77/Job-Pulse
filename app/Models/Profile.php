<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'user_address',
        'user_image',
        'user_father_name',
        'user_mother_name',
        'user_gender',
        'user_dob',
        'user_nid',
        'user_passport',
        'user_nationality',
        'user_facebook',
        'user_github',
        'user_linkedin',
        'user_website',
        'user_university',
        'user_degree',
        'user_passing_year',
        'user_college',
        'user_subject',
        'user_passing_year2',
        'user_training',
        'user_passing_year3',
        'user_job_experience',
        'user_skill',
        'user_bio',
        'user_current_salary',
        'user_expected_salary',

    ];


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function profile():BelongsTo
    {
        return $this->belongsTo(Apply::class);
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }


}
