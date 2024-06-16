<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function job_requests() {
        return $this->belongsTo(JobRequest::class, 'jobrequest', 'id');
    }

    public function educations() {
        return $this->belongsTo(Education::class, 'education', 'id');
    }

    public function work_experiences() {
        return $this->belongsTo(WorkExperience::class, 'workexperience', 'id');
    }
}
