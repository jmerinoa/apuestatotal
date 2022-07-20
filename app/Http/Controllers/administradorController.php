<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\promotorFormRequest;
use App\Models\administrador;
use Illuminate\Http\Request;
use Exception;

class administradorController extends Controller
{
    public function index(Request $request)
    {
        $searchText = trim($request->get('searchText'));
        if ($request) {
            $admi = DB::table('promoter')
                ->where('nomPromoter', 'LIKE', '%' . $searchText . '%')
                ->paginate(15);
            return view('mantenimiento.administrador.index', compact('searchText', 'admi'));
        }
    }
    public function create()
    {
        return view('mantenimiento.administrador.create');
    }
    public function store(promotorFormRequest $request)

    {
        try {
            $admi = new administrador;
            $admi->nomPromoter =  strtoupper($request->get('nomPromoter'));
            $admi->email = $request->get('email');
            $admi->password = bcrypt($request->get('password'));
            $admi->save();
            return Redirect::to('mantenimiento/administrador')->with(['success' => $admi->nomPromoter . ' agregado']);
        } catch (Exception $e) {
            return Redirect::to('mantenimiento/administrador')->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        return view("mantenimiento.administrador.edit", ["admi"=>administrador::findOrFail($id)]);
    }
    public function update(promotorFormRequest $request, $id)
    {
        $admi = administrador::findOrFail($id);
        $admi->nomPromoter =  strtoupper($request->get('nomPromoter'));
        $admi->email = $request->get('email');
        $admi->update();
        return Redirect::to('mantenimiento/administrador');
    }

    public function destroy(Request $request, $id)
    {


        try {
            if ($request->ajax()) {

                $docu   = administrador::findOrFail($id);

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
