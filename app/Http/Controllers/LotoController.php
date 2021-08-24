<?php
/* Copyright (C) 2019 Prof Matias Garcia para -http://www.profmatiasgarcia.com.ar- con licencia GNU GPL3.
    Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU según es publicada por la Free Software Foundation, bien con la versión 3 de dicha Licencia o bien (según su elección) con cualquier versión posterior. Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de GNU para más detalles.
    Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así ingrese a -http://www.gnu.org/licenses/- */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('loto');
    }

    public function verificar(Request $request)
    {

        $request->validate([
            '0' => 'required|integer|between:1,52',
            '1' => 'required|integer|between:1,52',
            '2' => 'required|integer|between:1,52',
            '3' => 'required|integer|between:1,52',
            '4' => 'required|integer|between:1,52',
            '5' => 'required|integer|between:1,52',
        ]);

        $user = $request->all();
        array_splice($user, 0, 1);

        $draw = array();

        for( $i = 0; $i < 6; $i++ )
        {
            array_push($draw , rand(1, 52));
        }

        $result = 0;

        for( $i = 0; $i < 6; $i++ )
        {
            if($draw[$i] == $user[$i] ){
                $result++;
            }
        }

        $viewdata = array('user' => $user,'draw' => $draw,'result' => $result);
        return view( 'verificar', $viewdata);
    }
}
