<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Matakuliah</h3>
                <p class="text-subtitle text-muted">Informasi data matakuliah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Matakuliah</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $this->uri->segment(3) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-lg-7 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <code>#Detail matakuliah</code>
                    </div>
                    <div class="card-content">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-lg table-hover mb-0">
                                <?php
                                foreach ($detail as $dt) : ?>
                                    <tr>
                                        <th>Kode Matakuliah</th>
                                        <td>:</td>
                                        <td><?php echo $dt->kode_matakuliah ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Matakuliah</th>
                                        <td>:</td>
                                        <td><?php echo $dt->nama_matakuliah ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah SKS</th>
                                        <td>:</td>
                                        <td><?php echo $dt->sks ?></td>
                                    </tr>
                                    <tr>
                                        <th>Semester</th>
                                        <td>:</td>
                                        <td><?php echo $dt->semester ?></td>
                                    </tr>
                                    <tr>
                                        <th>Program Studi</th>
                                        <td>:</td>
                                        <td><?php echo $dt->nama_prodi ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex m-3"> <?php echo anchor('admin/matakuliah', '<button type="button" class="btn btn-warning btn-sm me-1 mb-1">Kembali</button>') ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<!-- Striped rows end -->
</div>
<!--tambah data form Modal -->