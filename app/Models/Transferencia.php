<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Transferencia extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'transacciones';
    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $fillable = [
        'idCuentaOrigen',
        'idCuentaDestino',
        'valor',
    ];

    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }

    public function transferirCuenta($idCuentaOrigen, $idCuentaDestino, $valor)
    {

        $cuentaOrigen = Cuenta::find($idCuentaOrigen);

        $cuentaDestino = Cuenta::find($idCuentaDestino);


        if ($cuentaOrigen->balance > $valor) {
            $cuentaOrigen->balance = $cuentaOrigen->balance - $valor;
            $cuentaDestino->balance = $cuentaDestino->balance + $valor;
            $cuentaOrigen->update();
            $cuentaDestino->update();

            $transferencia = new Transferencia();
            $transferencia->idCuentaOrigen = $idCuentaOrigen;
            $transferencia->idCuentaDestino = $idCuentaDestino;
            $transferencia->valor = $valor;
            $transferencia->save();

            return "Transferencia Realizada. Id de la transaccion:" . $transferencia->id;
        } else {
            return "No se puede realizar la transferencia, saldo insuficiente!.";
        }
        // return $cuentas;
    }

    public function getTransferenciasByUserAuth()
    {
        $transferencias = DB::table('transacciones')
            ->join('cuentas as C', 'transacciones.idCuentaOrigen', '=', 'C.id')
            ->join('cuentas as C1', 'transacciones.idCuentaDestino', '=', 'C1.id')
            ->join('users as U', 'U.dni', '=', 'C.dni')
            ->join('users as U1', 'U1.dni', '=', 'C1.dni')
            ->select('transacciones.id', 'U.name as usuarioOrigen', 'C.nombre as cuentaOrigen', 'U1.name as usuarioDestino', 'C1.nombre as cuentaDestino', 'valor')
            ->where('C.dni', '=', auth()->user()->dni)
            ->orWhere('C1.dni', '=', auth()->user()->dni)
            ->get();
        return $transferencias;
    }
}
