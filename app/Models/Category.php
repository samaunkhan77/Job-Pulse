<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    public function jobs():HasMany
    {
        return $this->hasMany(Job::class, 'category_id');
    }
}
