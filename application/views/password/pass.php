<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title  ?></h1>
                </div>
            </div>
            <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
            <div class="warn" data-text="<?= $this->session->flashdata('warning');  ?>"></div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Password</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="needs-validation pass" autocomplete="off" method="post" action="<?= base_url("password") . "?id=" . $_GET['id'] ?>">

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="namabarang">Masukan Massword Baru</label>
                                        <input type="password" class="form-control newpass" id="namabarang" required placeholder="Masukan Password Baru " name="newpass" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="namabarang">Ulangi Password Baru</label>
                                        <input type="password" class="form-control repeatpass" id="namabarang" required placeholder="Ulangi Password baru" autocomplete="off">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="namabarang">Masukan Password Lama</label>
                                        <input type="password" class="form-control " id="namabarang" required placeholder="Masukan Password Lama " name="old" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-row">

                                    <button class="btn btn-primary tmbhbrg" type="submit">Ubah Password</button>
                            </form>
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