<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title  ?></h1>
                </div>

            </div>
            <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
            <a href="<?= base_url("config/addp") . "?id=" . $_GET['id'] ?>" class="btn btn-primary mb-3">
                Tambah Product
            </a>
        </div><!-- /.container-fluid -->


    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ecommerceToko" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Jumlah Barang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($barang as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama_barang']  ?> </td>
                                            <td><img src="<?= base_url("asset/dist/img/jualan/") . $t['gambar'] ?>" alt="" width="75"></td>
                                            <td><?= $t['harga']  ?></td>
                                            <td><?= $t['jumlah']  ?></td>
                                            <td>
                                                <a href="<?= base_url('config/setdiskonbarang' . "?id=" . $_GET['id']) . "&idj=" . $t['id']  ?>" class="badge badge-primary"> Set Diskon
                                                </a>
                                                <a href="<?= base_url('config/editjualan' . "?id=" . $_GET['id'] . "&idb=" . $t['id'])  ?>" class="badge badge-primary">Edit
                                                </a>
                                                <a href="<?= base_url('config/deletejualan') . "?id=" . $_GET['id']  ?>" class="badge badge-danger deletejualan" data-id="<?= $t['id']  ?>" data-gambar1="<?= $t['gambar1']  ?>" data-gambar2="<?= $t['gambar2']  ?>" data-gambar3="<?= $t['gambar3']  ?>" data-gambar4="<?= $t['gambar4']  ?>" data-gambar="<?= $t['gambar']  ?>">Hapus
                                                </a>
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
                                        <th>Harga</th>
                                        <th>Jumlah Barang</th>
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
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($barang as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama_barang']  ?> </td>

                                            <td><?= $t['harga']  ?></td>
                                            <td><?= $t['jumlah']  ?></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
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