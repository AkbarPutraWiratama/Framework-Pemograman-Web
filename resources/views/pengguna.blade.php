<!DOCTYPE html>
<html>
<head>
    <title>Halaman Pengguna</title>
</head>
<body>
    <h1>Halaman Pengguna</h1>
    <p>ID Pengguna: {{ $id }}</p>
    <a href="{{ route(name: 'edit-profile', parameters: ['id' => $id]) }}">Profile Edit</a>

</body>
</html>