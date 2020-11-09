<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data <small class="text-muted">Data Anggota</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/anggota">Data Anggota</a></li>
                        <li class="breadcrumb-item active">Edit Anggota</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Anggota</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?= BASEURL ?>/anggota/update/<?= $data["member"]["id_anggota"] ?>" method="POST">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="id_anggota">ID Anggota</label>
                                    <input type="text" name="id_anggota" id="id_anggota" class="form-control" value="<?= $data["member"]["id_anggota"] ?>" placeholder="A003" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Anggota</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $data["member"]["nama"] ?>" placeholder="Nama Anggota">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="lk" id="lk"
                                        <?= $data["member"]["jk"] == "LK" ? "checked" : "" ?>>
                                        <label class="form-check-label" for="lk">Laki Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="pr" id="pr" 
                                        <?= $data["member"]["jk"] == "PR" ? "checked" : "" ?>>
                                        <label class="form-check-label" for="pr">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat (Opsional)" maxlength="50"><?= $data["member"]["alamat"] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="tel" name="no_hp" class="form-control" id="no_hp" value="<?= $data["member"]["no_hp"] ?>" placeholder="0812-9000-9000" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= BASEURL ?>/anggota" class="btn btn-warning text-white">Batal</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->