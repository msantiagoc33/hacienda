<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Clientes;
use App\Models\Paises;
use App\Models\Conceptos;
use App\Models\Gastos;
use App\Models\Historico;
use App\Models\Plataformas;
use App\Models\Usuarios;
use App\Models\Ingresos;
use Carbon\Carbon;


class ApartamentoController extends Controller
{
 
    public function logout(){
        Auth::logout();
        return redirect('/');

    }
    /**
     * Esta funcion se carga en cuanto nos registramos, es el menu de navegacion
     */
    public function plantilla()
    {
        return view('plantilla');
    }

    /**
     * Esta funcion se carga al iniciar la session y pasa a historico los ingresos anteriores a la fecha actual
     * y los borra de la tabla ingresos
     */
    public function index()
    {
        try{
            DB::beginTransaction();
            $hoy = Carbon::parse(Carbon::now())->format('Y-m-d');

            // Selecciono todos lo ingresos caducados
            $copiarIngresoaHistorico =  DB::table('ingresos')->where("fechaEntrada",'<',$hoy)->get();
            // return view('borrar', compact('copiarIngresoaHistorico'));
            // Creo una instancia del modelo Historico para obtener todos los campos
            $historico = new Historico();

            // Recorro el resultado y lo voy grabando en la tabla historicos
            foreach($copiarIngresoaHistorico as $h){
                $historico = new Historico();
                $historico->cliente_id      =  $h->cliente_id;
                $historico->plataforma_id   =  $h->plataforma_id;
                $historico->huespedes       =  $h->huespedes;
                $historico->fechaEntrada    =  $h->fechaEntrada;
                $historico->fechaSalida     =  $h->fechaSalida;
                $historico->importe         =  $h->importe;
                $historico->comentario      =  $h->comentario;           
                $historico->save();
            }

            // Una vez copiados en la tabla historicos los borro de la tabla ingresos
            $borrarIngresos = DB::table('ingresos')->where("fechaEntrada",'<',$hoy)->delete();

            // Si todo ha ido bien se ejecutan las dos operaciones
            DB::commit();
            // Cargamos el menu
            return view('plantilla');
        }catch(Exception $e){
            // si algo ha ido mal se vuelve al estado incial.
            DB::rollback();
            return back()->with('mensaje','Fallo en el proceso de inserccion en Historico y borrado de Ingreso');
        }   
    }

    public function clientes()
    {
        $clientes = Clientes::orderBy('id','DESC')->paginate(7);
        return view('clientes',compact('clientes'));
    }
/******************************************************************
 * 
 * 
 *                    P A I S E S 
 * 
 * 
 *****************************************************************/
    public function paises()
    {
        $paises = Paises::all();
        return view('paises',compact('paises'));
    }
/******************************************************************
 * 
 * 
 *                    C O N C E P T O S
 * 
 * 
 *****************************************************************/
    public function conceptos()
    {
        $conceptos = Conceptos::orderBy('nombre')->paginate(8);
        return view('conceptos',compact('conceptos'));
    }

    public function nuevoConcepto()
    {
        return view('nuevoConcepto');
        
    }

    public function grabaConcepto(Request $request)
    {
        $validated = $request->validate([
            'nombre'  => 'required'
        ]);

        $concepto = new Conceptos();

        $concepto->nombre    = $request->nombre;

        $concepto   ->save();

        return back()->with('mensaje','Concepto insertado');;
        
    }

    public function eliminarConcepto($id)
    {
        $eliminarConcepto = Conceptos::findOrFail($id);
        $eliminarConcepto->delete();

        return back()->with('mensaje','Concepto eliminado');
    }

    public function modificarConcepto($id)
    {
        $modificarConcepto = Conceptos::findOrFail($id);

        return view('editarConcepto',compact('modificarConcepto'));
    }

    public function updateConcepto(Request $request, $id)
    {

        $modificarConcepto = Conceptos::findOrFail($id);

        $modificarConcepto->nombre = $request->nombre;

        $modificarConcepto->save();

        return back()->with('mensaje','Concepto modificado');
        
    }
/******************************************************************
 * 
 * 
 *                    G A S T O S
 * 
 * 
 *****************************************************************/
    public function gastos()
    {
        $total =  Gastos::all();

        $gastos = Gastos::paginate(8);
        return view('gastos',compact('gastos','total'));
    }

    public function nuevoGasto()
    {
        $conceptos = Conceptos::all();
        return view('nuevoGasto',compact('conceptos'));
        
    }

