<?php
include "header.php";
?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Penjualan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
            <div class="input-group-append">
            <button type="button" class="btn btn-primary btn-sm mt-2" onclick="window.print()">
                    Print
                </button>            
            </div>
        </div>
    </div>

    <div class="card-body">
    <?php 
    if(isset($_GET['pesan'])){
      if($_GET['pesan']=="simpan"){ ?>
      <div class="alert alert-success" role="alert">
        Data Berhasil Disimpan
      </div>
      <?php } elseif($_GET['pesan']=="update"){ ?>
        <div class="alert alert-success" role="alert">
          Data Berhasil Di Update
        </div>
        <?php } elseif($_GET['pesan']=="hapus"){ ?>
          <div class="alert alert-success" role="alert">
            Data Berhasil Di Hapus
          </div>
          <?php }
    } ?>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Total Harga</th>
                <th>Waktu</th>
                <th>Tanggal Update</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include '../koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");
            if (!$data) {
                // If there's an error in the query, display the error message
                die("Error in SQL query: " . mysqli_error($koneksi));
            }
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['PelangganID']; ?></td>
                <td><?php echo $d['NamaPelanggan']; ?></td>
                <td><?php echo $d['Alamat']; ?></td>
                <td><?php echo $d['NomorTelepon']; ?></td>
                <td>Rp. <?php echo $d['TotalHarga']; ?></td>
                <td><?php echo $d['TanggalPenjualan']; ?></td>
              <td><?php echo  date("d-m-Y H:i:s");?></td>
							
            </tr>            
            <?php } ?>
        </tbody>
    </table>
    </div>

<?php
include "footer.php";
?>
