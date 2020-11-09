<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data <small class="text-muted">Data Pengguna</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/user">Data Pengguna</a></li>
                        <li class="breadcrumb-item active">Edit Pengguna</li>
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
                            <h3 class="card-title">Edit Pengguna</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?= BASEURL ?>/user/update/<?= $data["user"]["id_user"] ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $data["user"]["username"] ?>" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?= $data["user"]["email"] ?>" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="" selected disabled hidden>Select Level</option>
                                        <option value="superadmin" <?= $data["user"]["level"] == "superadmin" ? "selected" : "" ?>>Superadmin</option>
                                        <option value="admin" <?= $data["user"]["level"] == "admin" ? "selected" : "" ?>>Admin</option>
                                    </select>
                                </div>
                                <img style="object-fit: cover;" 
                                src="<?= BASEURL ?>/img/<?= $data["user"]["foto"] == "avatar.png" ? "{$data["user"]['foto']}" : "uploaded/{$data["user"]['foto']}" ?>" 
                                width="50" height="50">
                                <label for="foto" class="ml-3">Pilih Foto</label>
                                <div class="custom-file mt-3">
                                    <input type="file" name="foto" class="custom-file-input" id="foto">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= BASEURL ?>/user" class="btn btn-warning text-white">Batal</a>
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