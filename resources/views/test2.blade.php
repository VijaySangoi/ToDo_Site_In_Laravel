<html>

<body>
    <form action="{{route('testing')}}" method="post">
        @csrf
        <input type="text" name="name">
        <br><br>
        <input type="text" name="address">
        <br><br>
        <button type="submit">submit</button>
    </form>
</body>

</html>