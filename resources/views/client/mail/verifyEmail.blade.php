<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Xin chào {{ $userName }}</h1>
    <p>Mời bấm xác thực tài khoản để tiếp tục sử dụng hệ thống: <a href="{{ route('verify', $token) }}">Xác thực tài khoản</a></p>
</body>
</html>