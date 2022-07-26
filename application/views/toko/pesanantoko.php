<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title  ?></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
        <div class="req" data-text="<?= $this->session->flashdata('message'); ?>"></div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pesanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ecommerceToko" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>Pembeli</th>
                                        <th>Jumalah Pembelian</th>
                                        <th>Harga</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pesanan as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama_barang']  ?> </td>
                                            <td><?= $t['pembeli']; ?></td>
                                            <td><?= $t['jumlahpesanan']  ?></td>
                                            <td><?= $t['harga']  ?></td>
                                            <td><?= $t['tanggal']  ?></td>
                                            <td></td>
                                            <td>
                                                <a href="<?= base_url('config/deletepesanan') . "?id=" . $_GET['id']  ?>" class="badge badge-danger deletepesanan" data-id="<?= $t['id'] ?>">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>Pembeli</th>
                                        <th>Jumalah Pembelian</th>
                                        <th>Harga</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
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
                                        <th>Pembeli</th>
                                        <th>Jumalah Pembelian</th>
                                        <th>Harga</th>
                                        <th>Tanggal</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pesanan as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama_barang']  ?> </td>
                                            <td><?= $t['pembeli']  ?> </td>
                                            <td><?= $t['jumlahpesanan']  ?></td>
                                            <td><?= $t['harga']  ?> </td>

                                            <td><?= $t['tanggal']  ?></td>

                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>Pembeli</th>
                                        <th>Jumalah Pembelian</th>
                                        <th>Harga</th>
                                        <th>Tanggal</th>

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