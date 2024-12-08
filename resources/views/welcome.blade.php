<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    @if(session('user'))
        <h1>Welcome, {{ session('user.name') }}!</h1>
        <p>Email: {{ session('user.email') }}</p>
        <a href="{{ route('logout') }}">Logout</a>
    @else
        <p>You are not logged in.</p>
        <a href="{{ route('login') }}">Login with Keycloak</a>
    @endif
</body>
</html>
