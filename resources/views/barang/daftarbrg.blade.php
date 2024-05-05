 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>nama</th>
                    <th>satuan</th>
                    <th>Sawal</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;

                    foreach ($tabelbarang as $a){
                  ?>
                  <tr>
                      <td>{{$no++}}</td>
                      <td>{{$a->kode}}</td>
                      <td>{{$a->nama}}</td>
                      <td>{{$a->namasatuan}}</td>
                      <td>{{$a->sawal}}</td>
                      <td>{{$a->hb}}</td>
                      <td>{{$a->hj}}</td>
                      <td>
                        <a href="{{ URL::asset('/barang/'.$a->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ URL::asset('/barang/'.$a->id.'/hapus') }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin data ini akan dihapus?');">Hapus</a>
                      </td>
                  </tr>
                  </tr>
                    <?php
                      }
                    ?>    
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>