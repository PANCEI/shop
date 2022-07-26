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
                            <h3 class="card-title">Pembeli</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ecommerceToko" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Toko</th>
                                        <th>Nama Pembeli</th>
                                        <th>Jumlah Pesanan</th>
                                        <th>Harga</th>
                                        <th>tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pesanan as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama_barang']  ?> </td>
                                            <td><?= $t['namatoko']  ?></td>
                                            <td><?= $t['nama']  ?></td>
                                            <td><?= $t['jumlahpesanan']  ?></td>
                                            <td><?= $t['harga']; ?></td>
                                            <td><?= $t['tanggal']; ?></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Toko</th>
                                        <th>Nama Pembeli</th>
                                        <th>Jumlah Pesanan</th>
                                        <th>Harga</th>
                                        <th>tanggal</th>
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