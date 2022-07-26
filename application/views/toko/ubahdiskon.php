<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul  ?></h1>
                </div>
            </div>
            <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
            <div class="warn" data-text="<?= $this->session->flashdata('warn');  ?>"></div>
        </div><!-- /.container-fluid -->

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Diskon</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="needs-validation ubahdiskon" method="post" action="<?= base_url("config/editdiskon") . "?id=" . $_GET['id'] . "&idd=" . $_GET['idd'] ?>">
                                <input type="hidden" name="id" value="<?= $diskon['id'] ?>">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="namabarang">Masukan diskon</label>
                                        <input type="text" class="form-control setdiskon" id="namabarang" required placeholder="Masukan Diskon" min="1" max="100" name="diskon" value=" <?= $diskon['diskon']  ?>">

                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="hargabarang">Harga Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" class="form-control harga" id="hargabarang" placeholder="Harga Barang" readonly name="harga" value="<?= $diskon['harga'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="Jumlahbarang">Harga Diskon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" class="form-control diskon " id="Jumlahbarang" placeholder="Harga Barang Diskon" required name="jumlah diskon" readonly value="<?= $diskon['harga_diskon'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="Jumlahbarang">Harga akhir</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" class="form-control hargaakhir " id="Jumlahbarang" placeholder="Harga Barang Diskon" required name="jumlah akhir" readonly value="<?= $diskon['harga_akhir'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="Jumlahbarang">Tanggal</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Date</div>
                                            </div>
                                            <input type="date" class="form-control tanggaldiskon" id="Jumlahbarang" placeholder="Masukan Jumlah Barang" name="tanggal" value="<?= $diskon['tanggal'] ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">

                                    <button class="btn btn-primary tmbhbrg" type="submit">Ubah Diskon</button>
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