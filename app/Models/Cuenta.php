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

    public function getCuentasExcept($id){
        $cuentas = DB::table('cuentas')
        ->select('id', 'nombre')
        ->where('dni', '=', auth()->user()->dni)
        ->where('id', '!=', $id)
        ->get();

        return $cuentas;
    }

    public function getCuentasAll(){
        $cuentas = DB::table('cuentas')
        ->select('id', 'nombre', 'balance')
        ->where('dni', '=', auth()->user()->dni)
        ->get();
        return $cuentas;
    }
}
