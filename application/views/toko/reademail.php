<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul  ?></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
                <div class="url" data-url="<?= base_url('config/emaildelete' . "?id=" . $_GET['id']) ?>"></div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Folders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="<?= base_url("config/mail" . "?id=" . $_GET['id']) ?>" class="nav-link">
                                    <i class="fas fa-inbox"></i>Sent

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('config/mailkirim' . "?id=" . $_GET['id']) ?>" class="nav-link">
                                    <i class="far fa-envelope"></i> Send
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Baca Mail</h3>

                        <div class="card-tools">
                            <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <h5>Subject: <?php echo $pesan['subject'] ?></h5>
                            <h6>To: <?= $pesan['email']; ?>

                            </h6>
                        </div>
                        <!-- /.mailbox-read-info -->

                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <?= $pesan['pesan']; ?>
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </section>