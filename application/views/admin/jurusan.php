<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Jurusan</h3>
                <p class="text-subtitle text-muted">Daftar data jurusan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php echo $this->session->flashdata('pesan') ?>
    </div>
    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- <?php echo anchor('admin/jurusan/input', '<button type="button" class="btn  btn-outline-success font-bold"><i class="bi bi-clipboard-plus-fill"></i> Tambah Jurusan</button>') ?> -->

                            <button type="button" data-bs-toggle="modal" data-bs-target="#tambah-data" class="btn  btn-outline-success font-bold"><i class="bi bi-clipboard-plus-fill"></i> Tambah Jurusan</button>
                            <h5 class="card-title">Tabel Jurusan</h5>
                        </div>

                    </div>
                    <div class="card-content">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Jurusan</th>
                                        <th>Nama Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($jurusan as $jrs) : ?>
                                        <tr>
                                            <td class="text-bold-500"><?= ++$page ?></td>
                                            <td><?php echo $jrs->kode_jurusan ?></td>
                                            <td class="text-bold-500"><?php echo $jrs->nama_jurusan ?></td>
                                            <td>
                                                <div class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i></i></div>
                                                <div class="btn btn-sm btn-danger" href="#"><i class="bi bi-trash2-fill"></i></i></div>
                                            <td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $pagination ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Striped rows end -->
</div>
<!--login form Modal -->
<div class="modal fade text-left" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title white" id="myModalLabel33">Form tambah jurusan </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle-fill white"></i>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('admin/jurusan/input_aksi') ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="kode-jurusan">Kode Jurusan</label>
                                <div class="position-relative">
                                    <input name="kode_jurusan" value="<?php echo set_value('kode_jurusan'); ?>" type="text" class="form-control <?php echo form_error('kode_jurusan') ? 'is-invalid' : ''; ?>" placeholder="Masukkan kode jurusan" id="kode-jurusan">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <?php echo form_error('kode_jurusan', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">

                            <div class="form-group has-icon-left">
                                <label for="nama-jurusan">Nama jurusan</label>
                                <div class="position-relative">
                                    <input name="nama_jurusan" value="<?php echo set_value('nama_jurusan'); ?>" type="text" class="form-control <?php echo form_error('nama_jurusan') ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama jurusan" id="nama-jurusan">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <?php echo form_error('nama_jurusan', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>