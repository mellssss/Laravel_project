<!DOCTYPE html>
<html>
<head>
   <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<title>Tabel Satuan</title>
</head>
<body> 
    <div class="container">

    <h1 class = "mt-4">Tabel Satuan</h1><hr>

    <table class="table table-bordered table-hover mt-3">
      <th>No</th>
      <th>ID</th>
      <th>nama</th>
      <th>Aksi</th>
      
      <?php
        $no=1;

        foreach ($tabelsatuan as $a){
      ?>
      <tr>
        <td>{{$no++}}</td>
        <td>{{$a->id}}</td>
        <td>{{$a->nama}}</td>
        <td>
          <a href="{{ URL::asset('/barang/'.$a->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
          <a href="{{ URL::asset('/barang/'.$a->id.'/hapus') }}" class="btn btn-danger btn-sm">Hapus</a>
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