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
    <!-- alert swwet -->
    <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
    <!-- end alert -->
    <!-- button modal  -->
    <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModal">
        Tambah Sub Menu
    </button>
    <!-- end button modal  -->
    <!-- table -->
    <div class="col-sm-12 mt-2 " style="overflow: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Url</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Sub Menu</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($menu as $m) :
                ?>
                    <?php if ($m['menu'] != "Sub Menu Management") : ?>
                        <tr>
                            <th scope="row"><?= $i;  ?></th>
                            <td><?= $m['menu'];  ?></td>
                            <td><?= $m['url'];  ?></td>
                            <td><?= $m['icon'];  ?></td>
                            <td><?= $m['nama'];  ?></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input subMenu " type="checkbox" <?= activeMenu($m['active'])  ?> data-menuid="<?= $m['id']  ?>" data-base="<?= base_url()  ?>" data-cek="<?= $m['active']  ?>" data-menu="<?= $_GET['id']  ?>">

                                </div>
                            </td>
                            <td>
                                <button class=" badge badge-info" data-toggle="modal" data-target="#exampleModal<?= $m['id']  ?>">Edit</button>
                                <a href="<?= base_url('menu/Subdelete/') . $m['id'] . "?id=" . $_GET['id'] ?>" class="badge badge-danger hapus">hapus</a>
                            </td>
                        </tr>
                        <!-- modal edit -->
                        <div class="modal fade" id="exampleModal<?= $m['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Sub Menu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="<?= base_url('menu/editsub')  ?>?id=<?= $_GET['id']  ?>">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $m['id'] ?>">
                                            <div class=" form-group">
                                                <input type="text" class="form-control" placeholder="Masukan Menu" name="menu" autocomplete="off" value="<?= $m['menu'] ?>">
                                            </div>
                                            <div class=" form-group">
                                                <input type="text" class="form-control" placeholder="Masukan Icon" name="icon" autocomplete="off" required value="<?= $m['icon'] ?>">
                                            </div>
                                            <div class=" form-group">
                                                <select name="sub" id="sub" class="form-control" required>
                                                    <option value="<?= $m['sub']  ?>"><?= $m['nama'] ?></option>
                                                    <?php foreach ($sub as $s) : ?>
                                                        <option value="<?= $s['id'] ?>"><?= $s['nama']  ?></option>
                                                    <?php endforeach; ?>
                                                </select>
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
                        <!-- akhir modal edit -->
                    <?php endif; ?>

                <?php
                    $i++;
                endforeach;
                ?>
            </tbody>
        </table>

    </div>
    <!-- end table hover  -->
    <!-- Awal Modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('menu/sub')  ?>?id=<?= $_GET['id']  ?>">
                    <div class="modal-body">
                        <div class=" form-group">
                            <input type="text" class="form-control" placeholder="Masukan Menu" name="menu" autocomplete="off">
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" placeholder="Masukan url" name="url" autocomplete="off" required>
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" placeholder="Masukan Icon" name="icon" autocomplete="off" required>
                        </div>
                        <div class=" form-group">
                            <select name="sub" id="sub" class="form-control" required>
                                <option value="">Pilih Sub Menu</option>
                                <?php foreach ($sub as $s) : ?>
                                    <option value="<?= $s['id'] ?>"><?= $s['nama']  ?></option>
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
        </div>
    </div>
    <!-- akhir msal -->