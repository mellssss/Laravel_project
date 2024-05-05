<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Bagi</title>
</head>
<body>
    <form action="prosestambah" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <h1>Form Tambah</h1>
            <input type="text" name="a" value="{{ isset($nilA) ? $nilA : ''}}" placeholder="Nilai A"> + 
            <input type="text" name="b" value="{{ isset($nilB) ? $nilB : ''}}" placeholder="Nilai B">
            <input type="submit" name="submit"> 
            <input type="text" name="hasil" value="{{ isset($hasil) ? $hasil : ''}}" placeholder="Hasil" readonly="true">
    </form>
</body>
</html>