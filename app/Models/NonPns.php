<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonPns extends Model
{
    use HasFactory;
    protected $table = 'pegawai_nonpns';
    protected $guarded = ['id'];

    public function unit_kerja()
    {
        return $this->belongsTo(Unitkerja::class, 'unitkerja_id');
    }
}
