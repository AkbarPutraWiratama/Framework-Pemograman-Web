<!doctype html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>
    <p>ID Pengguna: {{ $id }}</p>
    <a href="{{ route(name: 'contact', parameters: ['id' => $id]) }}">Contact Us</a>
    <a href="{{ route(name: 'about', parameters: ['id' => $id]) }}">About Us</a>

</body>
</html>
