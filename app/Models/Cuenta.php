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

    public function user(){
        return $this->belongsTo(User::class, 'dni', 'dni');
    }

    public function transacciones(){
        return $this->hasMany(Transaccion::class);
    }

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

    public function getCuentasTerceros(){
        $myIdUser = auth()->user()->dni;
        // $cuentas = DB::raw('
        //     select c.id, concat(c.nombre, " | ", u.name)
        //     from cuentas c
        //     inner join users u on c.dni = u.dni
        //     where c.dni !=' . $myIdUser);
        $cuentas = DB::table('cuentas')
        ->select('id', 'nombre')
        ->where('dni', '!=', auth()->user()->dni)
        ->get();
        return $cuentas;
    }
}
