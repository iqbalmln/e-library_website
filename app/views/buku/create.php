<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data <small class="text-muted">Data Buku</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/buku">Data Buku</a></li>
                        <li class="breadcrumb-item active">Tambah Buku</li>
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
                            <h3 class="card-title">Tambah Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?= BASEURL ?>/buku/store" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_buku">ID Buku</label>
                                    <input type="text" name="id_buku" id="id_buku" class="form-control" placeholder="B005">
                                </div>
                                <div class="form-group">
                                    <label for="judul_buku">Judul Buku</label>
                                    <input type="text" name="judul_buku" class="form-control" id="judul_buku" placeholder="Judul Buku">
                                </div>
                                <div class="form-group">
                                    <label for="pengarang">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Pengarang">
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Penerbit">
                                </div>
                                <div class="form-group">
                                    <label for="th_terbit">Tahun Terbit</label>
                                    <input type="text" name="th_terbit" class="form-control" id="th_terbit" placeholder="Tahun Terbit">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-warning text-white">Batal</button>
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