<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title  ?></h1>
                </div>

            </div>
            <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
            <button type="button" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#exampleModal">
                Tambah Iklan
            </button>
        </div><!-- /.container-fluid -->
        <div class="conf" data-conf="<?= form_error("deskripsi")  ?>"></div>
        <div class="conff" data-conff="<?= $this->session->flashdata('Err');  ?>"></div>

    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Iklan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ecommerceToko" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($iklan as $t) : ?>
                                        <tr>
                                            <td><?= $i  ?></td>
                                            <td><img src="<?= base_url("asset/dist/img/iklan/") . $t['gambar'] ?>" alt="" width="75"></td>
                                            <td><?= $t['deskripsi']  ?></td>
                                            <td>
                                                <a href="<?= base_url()   ?>" class="badge badge-danger iklan" data-idm="<?= $_GET['id']  ?>" data-id="<?= $t['id']  ?>" data-gambar="<?= $t['gambar']  ?>">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
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
    <!-- modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Iklan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('config/iklan')  ?>?id=<?= $_GET['id']  ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col mb-2">
                            <textarea id="compose-textarea" class="form-control" style="height: 300px" name="deskripsi">

                    </textarea>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control" placeholder="Gambar Iklan" name="gambar" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>