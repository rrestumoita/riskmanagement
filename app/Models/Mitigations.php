<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitigations extends Model
{
    use HasFactory;

    protected $table = 'mitigations';

    // Kolom yang dapat diisi
    protected $fillable = [
        'action',
        'priority',
        'description',
        'risks_id',
    ];

    /**
     * Relasi ke model Risk.
     * Setiap mitigasi terkait dengan satu risiko.
     */
    public function risks()
    {
        return $this->belongsTo(Risk::class, 'risks_id');
    }

    public function statuses()
    {
        return $this->hasMany(Status::class, 'mitigations_id');
    }
}
