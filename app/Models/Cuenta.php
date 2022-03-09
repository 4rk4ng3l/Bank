<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cuenta extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'cuentas';
    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $fillable = [
        'dni',
        'nombre',
        'balance',
    ];
}
