{{-- Copyright (C) 2019 Prof Matias Garcia para -http://www.profmatiasgarcia.com.ar- con licencia GNU GPL3.
Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU según es publicada por la Free Software Foundation, bien con la versión 3 de dicha Licencia o bien (según su elección) con cualquier versión posterior. Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de GNU para más detalles.
Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así ingrese a -http://www.gnu.org/licenses/- --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loto Plus') }}
        </h2>
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="text-center text-indigo-600 text-xl">Elige 6 números entre 1 y 52.</h2>
                <hr />
                <br />

                <form action="{{ route('verificar') }}" method="POST" class="row" style="display: inline-block;">
                    @csrf
                    @for ($i = 0; $i < 6; $i++)
                        <select id="{{ $i }}" name="{{ $i }}" class="col-sm-2"
                            style="margin-left: 15px; width: 80px">
                            @for ($j = 1; $j < 53; $j++)
                                <option value="{{ $j }}">{{ $j }}</option>
                            @endfor
                        </select>
                    @endfor
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Jugar
                    </button>
                    <h2><br/></h2>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
