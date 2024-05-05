<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah</title>
</head>
<body>
    <form action="<?= URL ::to('pelanggan') ?>" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <h1>Form Tambah</h1>
            <label>Kode </label>
            <input type="text" id=""  name="kode"> <br/><br/>
            <label>Nama Pelanggan</label>
            <input type="text" id=""  name="nama"> <br/><br/>         
            <label>Alamat</label>
            <input type="text" id=""  name="alamat"> <br/><br/>
            <label>No Hp</label>
            <input type="text" id=""  name="hp"> <br/><br/>     
            <input type="submit" name="submit">   

            
    </form>
</body>
</html>
