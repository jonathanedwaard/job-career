<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    public function job_requests() {
        return $this->belongsTo(JobRequest::class, 'jobrequest', 'id');
    }
}
