<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
   
   if($tambah == 1){
    $idpelanggan=0;  
   } else {
        $idpelanggan= $master ->idpelanggan;
        $nobukti = $master-> nobukti;
   }

?>
<body>
    <h1>Input Penjualan</h1>

    <table border="1" width="100%">
        <form action="<?= URL ::to('jual') ?>" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <th>
            <div class="row">
                <label>No Bukti</label>
                <input type="text" id="nobukti" name="nobukti" value="{{ isset($nobukti) ? $nobukti : '' }}">

                <label>Tanggal</label>
                <input type="date" id="tgl" name="tgl" value="{{ isset($master->tgl) ? $master->tgl : '' }}" required>
            </div>
            <div class="row">
                    <label>Pelanggan</label>
                    <select name="idpelanggan" id="idpelanggan"  style="width: 10%;">
                    <?php
                        //$menuden = \App\Role::where('id','!=',5)->get();         
                        $menuden=DB::table('tbpelanggan')
                        ->get();
                        

                        foreach($menuden as $rows){
                            if($idpelanggan == $rows->id){
                                echo "<option selected = 'selected' value='".$rows->id."'>".$rows->nama."</option>";
                            } else {
                                echo "<option value='".$rows->id."'>".$rows->nama."</option>";
                            }
                        }
                    ?>
                    </select>
                
                <label>Keterangan</label>
                <input type="text" id="ket" name="ket" value="{{ isset($master->ket) ? $master->ket : '' }}">
            </div>
        </th>
        <tr>
            <th>
                <div>
                    <label>Nama Barang</label>
                    <select name="idbarang" id="idbarang" style="width: 10%;">
                    <?php
                        //$menuden = \App\Role::where('id','!=',5)->get();         
                        $menuden=DB::table('tbbarang')
                        ->get();
                        

                        foreach($menuden as $rows){
                            if($idpelanggan == $rows->id){
                                echo "<option selected = 'selected' value='".$rows->id."'>".$rows->kode."-".$rows->nama."</option>";
                            } else {
                                echo "<option value='".$rows->id."'>".$rows->kode."-".$rows->nama."</option>";
                            }
                        }
                    ?>
                    </select>
                </div>

                <label>Jumlah</label>
                <input type="text" id="qty" name="qty" value="{{ isset($master->qty) ? $master->qty : '' }}" required>

                <label>Harga Jual</label>
                <input type="text" id="hj" name="hj" value="{{ isset($master->hrgjual) ? $master->hrgjual : '' }}" required>
               
                <input type="submit" id="simpan" name="simpan">

            </th>
        </tr>
        <tr>
            <th>
                <table border="1" width="100%">
                    <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                    </tr>
                    <tr>
                        <?php
                        $no=0;
                        $total=0;

                        foreach ($result as $key) {
                            $no++;
                            $total = $total + ($key->hrgjual * $key->qty);
                            ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$key->namabarang}}</td>
                            <td>{{$key->namasatuan}}</td>
                            <td>{{$key->qty}}</td>
                            <td>{{$key->hrgjual}}</td>
                            <td>{{ number_format($key->hrgjual * $key->qty,2)}}</td>
                           <td>
                                <a href="{{ URL::asset('/deletejualdetail/'.$key->idjualdetail) }}">Hapus</a>
                           </td>

                        </tr>

                        <?php    
                        }
                        ?>
                        <tr>
                            <td colspan="5"> Total</td>
                            <td colspan="5">{{ number_format($total,2)}}</td>
                        </tr>
                        
                    </tr>  
                </table>
            </th>
        </tr>
    </form>    
    </table>
</body>
</html>