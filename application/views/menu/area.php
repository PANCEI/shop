<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title  ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
    <div class="warn" data-text="<?= $this->session->flashdata('warn');  ?>"></div>
    <button type="button" class="btn btn-primary mb-3 ml-2" data-toggle="modal" data-target="#exampleModal">
        Tambah Area Penjualan
    </button>

    <!-- end modal -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Area Penjualan</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($area as $m) : ?>
                <tr>
                    <th scope="row"><?= $i  ?></th>
                    <td><?= $m['daerah']  ?></td>
                    <td>

                        <a href="<?= base_url('config/areadelete') . "?id=" . $_GET['id'] ?>" class="badge badge-danger hapusarea" style="cursor: pointer;" data-id="<?= $m['id']  ?>">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Area Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('config/areatambah')  ?>?id=<?= $_GET['id']  ?>" method="POST" class="areaform">
                <div class="modal-body">
                    <div class="col mb-2">
                        <select name="sub" id="sub" class="form-control" required>
                            <option value="">Pilih Sub Menu</option>
                            <?php foreach ($available as $s) : ?>
                                <?php foreach ($area as $a) : ?>
                                    <?php if ($s['kode'] == $a['kode']) : ?>
                                        <?php break; ?>
                                    <?php else : ?>
                                        <option value="<?= $s['kode'] ?>"><?= $s['daerah']  ?></option>
                                        <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary area">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- akhir modal card  -->