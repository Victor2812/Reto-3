<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">

        @csrf

        <div><input type="text" name="dni" placeholder="DNI" />
            <input type="password" name="password" placeholder="" />
    
            <input type="submit" value="Enviar"></div>
    </form>
</body>
</html>