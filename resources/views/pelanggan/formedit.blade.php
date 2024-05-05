<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit</title>
</head>
<body>

    <?php
        $result= DB::table('tbpelanggan') 
            ->select('tbpelanggan.*')
            ->orderby('tbpelanggan.nama')
            ->where('tbpelanggan.id','=',$idcari)
            ->first();
    ?>

    <form action="<?= URL ::to('pelanggan/'.$idcari) ?>" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="idcari" value="{{$idcari}}">
        <h1>Form Edit</h1>
            <label>Kode </label>
            <input type="text" id=""  name="kode" value="{{ isset($result->kode) ? $result->kode : '0'}}"> <br/><br/>
            <label>Nama Pelanggan</label>
            <input type="text" id=""  name="nama" value="{{ isset($result->nama) ? $result->nama : '-'}}"> <br/><br/>
            <label>Alamat</label>
            <input type="text" id=""  name="alamat" value="{{ isset($result->alamat) ? $result->alamat : '-'}}"> <br/><br/>
            <label>No Hp</label>
            <input type="text" id=""  name="hp" value="{{ isset($result->hp) ? $result->hp : '0'}}"> <br/><br/>
        
            <input type="submit" name="submit">   
            
    </form>
</body>
</html>