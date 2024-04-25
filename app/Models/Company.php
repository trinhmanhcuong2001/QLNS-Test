<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'address'
    ];

    public function departments(): hasMany
    {
        return $this->hasMany(Department::class);
    }

    public function people(): hasMany
    {
        return $this->hasMany(Person::class);
    }

    public function projects(): hasMany
    {
        return $this->hasMany(Project::class);
    }
}
