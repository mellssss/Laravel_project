<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
   
   if($tambah == 1){
    $idjk=0;  
   } else {
        $idjk= $master ->idjk;
        $nim = $master-> nim;
   }

?>
<body>
    <h1>Input Mahasiswa</h1>

    <table border="1" width="100%">
        <form action="<?= URL ::to('mahasiswa') ?>" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <th>
            <div class="row">
                <label>Nim</label>
                <input type="text" id="nim" name="nim" value="{{ isset($nim) ? $nim : '' }}">

                <label>Nama</label>
                <input type="text" id="nama" name="nama" value="{{ isset($master->nama) ? $master->nama : '' }}" required>
            </div>
            <div class="row">
                    <label>Jenis Kelamin</label>
                    <select name="idjk" id="idjk"  style="width: 10%;">
                    <?php
                        //$menuden = \App\Role::where('id','!=',5)->get();         
                        $menuden=DB::table('jeniskelamin')
                        ->get();
                        
                        foreach($menuden as $rows){
                            if($idjk == $rows->id){
                                echo "<option selected = 'selected' value='".$rows->id."'>".$rows->jk."</option>";
                            } else {
                                echo "<option value='".$rows->id."'>".$rows->jk."</option>";
                            }
                        }
                    ?>
                    </select>
            
                    <label>Prodi</label>
                    <select name="idprodi" id="idprodi" style="width: 10%;">
                    <?php
                        //$menuden = \App\Role::where('id','!=',5)->get();         
                        $menuden=DB::table('prodi')
                        ->get();
                        

                        foreach($menuden as $rows){
                            if($idjk == $rows->id){
                                echo "<option selected = 'selected' value='".$rows->id."'>".$rows->id."-".$rows->nmprodi."</option>";
                            } else {
                                echo "<option value='".$rows->id."'>".$rows->id."-".$rows->nmprodi."</option>";
                            }
                        }
                    ?>
                    </select>

                <label>Kelas</label>
                <input type="text" id="kelas" name="kelas" value="{{ isset($master->kelas) ? $master->kelas : '' }}" required>

                <input type="submit" id="simpan" name="simpan">
                </div>
            </th>
        </tr>
        
        <tr>
            <th>
                <table border="1" width="100%">
                    <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                    </tr>
                    <tr>
                    <?php
                        $no=1;

                        foreach ($result as $a){
                    ?>
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$a->nim}}</td>
                        <td>{{$a->nama}}</td>
                        <td>{{$a->jk}}</td>
                        <td>{{$a->nmprodi}}</td>
                           <td>
                                <a href="{{ URL::asset('/mahasiswa/'.$a->id.'/edit') }}">EDIT</a>
                                <a href="{{ URL::asset('/deletedatamhs/'.$a->id) }} }}">DEL</a>
                           </td>

                        </tr>

                        <?php    
                        }
                        ?>                     
                    </tr>  
                </table>
            </th>
        </tr>
    </form>    
    </table>
</body>
</html>