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

    public function cuenta(){
        return $this->belongsTo('App\Cuenta');
    }

    public function transferirCuenta($idCuentaOrigen, $idCuentaDestino, $valor){

        $cuentaOrigen = Cuenta::find($idCuentaOrigen);

        $cuentaDestino = Cuenta::find($idCuentaDestino);


        if($cuentaOrigen->balance > $valor){
            $cuentaOrigen->balance = $cuentaOrigen->balance - $valor;
            $cuentaDestino->balance = $cuentaDestino->balance + $valor;
            $cuentaOrigen->update();
            $cuentaDestino->update();

            $transferencia = new Transferencia();
            $transferencia->idCuentaOrigen = $idCuentaOrigen;
            $transferencia->idCuentaDestino = $idCuentaDestino;
            $transferencia->valor = $valor;
            $transferencia->save();

            Return "Transferencia Realizada. Id de la transaccion:" . $transferencia->id;


        }else{
            return "No se puede realizar la transferencia, saldo insuficiente!.";
        }
        // return $cuentas;
    }

}
