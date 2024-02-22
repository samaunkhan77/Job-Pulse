<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;


class Company extends Model implements AuthenticatableContract
{
    use HasApiTokens, HasFactory, Notifiable , Authenticatable;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_password',
        'company_address',
        'company_phone',
        'company_website',
        'company_logo',
        'company_description',
        'company_status',
        'company_otp',
    ];

    protected $attributes = [
        'company_otp' => 0,
        'company_status' => 'inactive',
    ];

    public function job():BelongsTo
    {
        return $this->belongsTo(Job::class, 'id');
    }
}
