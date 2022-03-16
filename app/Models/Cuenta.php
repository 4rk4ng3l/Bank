<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'dni', 'dni');
    }

    public function transacciones()
    {
        return $this->belongsTo(Transferencia::class);
    }

    public function getCuentasExcept($id)
    {
        $cuentas = DB::table('cuentas')
            ->select('id', 'nombre')
            ->where('dni', '=', auth()->user()->dni)
            ->where('id', '!=', $id)
            ->get();

        return $cuentas;
    }

    public function getCuentasAll()
    {
        $cuentas = DB::table('cuentas')
            ->select('id', 'nombre', 'balance')
            ->where('dni', '=', auth()->user()->dni)
            ->get();
        return $cuentas;
    }

    public function getCuentasTerceros()
    {
        $myDni = auth()->user()->dni;
        $cuentas = DB::table('cuentas')
            ->join('users', 'users.dni', '=', 'cuentas.dni')
            ->select('cuentas.id', 'cuentas.nombre', 'users.name')
            ->where('cuentas.dni', '!=', $myDni)
            ->get();

        return $cuentas;
    }
}
