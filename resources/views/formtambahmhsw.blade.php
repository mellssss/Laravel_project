<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
</head>
<body>
    <form action="{{url('mahasiswa')}}" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <h1>Form Tambah Mahasiswa</h1>
            <input type="text" name="a" placeholder=""> <br> <br>
            <input type="text" name="b"  placeholder=""> <br> <br>
            <input type="submit" name="submit">   
            
    </form>
</body>
</html>