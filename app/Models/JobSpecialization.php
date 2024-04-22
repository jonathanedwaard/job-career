<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSpecialization extends Model
{
    use HasFactory;

    public function job_titles() {
        return $this->hasOne(JobSpecialization::class, 'jobspecialization', 'id');
    }
}
