@extends('layouts.main')

@section('content')

    <div>
        <img src="/uploads/avatars/{{$user->avatar}}" style="width:150px; height:150px; float: left; border-radius:50%; margin-right:25px;">
        <h2> Perfil de {{$user->nombre}} </h2>
        <form enctype="multipart/form-data" action="/profile" method="POST">
            <label>Subir imagen de perfil</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="pull-right btn btn-sm btn-primary">
        </form>
    </div>

@endsection
