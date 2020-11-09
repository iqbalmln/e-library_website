<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $data["jumlah_buku"] ?></h3>
                            
                            <p>Data Buku</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <a href="<?= BASEURL ?>/buku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $data["jumlah_anggota"] ?></h3>

                            <p>Data Anggota</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a href="<?= BASEURL ?>/anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $data["jumlah_peminjaman"] ?></h3>

                            <p>Peminjaman</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hand-holding"></i>
                        </div>
                        <a href="<?= BASEURL ?>/sirkulasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $data["jumlah_pengembalian"] ?></h3>

                            <p>Pengembalian</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-upload"></i>
                        </div>
                        <a style="cursor: pointer;" class="small-box-footer" data-toggle="modal" data-target="#exampleModal">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Riwayat Peminjaman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Peminjam</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Kembali</th>
                                        <th scope="col">Tanggal Dikembalikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $data["riwayat"] as $key=>$riwayat ) : ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $riwayat["nama"] ?></td>
                                        <td><?= $riwayat["judul_buku"] ?></td>
                                        <td><?= $riwayat["tanggal_pinjam"] ?></td>
                                        <td><?= $riwayat["tanggal_kembali"] ?></td>
                                        <td><?= $riwayat["tanggal_dikembalikan"] ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    const dashboardLink = document.getElementById("dashboardLink").querySelector(".nav-link")
    dashboardLink.classList.add("active")
</script>