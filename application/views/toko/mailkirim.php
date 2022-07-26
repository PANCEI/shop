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
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Kirim Email</h3>
                    </div>
                    <!-- /.card-header -->
                    <form method="POST" class="kirimeamil">
                        <div class="card-body">
                            <div class="form-group">
                                <select name="email" id="email" class="form-control" required>
                                    <option value="">Pilih Email Toko</option>
                                    <?php foreach ($email as $s) : ?>
                                        <option value="<?= $s['email'] ?>"><?= $s['email']  ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Subject:" name="subject" required>
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" class="form-control pesan" style="height: 300px" name="pesan">
                    </textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                            </div>

                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>