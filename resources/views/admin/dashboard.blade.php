<!DOCTYPE html>
<html>
<head>
    <title>Superadmin Dashboard</title>
</head>
<body>
    <h2>Welcome, {{auth()->user()->name??''}}!</h2>
    <form method="POST" action="{{ route('superadmin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
