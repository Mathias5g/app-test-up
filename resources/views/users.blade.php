<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<div class="container-md p-4">
    <button class="btn btn-lg btn-success">
        <a class="text-decoration-none text-white" href="{{route('users.create')}}">NEW USER</a>
    </button>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">CPF</th>
            <th scope="col">RG</th>
            <th scope="col">Phones</th>
            <th scope="col">Address</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user['firstname']}} {{$user['lastname']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['cpf']}}</td>
                <td>{{$user['rg']}}</td>
                <td>{{$user['phone']}} / {{$user['cellphone']}}</td>
                <td>{{$user['address']['address']}}, {{$user['address']['number']}}/{{$user['address']['complement']}}, {{$user['address']['city']}}, {{$user['address']['state']}}, {{$user['address']['zipcode']}}</td>
                <td><a href="{{route('users.edit', ['id' => $user['id']])}}">Edit</a> / <a href="{{route('users.delete', ['id' => $user['id']])}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrao.js.js')}}"></script>
</body>
</html>
