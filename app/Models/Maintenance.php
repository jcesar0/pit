<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'user_maintenances';
    public $timestamps = true;

    protected $fillable = [
        'name', 'days_remaining'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }


}
