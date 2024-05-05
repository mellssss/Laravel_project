<!DOCTYPE html>
<html>
<head>
  
</head>
<body> 

    <h1 class = "mt-4">Data Jual</h1><hr><br>

    <a href="{{ url('jual/create') }}"> Tambah barang</a><br><br>

    <table  border="1" width="100%">
      <th>No</th>
      <th>No bukti</th>
      <th>Tanggal</th>
      <th>Nama pelanggan</th>
      <th>Total</th>
      <th>Aksi</th>
      
      <?php
        $no=1;

        foreach ($tabeljual as $a){
      ?>
      <tr>
        <td>{{$no++}}</td>
        <td>{{$a->nobukti}}</td>
        <td>{{$a->tgl}}</td>
        <td>{{$a->namapelanggan}}</td>
        <td>{{$a->total}}</td>
        <td>
          <a href="{{ URL::asset('/jual/'.$a->id.'/edit') }}" >Edit</a>
          <a href="{{ URL::asset('/deletejual/'.$a->nobukti) }}">Hapus</a>
        </td>      
          
      </tr>
      <?php
        }
      ?>        
  </table>  
</body>
</html>