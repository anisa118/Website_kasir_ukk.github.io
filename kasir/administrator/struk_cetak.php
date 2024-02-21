<?php
include '../koneksi.php';


    // Query untuk mendapatkan informasi pelanggan dan pembelian
    $query = "SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID = penjualan.PelangganID";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($koneksi));
    }

    // Memeriksa apakah ada hasil dari query
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Struk Pembayaran</title>
            <style>
                /* CSS untuk styling struk */
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    width: 300px;
                    margin: auto;
                    border: 1px solid #000;
                    padding: 10px;
                    background-color: #fff;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                .header,
                .footer {
                    text-align: center;
                }

                .header img {
                    max-width: 100px;
                    margin-bottom: 10px;
                }

                .header h2 {
                    margin: 5px 0;
                    font-size: 20px;
                }

                .table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 10px;
                }

                .table th,
                .table td {
                    border: none;
                    padding: 5px;
                    text-align: left;
                }

                .table th {
                    background-color: #f2f2f2;
                }

                .separator {
                    border-bottom: 1px solid #000;
                    margin: 10px 0;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <div class="header">
                    <h2>Struk Pembayaran</h2>
                </div>
                <table class="table">
                    <tr>
                        <th>ID Pelanggan</th>
                        <td><?php echo $row['PelangganID']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <td><?php echo $row['NamaPelanggan']; ?></td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td><?php echo $row['NomorTelepon']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $row['Alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Total Pembelian</th>
                        <td>Rp. <?php echo $row['TotalHarga']; ?></td>
                    </tr>
                </table>
                <div class="separator"></div>
                <div class="footer">
                    <p>Terima kasih telah berbelanja di Toko Ana!</p>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        echo "Data pelanggan tidak ditemukan.";
    }

mysqli_close($koneksi);
?>
