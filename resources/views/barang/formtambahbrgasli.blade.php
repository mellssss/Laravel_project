<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Barang</title>
</head>
<body>
    <form action="<?= URL ::to('barang') ?>" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <h1>Form Tambah Barang</h1>
            <label>Kode </label>
            <input type="text" id=""  name="kode"> <br/><br/>
            <label>Nama Barang</label>
            <input type="text" id=""  name="nama"> <br/><br/>
            
            <?php
                $idsatuan=0;
            ?>
            <div>
                <label>Satuan</label>
                <select name="idsatuan" id="idsatuan"  style="width: 10%;">
                <?php
                    //$menuden = \App\Role::where('id','!=',5)->get();         
                    $menuden=DB::table('tbsatuan')
                    ->select('tbsatuan.*')
                    ->get();
                    

                    foreach($menuden as $rows){
                        if($idsatuan == $rows->id){
                            echo "<option selected = 'selected' value='"-$rows->id."'>".$rows->nama."</option>";
                        } else {
                            echo "<option value='".$rows->id."'>".$rows->nama."</option>";
                        }
                    }
                ?>
                </select>
            </div> <br>
            <label>Sawal</label>
            <input type="text" id=""  name="hbt"> <br/><br/>
            <label>Harga Beli Terakhir</label>
            <input type="text" id=""  name="hbt"> <br/><br/>
            <label>Harga Jual</label>
            <input type="text" id=""  name="hj"> <br/><br/>     
            <input type="submit" name="submit">   

            
    </form>
</body>
</html>
