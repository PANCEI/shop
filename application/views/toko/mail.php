<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title  ?></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="req" data-text="<?= $this->session->flashdata('message');  ?>"></div>
                <div class="warn" data-text="<?= $this->session->flashdata('warn');  ?>"></div>
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
                                    <i class="fas fa-inbox"></i> Sent

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
                        <h3 class="card-title">Sent</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail" id="cari" onkeyup="">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm hapusemail">
                                    <i class="far fa-trash-alt"></i>
                                </button>

                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm refresh">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <!-- /.float-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped" id="mailTable">
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pesan as $p) : ?>
                                        <tr>
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="<?= $p['id'] ?>" id="check<?= $i; ?>">
                                                    <label for="check<?= $i; ?>"></label>
                                                </div>
                                            </td>
                                            <td class="mailbox-name"><a href="<?= base_url('config/readmail' . "?id=" . $_GET['id'] . "&ide=" . $p['id']) ?>"><?= $p['nama']; ?></a></td>
                                            <td class="mailbox-subject"><?= $p['pesan']; ?>
                                            </td>
                                            <td class="mailbox-attachment"></td>

                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer p-0">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                <i class="far fa-square"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm hapusemail">
                                    <i class="far fa-trash-alt"></i>
                                </button>


                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm refresh">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <!-- /.float-right -->
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>