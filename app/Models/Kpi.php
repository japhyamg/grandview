<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'target', 'weight'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function performanceReports()
    {
        return $this->hasMany(PerformanceReport::class);
    }
}
