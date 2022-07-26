<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title  ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- table  -->
    <!-- tombol tambbh akses -->
    <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
    <button type="button" class="btn btn-primary mb-3 ml-2" data-toggle="modal" data-target="#exampleModal">
        Tambah Akses
    </button>
    <!-- akhir tombol tambah akses -->
    <div class="col-sm-7">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Akses</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php

                $i = 1;
                foreach ($menu as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i  ?></th>
                        <td><?= $m['jenis']  ?></td>
                        <td>
                            <button class=" badge badge-info" data-toggle="modal" data-target="#exampleModal<?= $m['id']  ?>">Edit</button>
                            <a href="<?= base_url();  ?>" data-id="<?= $m['id']  ?>" data-idm=<?= $_GET['id']  ?> class="badge badge-danger jenis">delete</a>
                        </td>
                    </tr>
                    <!-- modal -->
                    <div class="modal fade" id="exampleModal<?= $m['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Change <?= $m['jenis']  ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('menu/editJenis/') . $m['id'] . "?id=" . $_GET['id']  ?>" method="POST">

                                    <div class="modal-body">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Masukan Menu" name="jenis" required value="<?= $m['jenis'] ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary ubah">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- akhir modal -->
                <?php
                    $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- end table -->
    <!-- modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Akses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/jenis') . "?id=" . $_GET['id'] ?>" method="POST">
                    <div class="modal-body">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Masukan Menu" name="jenis" required>
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
    <!-- akhir modal  -->