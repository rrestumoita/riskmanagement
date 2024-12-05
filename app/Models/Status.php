<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model
    protected $table = 'statuses';

    // Kolom yang dapat diisi
    protected $fillable = [
        'status',
        'mitigations_id'
    ];

    public function mitigation()
    {
        return $this->belongsTo(Mitigations::class, 'mitigations_id');
    }
}
