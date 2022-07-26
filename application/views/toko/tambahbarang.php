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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="needs-validation tambahjualan" enctype="multipart/form-data" method="post" action="<?= base_url("config/addp") . "?id=" . $_GET['id']  ?>">
                                <input type="hidden" name="id_toko" value="<?= $toko['id'] ?>">
                                <input type="hidden" name="id_jenis" value="<?= $toko['id_jenis']  ?>">
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="namabarang">Nama Jualan</label>
                                        <input type="text" class="form-control" id="namabarang" required placeholder="Masukan Nama Jualan" name="nama_barang">

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="hargabarang">Harga Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" class="form-control hargabarang" id="hargabarang" placeholder="Masukan Harga Barang" required name="harga">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="Jumlahbarang">Jumlah Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Jumlah</div>
                                            </div>
                                            <input type="text" class="form-control jumlahbarang" id="Jumlahbarang" placeholder="Masukan Jumlah Barang" required name="jumlah">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="gambartoko">Foto Barang</label>
                                        <input type="file" class="form-control gambartoko" id="gambartoko" required name="gambar">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="subgambar1">Sub Gambar1</label>
                                        <input type="file" class="form-control subgambar1" id="subgambar1" required disabled name="gambar1">

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="subgambar2">Sub Gambar2</label>
                                        <input type="file" class="form-control subgambar2" id="subgambar" required disabled name="gambar2">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="subgambar3">Sub Gambar 3</label>
                                        <input type="file" class="form-control subgambar3" id="subgambar3" required disabled name="gambar3">

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="subgambar4">Sub Gambar4</label>
                                        <input type="file" class="form-control subgambar4 " id="subgambar4" required disabled name="gambar4">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationTooltip03">Deskripsi</label>
                                        <textarea id="compose-textarea" class="form-control deskripsibarang" name="deskripsi"></textarea>
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