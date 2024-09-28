<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'tb_dokter';

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone',
        'gender'
    ];
}
