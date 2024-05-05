<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Mahasiswa</h3>
                <p class="text-subtitle text-muted">Informasi data <?= $this->uri->segment(2) ?>.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $this->uri->segment(3) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-lg table-hover mb-0">
                                <?php
                                foreach ($detail as $dt) : ?>
                                    <tr>
                                        <th>NIM</th>
                                        <td>:</td>
                                        <td><?php echo $dt->nim ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>:</td>
                                        <td><?php echo $dt->nama_lengkap ?></td>
                                    </tr>
                                    <tr>
                                        <th>alamat</th>
                                        <td>:</td>
                                        <td><?php echo $dt->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td><?php echo $dt->email ?></td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td>:</td>
                                        <td><?php echo $dt->telepon ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td>:</td>
                                        <td><?php echo $dt->tempat_lahir ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal lahir</th>
                                        <td>:</td>
                                        <td><?php echo $dt->tanggal_lahir ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamim</th>
                                        <td>:</td>
                                        <td><?php echo $dt->jenis_kelamin ?></td>
                                    </tr>
                                    <tr>
                                        <th>Program Studi</th>
                                        <td>:</td>
                                        <td><?php echo $dt->nama_prodi ?></td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex m-3"> <?php echo anchor('admin/mahasiswa', '<button type="button" class="btn btn-warning btn-sm me-1 mb-1">Kembali</button>') ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="card shadow">
                    <img src="<?= base_url('assets/files/foto/') . $dt->photo ?>" class="card-img-top p-5 rounded-pill " alt="Gambar">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $dt->nama_lengkap ?></h5>
                        <p class="card-text"><?php echo $dt->email ?>.</p>
                    </div>
                </div>

            </div><?php endforeach; ?>
        </div>
</div>
</section>
<!-- Striped rows end -->
</div>
<!--tambah data form Modal -->