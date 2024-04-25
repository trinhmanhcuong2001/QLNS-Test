<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Task extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'priority',
        'status',
        'project_id',
        'person_id',
        'start_time',
        'end_time'
    ];

    public function project(): belongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function person(): belongsTo
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
