<?php
/* Copyright (C) 2019 Prof Matias Garcia para -http://www.profmatiasgarcia.com.ar- con licencia GNU GPL3.
    Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU según es publicada por la Free Software Foundation, bien con la versión 3 de dicha Licencia o bien (según su elección) con cualquier versión posterior. Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de GNU para más detalles.
    Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así ingrese a -http://www.gnu.org/licenses/- */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

use Session;
use Redirect;

class EmpleadoController extends Controller
{
    /**
     * Middleware para verificar
     * que el usuario se encuentre logueado
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Método para listar empleados
     * de manera opcional se puede consultar a los
     * usuarios inactivos
     * @param $todos = 0 {Integer}
     * @return View
     */

     public function index($todos = 0){
         $empleados = Empleado::where('estatus', 1)->get();

         if($todos){
            $empleados = Empleado::all();
         }

         return view('empleados.index', compact('empleados', 'todos'));
     }

     /**
      * Formulario para crear
      * @return View
      */

      public function formCrear(){
          return view('empleados.formCrear');
      }

        /**
        * Formulario para editar
        * @param $id {Int}
        * @return View
        */

        public function formEditar($id){
            $empleado = Empleado::findOrFail($id);
            return view('empleados.formEditar', compact('empleado'));
        }

        /**
         * Ver datos del empleado
         * @param $id {Int}
         * @return View
         */

         public function show($id){
             $empleado = Empleado::findOrFail($id);
             return view('empleados.verEmpleado', compact('empleado'));
         }

     /**
      * Crear un nuevo empleado
      * @param Request
      * @return Redirect
      */

      public function store(Request $request){
          /**
           * Validación de campos requeridos
           */
          $request->validate([
            'nombre'=> 'required',
            'apellido_paterno'=> 'required',
            'correo'=> 'required',
            'tipo_contrato' =>' required'
          ]);

          /**
           * Guardar un nuevo empleado en tabla empleados
           */
          Empleado::create($request->all());

          /**
           * Guardar en session un mensaje indicando que el empleado se registró correctamente
           */
          Session::flash('message','Se ha registrado al empleado correctamente');
          /**
           * Redireccionar a la ruta de inicio
           * donde se muestran los empleados.
           */
          return redirect::to('/inicio');
      }

      /**
       * Actualizar datos del empleado
       * @param Request
       * @return Redirect
       */

      public function update(Request $request, $id)
      {
        $request->validate([
            'nombre'=> 'required',
            'apellido_paterno'=> 'required',
            'correo'=> 'required',
            'tipo_contrato' =>' required'
        ]);
        //Buscar si existe el empleado y guardar los datos
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());

        //Mostrar mensaje
        Session::flash('message','Se ha actualizado al empleado correctamente');
        //Redireccionar al listado de empleados
        return redirect::to('/empleado/'.$id);
      }

      /**
       * Actualizar el estatus del empleado
       * @param Request
       * @return Redirect
       */

      public function cambiarEstatus($id)
      {

        //Buscar si existe el empleado y estatus = !estatus
        $empleado = Empleado::findOrFail($id);
        $empleado->estatus = !$empleado->estatus;
        $empleado->save();

        //Mostrar mensaje
        Session::flash('message','Se ha actualizado el estatus correctamente');
        //Redireccionar al listado de artículos
        return redirect::to('/empleado/'.$id);
      }

      /**
       * Eliminar al empleado de la tabla
       * @param $id {Int}
       * @return Redirect
       */

      public function destroy($id)
      {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        Session::flash('message','Se ha eliminado al empleado correctamente');
        return redirect::to('/inicio');
      }
}
