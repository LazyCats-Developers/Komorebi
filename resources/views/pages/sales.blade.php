@extends('layouts.main')

@section('content')
    @if(auth()->user()->empresas()->exists())
        <div class="flex flex-col md:p-3">
            <div class="bg-white grid-col p-3 border-b md:rounded-t-md">
                <p>VENTAS</p>
            </div>
            <div class="bg-white flex flex-row-reverse p-3 border-b">
                <a href="{{ url('newsales') }}" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:max-w-md">
                    Crear venta
                </a>
            </div>
            <div class="bg-white space-y-3 py-3 border-b">
                <table class="w-full">
                    <thead class="bg-gray-300">
                        <tr class="grid grid-cols-7 justify-items-center">
                            <th>ID</th>
                            <th>fecha</th>
                            <th>hora</th>
                            <th>valor</th>
                            <th>vendedor</th>
                            <th>tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="grid grid-cols-7 justify-items-center">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-white p-3 md:rounded-b-md">
            </div>
        </div>
    @endif
@endsection
