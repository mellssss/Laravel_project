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
        $result= DB::table('tbbarang') 
            ->leftjoin ('tbsatuan','tbsatuan.id','=','tbbarang.idsatuan')
            ->select('tbbarang.*','tbsatuan.nama as namasatuan')
            ->orderby('tbbarang.nama')
            ->where('tbbarang.idsatuan','=',$idcari)
            ->first();
    ?>

    <form action="<?= URL ::to('barang/'.$idcari) ?>" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="text" name="idcari" value="{{$idcari}}">
        <h1>Form Edit</h1>
            <label>Kode </label>
            <input type="text" id=""  name="kode" value="{{ isset($result->kode) ? $result->kode : '0'}}"> <br/><br/>
            <label>Nama Barang</label>
            <input type="text" id=""  name="nama" value="{{ isset($result->nama) ? $result->nama : '-'}}"> <br/><br/>
            <?php
                $idsatuan=0;
            ?>
            <div>
                <label>Satuan</label>
                <select name="idsatuan" id="idsatuan"  style="width: 10%;" value="{{ isset($result->idsatuan) ? $result->idsatuan : '-'}}">>
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
            <label>Saldo Awal</label>
            <input type="text" id=""  name="sawal" value="{{ isset($result->sawal) ? $result->sawal : '-'}}"> <br/><br/>
            <label>Harga Beli Terakhir</label>
            <input type="text" id=""  name="hb" value="{{ isset($result->hb) ? $result->hb : '-'}}"> <br/><br/>
            <label>Harga Jual</label>
            <input type="text" id=""  name="hj" value="{{ isset($result->hj) ? $result->hj : '-'}}"> <br/><br/>
            
           
        
            <input type="submit" name="submit">   
            
    </form>
</body>
</html>