<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apply extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'profile_id', 'company_id', 'status'];

    protected $attributes = [
        'status' => 'Accepted'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function job():BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}

