<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    use HasFactory;

    public function job_titles() {
        return $this->belongsTo(JobTitle::class, 'jobtitle', 'id');
    }

    public function job_types() {
        return $this->belongsTo(JobType::class, 'jobtype', 'id');
    }

    public function educations() {
        return $this->belongsTo(Education::class, 'education', 'id');
    }

    public function locations() {
        return $this->belongsTo(Location::class, 'location', 'id');
    }

    public function work_experiences() {
        return $this->belongsTo(WorkExperience::class, 'workexperience', 'id');
    }
}
