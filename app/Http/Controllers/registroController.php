<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\registroFormRequest;
use App\Models\administrador;
use App\Models\registro;
use Illuminate\Http\Request;
use Exception;

class registroController extends Controller
{
    public function index(Request $request)
    {
        $regis = DB::table('promoter')->get();
        $regiss = DB::table('player')->get();
        $searchText = trim($request->get('searchText'));
        if ($request) {
            $regi = DB::table('registers as d')
                ->join('promoter as p', 'd.promoterId', 'p.promoterId')
                ->join('player as pa', 'd.playerId', 'pa.playerId')
                ->select('p.promoterId','pa.playerId','d.registerId','pa.nomPlayer','p.nomPromoter','medio','monto','banco','voucher')
                ->where('p.promoterId', 'LIKE', '%' . $searchText . '%')
                ->paginate(15);
            return view('mantenimiento.registro.index', compact('searchText', 'regi','regis','regiss'));
        }
    }
  
    public function store(registroFormRequest $request)

    {
        try {
            $mytime = Carbon::now('America/Lima');
            $fecha_hora = $mytime->toDateTimeString();
            $regi = new registro();
            $regi->horaFechaRegister_at = $fecha_hora;
            $regi->banco =  strtoupper($request->get('banco'));
            $regi->medio = $request->get('medio');
            $regi->monto = $request->get('monto');
            $regi->promoterId  = $request->get('promoterId');
            $regi->playerId   = $request->get('playerId');
            if ($request->hasFile('voucher')) {
                $file = $request->file('voucher');
                $file->move(public_path() . '/voucher', $file->getClientOriginalName());
                $regi->voucher = $file->getClientOriginalName();
            }
            $regi->save();
            return Redirect::to('mantenimiento/registro')->with(['success' => $regi->banco . ' agregado']);
        } catch (Exception $e) {
            return Redirect::to('mantenimiento/registro')->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $regis = DB::table('promoter')->get();
        $regiss = DB::table('player')->get();
        return view("mantenimiento.registro.edit", ["regi"=>registro::findOrFail($id),"regiss"=>$regiss,"regis"=>$regis]);
    }
    public function update(registroFormRequest $request, $id)
    {
        $mytime = Carbon::now('America/Lima');
        $fecha_hora = $mytime->toDateTimeString();
        $regi = registro::findOrFail($id);
        $regi->horaFechaRegisterdate_up = $fecha_hora;
        $regi->banco =  strtoupper($request->get('banco'));
        $regi->medio = $request->get('medio');
        $regi->monto = $request->get('monto');
        $regi->promoterId  = $request->get('promoterId');
        $regi->playerId   = $request->get('playerId');
        if($request->hasFile('voucher')){
            $file = $request->file('voucher');
            $file->move(public_path() . '/voucher', $file->getClientOriginalName());
            $regi->voucher = $file->getClientOriginalName();
        }
        $regi->update();
        return Redirect::to('mantenimiento/registro');
    }
    
    public function destroy(Request $request, $id)
    {


        try {
            if ($request->ajax()) {

                $docu   = registro::findOrFail($id);

                if ($docu->delete()) {
                    return response()->json([
                        'success' => true,
                        'message' => '¡Satisfactorio!, Registro eliminado con éxito.',
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => '¡Error!, No se pudo eliminar.',
                    ]);
                }
            }
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => '¡Error!, Este registro tiene enlazado uno o mas registros.',
                ]);
            }
        }
    }
}
