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
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
            Daftar Toko Baru
        </button>

    </section>
    <div class="conf" data-conf="<?= form_error('email')  ?>"></div>
    <div class="req" data-text="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="warn" data-text="<?= $this->session->flashdata('warn');  ?>"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Toko</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ecommerceToko" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Nomor/Wa</th>
                                        <th>Jenis Jualan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($toko as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama']  ?> </td>
                                            <td><?= $t['email']  ?></td>
                                            <td><?= $t['alamat']  ?></td>
                                            <td><?= $t['numberPhone']  ?></td>
                                            <td><?= $t['jenis']  ?></td>
                                            <td><a href="<?= base_url('config/deleteToko') . "?id=" . $_GET['id']  ?>" class="badge badge-danger hapustoko" data-id='<?= $t['user_id'] ?>'>Hapus</a></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Nomor/Wa</th>
                                        <th>Jenis Jualan</th>
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
                            <h3 class="card-title">Laporan Toko</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Nomor/Wa</th>
                                        <th>Jenis Jualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($toko as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama']  ?> </td>
                                            <td><?= $t['email']  ?></td>
                                            <td><?= $t['alamat']  ?></td>
                                            <td><?= $t['numberPhone']  ?></td>
                                            <td><?= $t['jenis']  ?></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Nomor/Wa</th>
                                        <th>Jenis Jualan</th>
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
    <!-- /.content -->
    <!-- modal  -->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Toko</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('config')  ?>?id=<?= $_GET['id']  ?>" method="POST">
                    <div class="modal-body">
                        <div class=" form-group">
                            <input type="text" class="form-control" placeholder="Masukan Nama Toko" name="nama" autocomplete="off" autofocus required>
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" placeholder="Masukan Email" name="email" autocomplete="off" required>
                        </div>
                        <div class=" form-group">
                            <select name="id_jenis" id="sub" class="form-control" required>
                                <option value="">Pilih Jenis Jualan</option>
                                <?php foreach ($jualan as $s) : ?>
                                    <option value="<?= $s['id'] ?>"><?= $s['jenis']  ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="active" name="active" value="1" checked>
                                <label class="form-check-label" for="active">
                                    active
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->