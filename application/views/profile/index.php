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

    </div>
    <!-- alert for number phone if not same numeric -->
    <div class="warn" data-text="<?= $this->session->flashdata('warn');  ?>"></div>
    <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
    <div class="conf" data-conf="<?= form_error('numberPhone')  ?>"></div>
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


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
                                            <form class="form-horizontal" method="POST" action="<?= base_url('profile') . "?id=" . $_GET['id'] ?>" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
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
                                                    <label for="numberPhone" class="col-sm-2 col-form-label">Number Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="numberPhone" placeholder="Number Phone" value="<?= $user['numberPhone'] ?>" name="numberPhone" required>
                                                        <?= form_error('numberPhone')  ?>
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