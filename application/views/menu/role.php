<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Role</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- awal table  -->
    <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
    <div class="col-sm-8">
        <h5 class=" text-capitalize">role: <?= $single['hak'] ?></h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sub menu</th>
                    <th scope="col">Action</th>

                    <?php

                    $i = 1;
                    foreach ($menu as $m) : ?>
                        <?php if ($m['nama'] != "Menu") : ?>
                <tr>
                    <th scope="row"><?= $i  ?></th>
                    <td><?= $m['nama']  ?></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input menuCheck " type="checkbox" <?= checkMenu($single['id'], $m['id'])  ?> data-role="<?= $single['id']  ?>" data-menuid="<?= $m['id']  ?>" data-url=<?= base_url()  ?> data-id="<?= $_GET['id']  ?>">

                        </div>
                    </td>
                </tr>
            <?php endif; ?>


        <?php
                        $i++;
                    endforeach; ?>
        </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <!-- akhir table -->