{{-- Copyright (C) 2019 Prof Matias Garcia para -http://www.profmatiasgarcia.com.ar- con licencia GNU GPL3.
Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU según es publicada por la Free Software Foundation, bien con la versión 3 de dicha Licencia o bien (según su elección) con cualquier versión posterior. Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de GNU para más detalles.
Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así ingrese a -http://www.gnu.org/licenses/- --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loto Plus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-500 overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="text-center text-white text-2xl">Los resultados</h2>
                <hr />
                <br />

                <table class="table-auto">
                    <thead>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tus números:</td>
                            <td>
                                @foreach ($user as $num)
                                    <span class="col-sm-1 text-center">{{ $num }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Numeros sorteados: </td>
                            <td>
                                @foreach ($draw as $num)
                                    <span class="col-sm-1 text-center">{{ $num }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>

                <br />
                @if ($result > 0)
                    <div class="flex-none">
                        <p class="text-xl">Woohhoo, tu tienes {{ $result }} números correctos</p>
                        <p class="text-xl">Ganaste: $ {{ 5000 ** $result }}</p>
                    </div>
                @else
                    <div class="flex-none">
                        <p class="text-xl">Ooooh, No le pegaste a uno.</p>
                        <p class="text-xl">Suerte para la próxima!</p>
                    </div>
                @endif

                <hr />
                <div class="text-center text-white text-2xl underline">
                    <a href="{{ route('loto') }}">Juega otra vez!</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
