<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;


class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'gender',
        'birthdate',
        'phone_number',
        'address',
        'user_id',
        'company_id'
    ];

    public function user(): belongsTo {
        return $this->belongsTo(User::class);
    }

    public function company(): belongsTo {
        return $this->belongsTo(Company::class);
    }
}
