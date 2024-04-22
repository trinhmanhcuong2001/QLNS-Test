<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'description', 'company_id'
    ];

    public function people(): belongsToMany
    {
        return $this->belongsToMany(Person::class, 'person_project', 'project_id', 'person_id')->withTimestamps();
    }

    public function company() : belongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
