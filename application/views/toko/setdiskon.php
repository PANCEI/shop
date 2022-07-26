<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul  ?></h1>
                </div>
            </div>
            <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Set Diskon</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="needs-validation " method="post" action="<?= base_url("config/setdiskonbarang") . "?id=" . $_GET['id'] . "&idj=" . $_GET['idj'] ?>">
                                <input type="hidden" name="id_jualan" value="<?= $jualan['id'] ?>">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="namabarang">Masukan diskon</label>
                                        <input type="text" class="form-control setdiskon" id="namabarang" required placeholder="Masukan Diskon" min="1" max="100" name="diskon">

                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="hargabarang">Harga Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" class="form-control harga" id="hargabarang" placeholder="Harga Barang" readonly name="harga" value="<?= $jualan['harga'] ?>">
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
                                            <input type="text" class="form-control diskon " id="Jumlahbarang" placeholder="Harga Barang Diskon" required name="jumlah diskon" readonly>
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
                                            <input type="text" class="form-control hargaakhir " id="Jumlahbarang" placeholder="Harga Barang Diskon" required name="jumlah akhir" readonly>
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
                                            <input type="date" class="form-control jumlahbarang" id="Jumlahbarang" placeholder="Masukan Jumlah Barang" required name="tanggal">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">

                                    <button class="btn btn-primary tmbhbrg" type="submit">Set Diskon</button>
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