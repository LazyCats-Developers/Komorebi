@extends('layouts.main')

@section('content')

    <div class="flex flex-col md:p-3">
            <div class="bg-white p-3 border-b md:rounded-t-md">
                <p>INFORMACION DE LA CUENTA</p>
            </div>
            <div class="bg-white flex flex-cols-2 space-y-3 p-3 pb-5 border-b">
                <div class="w-96">
                    <img class="w-60 rounded-full" src="/uploads/avatars/{{$user->avatar}}">
                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        @csrf
                        <div class="grid grid-cols-2">
                        <input type="file" name="avatar">
                        <input type="submit" class="">
                        </div>

                    </form>
                </div>
                <div>
                    <h2> Perfil de {{$user->nombre}} </h2>
                </div>
            </div>
            <div class="bg-white grid-col p-3 md:rounded-b-md">
                <div class="flex flex-row justify-around space-x-3">

                </div>
            </div>
    </div>

@endsection
