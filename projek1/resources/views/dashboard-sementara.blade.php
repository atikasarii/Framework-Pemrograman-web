<!DOCTYPE html>
<html>
<body>
    <p>Dashboard sementara - login berhasil sebagai: {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>