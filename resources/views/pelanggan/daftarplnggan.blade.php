<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

	<title>
    Data Pelanggan
  </title>
</head>
<body>
<div class="container">
    <h1 class = "mt-4">Tabel Pelanggan</h1><hr>

    <a href="{{ url('pelanggan/create') }}" class="btn btn-primary btn-sm"><i class = "fa fa-plus"></i> Tambah Data</a> 

    <table class="table table-bordered table-hover mt-3">
      <th>No</th>
      <th>Kode</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Hp</th>
      <th>aksi</th>
     
      
      <?php
        $no=1;

        foreach ($tabelpelanggan as $a){
      ?>
      <tr>
        <td>{{$no++}}</td>
        <td>{{$a->kode}}</td>
        <td>{{$a->nama}}</td>
        <td>{{$a->alamat}}</td>
        <td>{{$a->hp}}</td>
        <td>
          <a href="{{ URL::asset('/pelanggan/'.$a->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
          <a href="{{ URL::asset('/pelanggan/'.$a->id.'/hapus') }}" class="btn btn-danger btn-sm"  
            onclick="return confirm('Apakah anda yakin data ini akan dihapus?');"> Hapus</a>
        </td>
        
          
        
      
      </tr>
      <?php
        }
      ?>     
      
</table>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- asset plugin datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
    $('#table').DataTable();
    });
</script>

</body>
</html>