    public function grabaGasto(Request $request)
    {
        $validated = $request->validate([
            'concepto_id'       => 'required',
            'fecha'             => 'required',
            'importe'           => 'required'
        ]);

        $gasto = new Gastos();

        $gasto->concepto_id    = $request->concepto_id;
        $gasto->fecha          = $request->fecha;
        $gasto->importe        = $request->importe;
        $gasto->comentario     = $request->comentario;

        $gasto->save();

        return back()->with('mensaje','Gasto insertado');;
        
    }

    public function eliminarGasto($id)
    {
        $gastoEliminar = Gastos::findOrFail($id);
        $gastoEliminar->delete();

        return back()->with('mensaje','Gasto eliminado');
    }
    
    public function modificarGasto($id)
    {
        $modificarGasto = Gastos::findOrFail($id);
        $conceptos = Conceptos::all();

        return view('editarGasto',compact('modificarGasto','conceptos'));
    }

    public function updateGasto(Request $request, $id)
    {

        $modificarGasto = Gastos::findOrFail($id);

        $modificarGasto->concepto_id        = $request->concepto_id;
        $modificarGasto->fecha              = $request->fecha;
        $modificarGasto->importe            = $request->importe;
        $modificarGasto->comentario         = $request->comentario;

        $modificarGasto->save();

        return back()->with('mensaje','Gasto modificado');
        
    }

    public function verGasto($id)
    {
        $gasto = Gastos::findOrFail($id);

        return view('verGasto',compact('gasto'));
        
    }
/******************************************************************
 * 
 * 
 *                    H I S T O R I C O
 * 
 * 
 *****************************************************************/
    public function historico()
    {
        $historicos = Historico::orderBy('id','desc')->paginate(5);
        return view('historicos',compact('historicos'));
    }

    public function eliminarHistorico($id)
    {
        $eliminarHistorico = Historico::findOrFail($id);
        $eliminarHistorico->delete();

        return back()->with('mensaje','Historico eliminado');
    }

    public function verHistorico($id)
    {
        $historico = Historico::findOrFail($id);

        return view('verHistorico',compact('historico'));
        
    }


    public function modificarHistorico($id)
    {
        $modificarHistorico = Historico::findOrFail($id);
        $clientes = Clientes::orderBy('id','DESC')->paginate(10);
        $plataformas = Plataformas::all();

        return view('editarHistorico',compact('clientes','plataformas','modificarHistorico'));
    }

    public function updateHistorico(Request $request, $id)
    {

        $modificarHistorico = Historico::findOrFail($id);

        $modificarHistorico->cliente_id       = $request->cliente_id;
        $modificarHistorico->plataforma_id    = $request->plataforma_id;
        $modificarHistorico->huespedes        = $request->huespedes;
        $modificarHistorico->fechaEntrada     = $request->fechaEntrada;
        $modificarHistorico->fechaSalida      = $request->fechaSalida;
        $modificarHistorico->importe          = $request->importe;
        $modificarHistorico->comentario       = $request->comentario;



        $validated = $request->validate([
            'cliente_id'    => 'required',
            'plataforma_id' => 'required',
            'huespedes'     => 'required',
            'fechaEntrada'  => 'required',
            'fechaSalida'   => 'required',
            'importe'       => 'required'
        ]);

        $modificarHistorico->save();

        return back()->with('mensaje','Historico modificado');
        
    }
/******************************************************************
 * 
 * 
 *                    P LA T A F O R M A S
 * 
 * 
 *****************************************************************/

    public function plataformas()
    {
        $plataformas = Plataformas::all();
        return view('plataformas',compact('plataformas'));
    }
/******************************************************************
 * 
 * 
 *                    U S U A R I O S
 * 
 * 
 *****************************************************************/
    public function usuarios()
    {
        $usuarios = Usuarios::all();
        return view('usuarios',compact('usuarios'));
    }

    /******************************************************************
 * 
 * 
 *                    H U E S P E D E S
 * 
 * 
 *****************************************************************/
    public function huespedes()
    {
        $huespedes = Clientes::orderBy('id','desc')->paginate(8);
        return view('huespedes',compact('huespedes'));
    }

    public function verHuesped($id)
    {
        $huesped = Clientes::findOrFail($id);

        return view('verHuesped',compact('huesped'));
        
    }

    public function nuevoHuesped(){

        $paises = Paises::all();
        return view('nuevoHuesped',compact('paises')); 

    }

