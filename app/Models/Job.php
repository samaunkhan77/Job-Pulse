<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'company_id',
        'job_title',
        'job_description',
        'job_location',
        'job_type',
        'job_qualification',
        'job_experience',
        'job_status',
        'job_deadline',
        'job_salary',
        'job_benefits',
    ];
    protected $attributes = [
        'job_status' => 'unpublished',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function apply():BelongsTo
    {
        return $this->belongsTo(Apply::class, 'id');
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
