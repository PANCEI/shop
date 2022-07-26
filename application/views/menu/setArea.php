<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $judul  ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
    <table class="table table-hover col-sm-8">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Area</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($menu as $m) : ?>
                <tr>
                    <th scope="row"><?= $i  ?></th>
                    <td><?= $m['daerah']  ?></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input areaCheck " type="checkbox" <?= cekArea($_GET['idm'], $m['id'])  ?> data-role="<?= $_GET['idm']  ?>" data-menuid="<?= $m['id']  ?>" data-url=<?= base_url()  ?> data-id="<?= $_GET['id']  ?>">

                        </div>
                    </td>
                </tr>

            <?php
                $i++;
            endforeach; ?>
        </tbody>
    </table>
</div>