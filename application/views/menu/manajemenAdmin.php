<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title  ?></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
            Daftar Admin Baru
        </button>
    </section>

    <div class="conf" data-conf="<?= form_error('email')  ?>"></div>
    <div class="req" data-text="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="warn" data-text="<?= $this->session->flashdata('warn');  ?>"></div>
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
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($admin as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama']  ?> </td>
                                            <td><?= $t['email']  ?></td>
                                            <td><?= $t['alamat']  ?></td>
                                            <td><?= $t['numberPhone']  ?></td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input admin " type="checkbox" <?= activeMenu($t['active'])  ?> data-id="<?= $t['id'] ?>" data-nama="<?= $t['nama'] ?>" data-active="<?= $t['active'] ?>" data-base="<?= base_url() ?>" data-hak="<?= $_GET['id']  ?>">
                                                </div>
                                            </td>
                                            <td><a href="<?= base_url('menu/deleteadmin') . "?id=" . $_GET['id']  ?>" class="badge badge-danger deleteadmin" data-id="<?= $t['id'] ?>" data-nama="<?= $t['nama'] ?>">Hapus</a></td>
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
                                        <th>Active</th>
                                        <th>Action</th>
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
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form novalidate action="<?= base_url('menu/admin')  ?>?id=<?= $_GET['id']  ?>" method="POST" class="tambahAdmin">
                    <div class="modal-body">
                        <div class=" form-group">
                            <input type="text" class="form-control" placeholder="Masukan Nama Admin" name="nama" autocomplete="off" autofocus required>
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" placeholder="Masukan Email" name="email" autocomplete="off" required>
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" placeholder="Masukan Alamat" name="alamat" autocomplete="off" required>
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control hp" placeholder="Masukan Nomor Hp " name="numberPhone" autocomplete="off" required>
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