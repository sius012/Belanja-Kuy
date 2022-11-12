<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="{{route('kategori.store')}}" method="post">
        @csrf
        <input type="text" placeHolder="nama kategori" name="nama_kategori">
        <input type="submit">
        </form>
    </div>
</body>
</html>