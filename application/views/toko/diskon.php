<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title  ?></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Barang Diskon</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ecommerceToko" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>Gambar</th>
                                        <th>diskon</th>
                                        <th>Harga</th>
                                        <th>Harga AKhir</th>
                                        <th>Jenis</th>
                                        <th>Akhir Diskon</th>
                                        <th>Nama Toko</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($diskon as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama_barang']  ?> </td>
                                            <td><img src="<?= base_url("asset/dist/img/jualan/") . $t['gambar'] ?>" alt="" width="75"></td>
                                            <td><?= $t['diskon']  ?></td>
                                            <td><?= $t['harga']  ?></td>
                                            <td><?= $t['harga_akhir']  ?></td>
                                            <td><?= $t['jenis']  ?></td>
                                            <td><?= $t['tanggal']  ?></td>
                                            <td><?= $t['toko']  ?></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>Gambar</th>
                                        <th>diskon</th>
                                        <th>Harga</th>
                                        <th>Harga AKhir</th>
                                        <th>Jenis</th>
                                        <th>Akhir Diskon</th>
                                        <th>Nama Toko</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Laporan Barang Jualan E-commerce</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>diskon</th>
                                        <th>Harga</th>
                                        <th>Harga AKhir</th>
                                        <th>Jenis</th>
                                        <th>Akhir Diskon</th>
                                        <th>Nama Toko</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($diskon as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama_barang']  ?> </td>
                                            <td><?= $t['diskon']  ?> </td>
                                            <td><?= $t['harga']  ?></td>
                                            <td><?= $t['harga_akhir']  ?> </td>
                                            <td><?= $t['jenis']  ?> </td>
                                            <td><?= $t['tanggal']  ?></td>
                                            <td><?= $t['toko']  ?></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>diskon</th>
                                        <th>Harga</th>
                                        <th>Harga AKhir</th>
                                        <th>Jenis</th>
                                        <th>Akhir Diskon</th>
                                        <th>Nama Toko</th>
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
        </div>
        <!-- /.container-fluid -->
    </section>