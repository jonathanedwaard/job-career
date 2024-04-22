<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    public function job_specializations() {
        return $this->belongsTo(JobSpecialization::class, 'jobspecialization', 'id');
    }

    public function job_requests() {
        return $this->belongsTo(JobRequest::class, 'jobrequest', 'id');
    }
}
