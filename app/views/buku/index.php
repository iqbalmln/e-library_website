<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Table <small class="text-muted">Data Buku</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/">Home</a></li>
                        <li class="breadcrumb-item active">Data Buku</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-1">Table Buku</h3>
                            <a href="<?= BASEURL ?>/buku/create" class="btn btn-sm btn-primary float-right">
                                <i class="fas fa-plus mr-1"></i>
                                Tambah Buku
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun terbit</th>
                                        <th>Kelola</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $data["books"] as $key=>$book ) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $book["id_buku"] ?></td>
                                        <td><?= $book["judul_buku"] ?></td>
                                        <td><?= $book["pengarang"] ?></td>
                                        <td><?= $book["penerbit"] ?></td>
                                        <td><?= $book["th_terbit"] ?></td>
                                        <td>
                                            <a href="<?= BASEURL ?>/buku/edit/<?= $book["id_buku"] ?>" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a role="link" class="text-white btn btn-danger delete-link">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form method="POST"
                                            action="<?= BASEURL ?>/buku/delete/<?= $book["id_buku"] ?>"></form>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>  
<!-- /.content-wrapper -->

<script>
    const manageDataLink = document.getElementById("manageDataLink")
    const bukuLink = document.getElementById("bukuLink")
    manageDataLink.classList.add("menu-open")
    manageDataLink.querySelector(".nav-link").classList.add("active")
    bukuLink.querySelectorAll(".nav-link")[0].classList.add("active")

    const deleteLink = document.querySelectorAll(".delete-link")
    deleteLink.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault()

            if ( e.target.classList.contains("fas") ) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.parentElement.nextElementSibling.submit()
                    }
                })
            } else {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.nextElementSibling.submit()
                    }
                })
            }
        })
    })
</script>