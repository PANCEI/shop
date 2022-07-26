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
                                    <?php foreach ($pembeli as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><?= $t['nama']  ?> </td>
                                            <td><?= $t['email']  ?></td>
                                            <td><?= $t['alamat']  ?></td>
                                            <td><?= $t['numberPhone']  ?></td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input pembeli " type="checkbox" <?= activeMenu($t['active'])  ?> data-id="<?= $t['id'] ?>" data-nama="<?= $t['nama'] ?>" data-active="<?= $t['active'] ?>" data-base="<?= base_url() ?>" data-hak="<?= $_GET['id']  ?>">
                                                </div>
                                            </td>
                                            <td><a href="<?= base_url('menu/deletepembeli') . "?id=" . $_GET['id']  ?>" class="badge badge-danger deletepembeli" data-id="<?= $t['id'] ?>" data-nama="<?= $t['nama'] ?>">Hapus</a></td>
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