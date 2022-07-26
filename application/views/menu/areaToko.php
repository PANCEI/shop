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
                            <td><?= $m['nama']  ?></td>
                            <td>
                                <a href="<?= base_url('config/areaSet') . "?idm=" . $m['id'] ?>&&id=<?= $_GET['id']  ?>" class=" badge badge-primary">Area Shipping</a>

                        </tr>

                    <?php
                        $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>