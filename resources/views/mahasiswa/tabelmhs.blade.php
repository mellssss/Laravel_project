<!DOCTYPE html>
<html>
<head>
	<title>Tabel Mahasiswa</title>
</head>
<body> 
    <h1 class = "mt-4">Data Barang</h1><hr>

    <a href="{{ url('mahasiswa/create') }}" class="btn btn-primary btn-sm"><i class = "fa fa-plus"></i> Tambah</a> 

    <table border="1" width="100%">
      <th>No</th>
      <th>Nim</th>
      <th>nama</th>
      <th>Jenis Kelamin</th>
      <th>Prodi</th>
      <th>Kelas</th>
      <th>Aksi</th> 
      
      <?php
        $no=1;

        foreach ($tabelmhs as $a){
      ?>
      <tr>
        <td>{{$no++}}</td>
        <td>{{$a->nim}}</td>
        <td>{{$a->nama}}</td>
        <td>{{$a->jk}}</td>
        <td>{{$a->nmprodi}}</td>
        <td>{{$a->kelas}}</td>

        <td>
          <a href="{{ URL::asset('/mahasiswa/'.$a->id.'/edit') }}">EDIT</a>
          <a href="{{ URL::asset('/mahasiswa/'.$a->id.'/hapus') }}">DEL</a>
        </td>
           
      </tr>
      <?php
        }
      ?>     
    </table>
     
</body>
</html>