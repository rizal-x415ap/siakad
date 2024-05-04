<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Matakuliah</h3>
                <p class="text-subtitle text-muted">Tabel data <?= $this->uri->segment(2) ?>.</p>
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
                            <button type="button" data-bs-toggle="modal" data-bs-target="#tambah-data" class="btn  btn-outline-success font-bold"><i class="bi bi-clipboard-plus-fill"></i> Tambah Matakuliah</button>
                            <?php echo form_open('admin/matakuliah') ?>
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
                                        <th>Kode Matakuliah</th>
                                        <th>Nama Matakuliah</th>
                                        <th>Program Studi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($matakuliah)) : ?>
                                        <tr>
                                            <td colspan="7">
                                                <h5 class="text-center">Tidak ada data yang ditemukan!</h5>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php
                                    foreach ($matakuliah as $mk) : ?>
                                        <tr>
                                            <td><?= ++$page ?></td>
                                            <td><?php echo $mk->kode_matakuliah ?></td>
                                            <td><?php echo $mk->nama_matakuliah ?></td>
                                            <td><?php echo $mk->nama_prodi ?></td>
                                            <td class="ps-0">
                                                <div class="d-flex flex-column flex-sm-row justify-content-start align-items-start">
                                                    <?php echo anchor('admin/matakuliah/detail/' . $mk->kode_matakuliah, '<div class="btn btn-sm btn-success me-1 mb-1 rounded-pill"><i class="bi bi-eye-fill"></i></i></div>') ?>
                                                    <?php echo anchor('admin/matakuliah/edit/' . $mk->kode_matakuliah, '<div class="btn btn-sm btn-primary me-1 mb-1 rounded-pill"><i class="bi bi-pencil-fill"></i></i></div>') ?>
                                                    <a class="btn btn-sm btn-danger rounded-pill tombol-hapus" href="<?= base_url('admin/matakuliah/hapus/') . $mk->kode_matakuliah ?>"><i class="bi bi-trash2-fill"></i></i></a>
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
            <div class="modal-header bg-success">
                <h4 class="modal-title white" id="myModalLabel33">Form tambah Matakuliah</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle-fill white"></i>
                </button>
            </div>
            <form id="myForm" method="post" action="<?php echo base_url('admin/matakuliah/input_aksi') ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="kode-matakuliah">Kode Matakuliah</label>
                                <div class="position-relative">
                                    <input name="kode_matakuliah" value="<?php echo set_value('kode_matakuliah'); ?>" type="text" class="form-control <?php echo form_error('kode_matakuliah') ? 'is-invalid' : ''; ?>" placeholder="Masukkan kode matakuliah max(4)" id="kode-matakuliah">
                                    <div class="form-control-icon">
                                        <i class="bi bi-puzzle-fill"></i>
                                    </div>
                                    <?php echo form_error('kode_matakuliah', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="nama-matakuliah">Nama Matakuliah</label>
                                <div class="position-relative">
                                    <input name="nama_matakuliah" value="<?php echo set_value('nama_matakuliah'); ?>" type="text" class="form-control <?php echo form_error('nama_matakuliah') ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama matakuliah" id="nama-matakuliah">
                                    <div class="form-control-icon">
                                        <i class="bi bi-rocket-fill"></i>
                                    </div>
                                    <?php echo form_error('nama_matakuliah', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="sks">SKS</label>
                                <div class="position-relative">
                                    <select class="form-control form-select <?php echo form_error('sks') ? 'is-invalid' : ''; ?>" name="sks" id="sks">
                                        <option selected value="<?php echo set_value('sks') ?>"><?php echo set_value('sks') ? set_value('sks') : 'Pilih SKS...'; ?></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-rocket-fill"></i>
                                    </div>
                                    <?php echo form_error('sks', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="semester">Semester</label>
                                <div class="position-relative">
                                    <select class="form-control form-select <?php echo form_error('semester') ? 'is-invalid' : ''; ?>" name="semester" id="semester">
                                        <option selected value="<?php echo set_value('semester') ?>"><?php echo set_value('semester') ? set_value('semester') : 'Pilih Semester...'; ?></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-rocket-fill"></i>
                                    </div>
                                    <?php echo form_error('semester', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="nama-prodi">Program Studi</label>
                                <div class="position-relative">
                                    <select class="form-control form-select <?php echo form_error('nama_prodi') ? 'is-invalid' : ''; ?>" name="nama_prodi" id="nama-prodi">
                                        <option selected value="<?php echo set_value('nama_prodi') ?>"><?php echo set_value('nama_prodi') ? set_value('nama_prodi') : 'Pilih prodi...'; ?></option>
                                        <?php foreach ($prodi as $prd) : ?>
                                            <option value="<?php echo $prd->nama_prodi ?>"><?php echo $prd->nama_prodi ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-rocket-fill"></i>
                                    </div>
                                    <?php echo form_error('nama_prodi', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                    <button type="reset" id="form_reset_button" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>