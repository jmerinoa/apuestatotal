<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PlayerFormRequest;
use App\Models\player;
use Illuminate\Http\Request;
use Exception;

class playerController extends Controller
{
    public function index(Request $request)
    {
        $searchText = trim($request->get('searchText'));
        if ($request) {
            $player = DB::table('player')
                ->where('nomPlayer', 'LIKE', '%' . $searchText . '%')
                ->paginate(15);
            return view('mantenimiento.player.index', compact('searchText', 'player'));
        }
    }
    public function create()
    {
        return view('mantenimiento.player.create');
    }
    public function store(PlayerFormRequest $request)

    {
        try {
            $player = new player;
            $player->nomPlayer =  strtoupper($request->get('nomPlayer'));
            $player->email = $request->get('email');
            $player->password = bcrypt($request->get('password'));
            $player->save();
            return Redirect::to('mantenimiento/player')->with(['success' => $player->nomPlayer . ' agregado']);
        } catch (Exception $e) {
            return Redirect::to('almacen/producto')->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        return view("mantenimiento.player.edit", ["player" => player::findOrFail($id)]);
    }
    public function update(PlayerFormRequest $request, $id)
    {
        $player = player::findOrFail($id);
        $player->nomPlayer =  strtoupper($request->get('nomPlayer'));
        $player->email = $request->get('email');
        $player->update();
        return Redirect::to('mantenimiento/player');
    }
    public function show($id)
    {
        $recargas = DB::table('registers as v')
            ->join('player as c', 'v.playerId', 'c.playerId')
            ->select('v.registerId', 'c.playerId', 'v.monto','v.medio', 'c.nomPlayer', 'v.banco', 'v.horaFechaRegister_at', 'v.horaFechaRegisterdate_up')
            ->where('v.playerId', $id)
            ->get();
       
        return view("mantenimiento.player.show", ["recargas" => $recargas]);
    }
    public function destroy(Request $request, $id)
    {


        try {
            if ($request->ajax()) {

                $docu   = player::findOrFail($id);

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
