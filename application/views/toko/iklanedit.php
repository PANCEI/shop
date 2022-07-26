<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title  ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            Edit Iklan
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">


                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" method="POST" action="<?= base_url('config/iklanedit') . "?id=" . $_GET['id'] ?>" enctype="multipart/form-data">

                                                <div class="form-group row">
                                                    <label for="numberPhone" class="col-sm-2 col-form-label">Deskripsi</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="compose-textarea" class="form-control" style="height: 300px" name="deskripsi">
</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-2">Foto</div>
                                                    <div class="col-lg-10">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <img src="<?= base_url('asset') ?>/dist/img/<?= $user['gambar']  ?>  " alt="" class="img-thumbnail">
                                                            </div>
                                                            <div class=" custom-file col-lg-9">
                                                                <input type="file" class="custom-file-input" id="foto" name="foto">
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