<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'severity',
        'occurrence',
        'detection',
        'rpn', // Store RPN directly
    ];

    // Method to calculate RPN
    public function calculateRpn()
    {
        // Asumsikan RPN dihitung dengan mengalikan severity, occurrence, dan detection
        return $this->severity * $this->occurrence * $this->detection;
    }
    
}