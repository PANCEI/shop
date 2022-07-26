<!-- Content Wrapper. Contains page content -->
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
    <!-- /.content-header -->
    <div class="col-sm-7">
        <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>

        <!-- modal  -->
        <button type="button" class="btn btn-primary mb-3 ml-2" data-toggle="modal" data-target="#exampleModal">
            Tambah Submenu
        </button>
        <!-- end modal -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sub menu</th>
                    <th scope="col">Urutan</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($menu as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i  ?></th>
                        <td><?= $m['nama']  ?></td>
                        <td><?= $m['urutan']  ?></td>
                        <td>

                            <a href="<?= base_url('menu/menudelete') . "?idM=" . $m['id'] ?>&&id=<?= $_GET['id']  ?>" class="badge badge-danger hapus" style="cursor: pointer;">Delete</a>
                        </td>
                    </tr>

                <?php
                    $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- modal card  -->
    <!-- modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu')  ?>?id=<?= $_GET['id']  ?>" method="POST">
                    <div class="modal-body">
                        <div class="col mb-2">
                            <input type="text" class="form-control" placeholder="Masukan Menu" name="sub" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Masukan Urutan Menu Menu" name="urutan" required value="1">
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
    <!-- akhir modal card  -->