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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="needs-validation tambahjualan" enctype="multipart/form-data" method="post" action="<?= base_url("config/editjualan") . "?id=" . $_GET['id'] . "&idb=" . $_GET['idb'] ?>">
                                <input type="hidden" name="id_jualan" value="<?= $_GET['idb'] ?>">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="namabarang">Nama Jualan</label>
                                        <input type="text" class="form-control" id="namabarang" required placeholder="Masukan Nama Jualan" name="nama_barang" value="<?= $jualan['nama_barang'] ?>">

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="hargabarang">Harga Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" class="form-control hargabarang" id="hargabarang" placeholder="Masukan Harga Barang" required name="harga" value="<?= $jualan['harga']  ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Jumlahbarang">Jumlah Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Jumlah</div>
                                            </div>
                                            <input type="text" class="form-control jumlahbarang" id="Jumlahbarang" placeholder="Masukan Jumlah Barang" required name="jumlah" value="<?= $jualan['jumlah'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md 6 mb-3">
                                        <div class="form-group row">
                                            <div class="col-lg-2">Gambar Barang</div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <img src="<?= base_url('asset') ?>/dist/img/jualan/<?= $jualan['gambar']  ?>  " alt="" class="img-thumbnail">
                                                    </div>
                                                    <div class=" custom-file col-lg-9">
                                                        <input type="file" class="custom-file-input gtk" id="foto" name="gambar" value="<?= $jualan['gambar'] ?>">
                                                        <label class="custom-file-label" for="foto">Choose Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md 6 mb-3">
                                        <div class="form-group row">
                                            <div class="col-lg-2">Sub Gambar</div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <img src="<?= base_url('asset') ?>/dist/img/subgambar/<?= $jualan['gambar1']  ?>" alt="" class="img-thumbnail">
                                                    </div>
                                                    <div class=" custom-file col-lg-9">
                                                        <input type="file" class="custom-file-input gtk" id="foto" name="gambar1" value="<?= $jualan['gambar'] ?>">
                                                        <label class="custom-file-label" for="foto">Choose Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md 6 mb-3">
                                        <div class="form-group row">
                                            <div class="col-lg-2">Sub Gambar</div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <img src="<?= base_url('asset') ?>/dist/img/subgambar/<?= $jualan['gambar2']  ?>" alt="" class="img-thumbnail">
                                                    </div>
                                                    <div class=" custom-file col-lg-9">
                                                        <input type="file" class="custom-file-input gtk" id="foto" name="gambar2" value="<?= $jualan['gambar'] ?>">
                                                        <label class="custom-file-label" for="foto">Choose Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md 6 mb-3">
                                        <div class="form-group row">
                                            <div class="col-lg-2">Sub Gambar</div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <img src="<?= base_url('asset') ?>/dist/img/subgambar/<?= $jualan['gambar3']  ?>" alt="" class="img-thumbnail">
                                                    </div>
                                                    <div class=" custom-file col-lg-9">
                                                        <input type="file" class="custom-file-input gtk" id="foto" name="gambar3" value="<?= $jualan['gambar'] ?>">
                                                        <label class="custom-file-label" for="foto">Choose Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group row">
                                            <div class="col-lg-2">Sub Gambar</div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <img src="<?= base_url('asset') ?>/dist/img/subgambar/<?= $jualan['gambar4']  ?>" alt="" class="img-thumbnail">
                                                    </div>
                                                    <div class=" custom-file col-lg-9">
                                                        <input type="file" class="custom-file-input gtk" id="foto" name="gambar4" value="<?= $jualan['gambar'] ?>">
                                                        <label class="custom-file-label" for="foto">Choose Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationTooltip03">Deskripsi</label>
                                        <textarea id="compose-textarea" class="form-control deskripsibarang" name="deskripsi">
<?= $jualan['deskripsi']  ?>
                                        </textarea>
                                    </div>
                                    <button class="btn btn-primary tmbhbrg" type="submit">Submit form</button>
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