    public function grabaHuesped(Request $request){

        $validated = $request->validate([
            'pais_id'           => 'required',
            'nombreHuesped'     => 'required',
            'telefono'          => 'required'
        ]);

        $huesped = new Clientes();

        $huesped->id        = $request->id;
        $huesped->pais_id   = $request->pais_id;
        $huesped->nombre    = $request->nombreHuesped;
        $huesped->telefono  = $request->telefono;

        $huesped->save();

        return back()->with('mensaje','Huesped grabado');;

    }
    
    public function editarHuesped($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('clientes.editar', compact('cliente'));
    }

    public function updateHuesped(Request $request, $id)
    {
        $cliente = Clientes::findOrFail($id);

        $cliente->pais_id   = $request->pais_id;
        $cliente->nombre    = $request->nombre;
        $cliente->telefono  = $request->telefono;

        $cliente->save();

        return back()->with('mensaje','Huesped actualizado');
    }

    public function modificarHuesped($id)
    {
        $modificarHuesped = Clientes::findOrFail($id);
        $paises = Paises::all();

        return view('editarHuesped',compact('paises','modificarHuesped'));
    }

    public function eliminarHuesped($id)
    {
        $clienteEliminar = Clientes::findOrFail($id);
        $clienteEliminar->delete();

        return back()->with('mensaje','Huesped eliminado');
    }
/******************************************************************
 * 
 * 
 *                    I N G R E S O S 
 * 
 * 
 *****************************************************************/



    public function hospedajes()
    {
        $pendiente = Ingresos::all();
        $historico = Historico::all();
        $ingresos  = Ingresos::orderBy('fechaEntrada','asc')->paginate(5);

        return view('hospedajes',compact('ingresos','pendiente','historico'));
    }

    public function eliminarIngreso($id)
    {
        $eliminarIngreso = Ingresos::findOrFail($id);
        $eliminarIngreso->delete();

        return back()->with('mensaje','Ingreso eliminado');
    }

    public function verIngreso($id)
    {
        $ingreso = Ingresos::findOrFail($id);

        return view('verIngreso',compact('ingreso'));
        
    }

    public function nuevoIngreso()
    {
        $clientes = Clientes::orderBy('id','DESC')->paginate(10);
        $plataformas = Plataformas::all();
        return view('nuevoIngreso',compact('clientes','plataformas'));
        
    }

    public function grabaIngreso(Request $request)
    {
        try{
            DB::beginTransaction();
            
            $camposValidados = request()->validate([

                'cliente_id'        => 'required|integer|min:1',
                'plataforma_id'     => 'required|integer|min:1',
                'huespedes'         => 'required|integer|between:1,4',
                'fechaEntrada'      => 'required',
                'fechaSalida'       => 'required',
                'importe'           => 'required'
            ]);

            /**
             * Sin la validacion falla, de aqui no pasa
             */

            Ingresos::create($camposValidados);

            DB::commit();

            return redirect()->route('hospedajes');

        }catch(Exception $e){    

            DB::rollback();
            return back()->with('mensaje','Fallo en el proceso de grabacion de Ingreso');

        }        


        return back()->with('mensaje','Ingreso insertado');
        
    }

    public function modificarIngreso($id)
    {
        $modificarIngreso = Ingresos::findOrFail($id);
        $clientes = Clientes::orderBy('id','DESC')->paginate(10);
        $plataformas = Plataformas::all();

        return view('editarIngreso',compact('clientes','plataformas','modificarIngreso'));
    }

    public function updateIngreso(Request $request, $id)
    {

        try{
            DB::beginTransaction();
            $modificarIngreso = Ingresos::findOrFail($id);

            $modificarIngreso->cliente_id       = $request->cliente_id;
            $modificarIngreso->plataforma_id    = $request->plataforma_id;
            $modificarIngreso->huespedes        = $request->huespedes;
            $modificarIngreso->fechaEntrada     = $request->fechaEntrada;
            $modificarIngreso->fechaSalida      = $request->fechaSalida;
            $modificarIngreso->importe          = $request->importe;
            $modificarIngreso->comentario       = $request->comentario;



            $validated = $request->validate([
                'cliente_id' => 'required',
                'plataforma_id' => 'required',
                'huespedes' => 'required',
                'fechaEntrada' => 'required',
                'fechaSalida' => 'required',
                'importe' => 'required'
            ]);

            /**
             * Sin la validacion falla, de aqui no pasa
             */

            $modificarIngreso->save();

            DB::commit();
            return redirect()->route('hospedajes');

        }catch(Exception $e){    

            DB::rollback();
            return back()->with('mensaje','Fallo en el proceso de actualizacion del Ingreso');

        } 
    }

}
