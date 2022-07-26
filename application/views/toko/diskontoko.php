<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title  ?></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="req" data-text="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        Diskon hanya Di Tampilkan Di dalam E-commerce dengan rentang waktu antara hari ini dan Tujuh hari ke depan
                    </div>
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
                                        <th>Akhir Diskon</th>
                                        <th>Action</th>
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
                                            <td><?= $t['tanggal']  ?></td>
                                            <td>
                                                <a href="<?= base_url('config/editdiskon') . "?id=" . $_GET['id'] . "&idd=" . $t['id']  ?>" class="badge badge-primary">Edit</a>
                                                <a href="<?= base_url('config/deletediskon') . "?id=" . $_GET['id']  ?>" class="badge badge-danger deletediskon" data-id="<?= $t['id'] ?>">Hapus</a>
                                            </td>
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

                                        <th>Akhir Diskon</th>

                                        <th>Action</th>
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
                                        <th>Harga Akhir</th>

                                        <th>Akhir Diskon</th>

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

                                            <td><?= $t['tanggal']  ?></td>

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

                                        <th>Akhir Diskon</th>

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