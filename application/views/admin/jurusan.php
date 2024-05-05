<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Jurusan</h3>
                <p class="text-subtitle text-muted">Tabel data jurusan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Akademik</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $this->uri->segment(2) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#tambah-data" class="btn  btn-outline-success font-bold"><i class="bi bi-clipboard-plus-fill"></i> Tambah Jurusan</button>
                            <?php echo form_open('admin/jurusan') ?>
                            <div class="d-flex form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2 form-control-sm" type="search" name="keyword" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-primary my-sm-0" type="submit">Search</button>
                                <?php echo form_close() ?>
                            </div>
                        </div>

                    </div>
                    <div class="card-content">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Jurusan</th>
                                        <th>Nama Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($jurusan)) : ?>
                                        <tr>
                                            <td colspan="4">
                                                <h5 class="text-center">Tidak ada data yang ditemukan!</h5>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php
                                    foreach ($jurusan as $jrs) : ?>
                                        <tr>
                                            <td><?= ++$page ?></td>
                                            <td><?php echo $jrs->kode_jurusan ?></td>
                                            <td><?php echo $jrs->nama_jurusan ?></td>
                                            <td class="ps-0">
                                                <div class="d-flex flex-column flex-sm-row justify-content-start align-items-start">
                                                    <?php echo anchor('admin/jurusan/edit/' . $jrs->id_jurusan, '<div class="btn btn-sm btn-primary me-1 mb-1 rounded-pill"><i class="bi bi-pencil-fill"></i></i></div>') ?>
                                                    <a class="btn btn-sm btn-danger rounded-pill tombol-hapus" href="<?= base_url('admin/jurusan/hapus/') . $jrs->id_jurusan ?>"><i class="bi bi-trash2-fill"></i></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="ms-2">Jumlah data : <b><?php echo $jlh_data ?></b></p>
                        <?php echo $pagination ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Striped rows end -->
</div>
<!--tambah data form Modal -->
<div class="modal fade text-left" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Form tambah Jurusan </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle-fill text-danger"></i>
                </button>
            </div>
            <form id="myForm" method="post" action="<?php echo base_url('admin/jurusan/input_aksi') ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="kode-jurusan">Kode Jurusan</label>
                                <div class="position-relative">
                                    <input name="kode_jurusan" value="<?php echo set_value('kode_jurusan'); ?>" type="text" class="form-control <?php echo form_error('kode_jurusan') ? 'is-invalid' : ''; ?>" placeholder="Masukkan kode jurusan max(4)" id="kode-jurusan">
                                    <div class="form-control-icon">
                                        <i class="bi bi-puzzle"></i>
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
                                        <i class="bi bi-rocket"></i>
                                    </div>
                                    <?php echo form_error('nama_jurusan', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Simpan</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>