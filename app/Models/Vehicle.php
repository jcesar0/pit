<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    public $timestamps = true;
    protected $appends = ['week_maintenances'];

    protected $fillable = [
        'name', 'brand', 'version',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }

    public function getWeekMaintenancesAttribute()
    {
        return $this->maintenances()
            ->where('days_remaining', '<=', '7')
            ->orderBy('days_remaining', 'asc')
            ->get(['id', 'name', 'days_remaining']);
    }

}
