<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data <small class="text-muted">Data Sirkulasi</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/sirkulasi">Data Sirkulasi</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
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
                            <h3 class="card-title">Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?= BASEURL ?>/sirkulasi/store" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_sirkulasi">ID Sirkulasi</label>
                                    <input type="text" class="form-control" name="id_sirkulasi" id="id_sirkulasi" placeholder="B005">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Peminjam</label>
                                    <select class="form-control" id="nama" name="id_anggota">
                                        <option value="" disabled selected hidden>Pilih Peminjam</option>
                                        <?php foreach ( $data["data_anggota"] as $anggota ) : ?>
                                        <option value="<?= $anggota["id_anggota"] ?>"><?= $anggota["id_anggota"] ?> - <?= $anggota["nama"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="buku">Judul Buku</label>
                                    <select class="form-control" id="buku" name="id_buku">
                                        <option value="" disabled selected hidden>Pilih Buku</option>
                                        <?php foreach ( $data["data_buku"] as $buku ) : ?>
                                        <option value="<?= $buku["id_buku"] ?>"><?= $buku["id_buku"] ?> - <?= $buku["judul_buku"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= BASEURL ?>/sirkulasi" class="btn btn-warning text-white">Batal</a>
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