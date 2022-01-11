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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('users.update', ['id' => $user['id']])}}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{$user['firstname']}}" required>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname"value="{{$user['lastname']}}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{$user['email']}}"required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="CPF" id="cpf" value="{{$user['cpf']}}" name="cpf" required>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="RG" value="{{$user['rg']}}" name="rg" required>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Birth Date" id="birth_date" value="{{$user['birth_date']}}" name="birth_date" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Phone" id="phone" value="{{$user['phone']}}" name="phone" required>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cellphone" id="cellphone" value="{{$user['cellphone']}}" name="cellphone" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="zipcode" id="zipcode" value="{{$user['address']['zipcode']}}" name="zipcode" required>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Address" id="address" value="{{$user['address']['address']}}" name="address" readonly required>
                </div>
            </div>
            <div class="col-1">
                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="Number" value="{{$user['address']['number']}}" name="number" required>
                </div>
            </div>
            <div class="col-1">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Complement" value="{{$user['address']['complement']}}" name="complement">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="District" id="district" value="{{$user['address']['district']}}" name="district" readonly required>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="City" id="city" value="{{$user['address']['city']}}" name="city" readonly required>
                </div>
            </div>
            <div class="col-1">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="State" id="state" value="{{$user['address']['state']}}" name="state" readonly required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="btn_submit">Update</button>
    </form>
</div>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery.mask.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script>
    $(document).ready(function() {

        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#birth_date').mask('00/00/0000');
        $('#phone').mask('(00) 0000-0000');
        $('#cellphone').mask('(00) 00000-0000');
        $('#zipcode').mask('00000-000');

        $('#zipcode').on('focusout', function() {
            let zipcode = $('#zipcode').val().replace('-','');
            $.ajax({
                type: 'GET',
                url: `https://viacep.com.br/ws/${zipcode}/json/`,
                success: function(result) {
                    $('#address').val(result.logradouro).attr('value', result.logradouro).prop('readonly', false);
                    $('#district').val(result.bairro).attr('value', result.bairro).prop('readonly', false);
                    $('#city').val(result.localidade).attr('value', result.localidade).prop('readonly', false);
                    $('#state').val(result.uf).attr('value', result.uf).prop('readonly', false);
                },
                error: function() {
                    $('#address').prop('readonly', false);
                    $('#district').prop('readonly', false);
                    $('#city').prop('readonly', false);
                    $('#state').prop('readonly', false);
                }
            })
        });
    });
</script>
</body>
</html>
