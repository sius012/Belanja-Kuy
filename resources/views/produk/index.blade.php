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
        <form action="{{route('produk.store')}}" method="post">
        @csrf
        <input type="text" placeHolder="nama produk" name="nama_produk"><br>
        <input type="number" placeHolder="harga satuan" name="harga_satuan"><br>
        <input type="text" placeHolder="satuan" name="satuan"><br>
        <select name="id_merek" id="">
            @foreach($mereks as $merek)
                <option value="{{$merek->idMerek}}">{{$merek->namaMerek}}</option>
            @endforeach
        </select><br>
        <select name="id_kategori" id="">
            @foreach($kategoris as $kategori)
                <option value="{{$kategori->idKategori}}">{{$kategori->namaKategori}}</option>
            @endforeach
        </select><br>
        <input type="text" placeHolder="deskripsi" name="deskripsi"><br>
        <input type="submit">
        </form>
    </div>
</body>
</html>