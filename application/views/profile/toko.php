<!-- Content Wrapper. Contains page content -->
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
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            Silahkan Lengkapi Profile Toko Anda Jika Ingin Menarik lebih Banyak Costemer
        </div>
    </div>
    <!-- alert for number phone if not same numeric -->
    <div class="warn" data-text="<?= $this->session->flashdata('warn');  ?>"></div>
    <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
    <!-- end alert -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('asset') ?>/dist/img/profile/<?= $user['gambar']  ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['nama']  ?></h3>

                            <p class="text-muted text-center"><?= $user['hak']  ?></p>

                            <ul class="list-group list-group-unbordered mb-3">

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i>Hak Akses</strong>

                            <p class="text-muted">
                                <?= $user['hak'] ?>
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> Email</strong>

                            <p class="text-muted">
                                <?= $user['email'] ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-phone mr-1"></i> Number</strong>

                            <p class="text-muted"><?= $user['numberPhone']  ?></p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i>Member Since</strong>

                            <p class="text-muted">
                                <?= date('d-F-Y', $user['created']) ?>
                            </p>

                            <hr>
                            <strong><i class="fab fa-instagram mr-1"></i>Instagram</strong>

                            <p class="text-muted">
                                <?= $info['instagram'] == null ? "Instagram Belum Di Set" : $info['instagram']; ?>
                            </p>

                            <hr>
                            <strong><i class="fab fa-facebook mr-1"></i>facebook</strong>

                            <p class="text-muted">
                                <?= $info['fb'] == null ? "Facebook Belum DI set" : $info['fb']; ?>
                            </p>

                            <hr>
                            <strong><i class="fas fa-info mr-1"></i>Describe Toko</strong>

                            <p class="text-muted">
                                <?= $info['describe_toko'] == null ? "Describe Toko Belum DI set" : $info['describe_toko']; ?>
                            </p>

                            <hr>
                            <strong><i class="fas fa-map mr-1"></i>Alamat</strong>

                            <p class="text-muted">
                                <?= $user['alamat'] == null ? "Alamat Toko Belum DI set" : $user['alamat']; ?>
                            </p>

                            <hr>

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                    <!-- CARD AREA SHIPPING  -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Area Shipping</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php foreach ($toko as $t) : ?>
                                <strong><i class="fas fa-shopping-cart mr-1"></i><?= $t['daerah']  ?>
                                    <input class="tokoArea" type="checkbox" data-url="<?= base_url() ?>" data-toko="<?= $info['id']  ?>" data-daerah="<?= $t['id']  ?>" <?= cekArea($info['id'], $t['id'])  ?>>
                                </strong>
                                <hr>
                            <?php endforeach; ?>



                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- END AREA SHIPPING  -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">

                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">


                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal setprofil" method="POST" action="<?= base_url('profile') . "?id=" . $_GET['id'] ?>" enctype="multipart/form-data">
                                                <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                                                <input type="hidden" name="id_toko" value="<?= $info['id'] ?>">
                                                <input type="hidden" name="oldgambar" value="<?= $user['gambar'] ?>">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName" placeholder="Name" value="<?= $user['nama']  ?>" name="nama" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?= $user['email'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="hak" class="col-sm-2 col-form-label">hak</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputEmail" placeholder="" value="<?= $user['hak'] ?>" readonly>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="hak" class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputEmail" placeholder="Masukan Alamat" value="<?= $user['alamat'] ?>" name="alamat">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="numberPhone" class="col-sm-2 col-form-label">Number Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control hp" id="numberPhone" placeholder="Number Phone" value="<?= $user['numberPhone'] ?>" name="numberPhone" required>
                                                        <?= form_error('numberPhone')  ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="numberPhone" class="col-sm-2 col-form-label">Facebook</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="numberPhone" placeholder="Facebook" value="<?= $info['fb'] ?>" name="fb" required>
                                                        <?= form_error('numberPhone')  ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="instagram" placeholder="Instagram" value="<?= $info['instagram'] ?>" name="instagram" required>
                                                        <?= form_error('numberPhone')  ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="compose-textarea" class="col-sm-2 col-form-label">Deskripsi Toko</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="compose-textarea" class="form-control desktoko" name="deskripsi">
                                        <?= $info['describe_toko'] == null ? "" : $info['describe_toko'] ?>
                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-2">Foto</div>
                                                    <div class="col-lg-10">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <img src="<?= base_url('asset') ?>/dist/img/profile/<?= $user['gambar']  ?>  " alt="" class="img-thumbnail">
                                                            </div>
                                                            <div class=" custom-file col-lg-9">
                                                                <input type="file" class="custom-file-input" id="foto" name="gambar">
                                                                <label class="custom-file-label" for="foto">Choose Image</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
    </section>