<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Matakuliah</h3>
                <p class="text-subtitle text-muted">Form edit matakuliah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/matakuliah') ?>"><?= $this->uri->segment(2) ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $this->uri->segment(3) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="col-md-8 col-lg-6 col-12">
            <div class="card">
                <div class="card-content mt-1">
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/matakuliah/edit_aksi') ?>" class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <?php foreach ($matakuliah as $mk) : ?>
                                        <input type="hidden" name="kode_matakuliah" value="<?php echo $mk->kode_matakuliah ?>">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nama-matakuliah">Nama Matakuliah</label>
                                                <div class="position-relative">
                                                    <input name="nama_matakuliah" value="<?php echo $mk->nama_matakuliah ?>" type="text" class="form-control <?php echo form_error('nama_matakuliah') ? 'is-invalid' : ''; ?>" id="nama-matakuliah">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-journal-bookmark"></i>
                                                    </div>
                                                    <?php echo form_error('nama_matakuliah', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="sks">Jumlah SKS</label>
                                                <div class="position-relative">
                                                    <select class="form-control form-select <?php echo form_error('sks') ? 'is-invalid' : ''; ?>" name="sks" id="sks">
                                                        <option hidden selected value="<?php echo $mk->sks ?>"><?php echo $mk->sks ?></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-journals"></i>
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
                                                        <option hidden selected value="<?php echo $mk->semester ?>"><?php echo $mk->semester ?></option>
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
                                                        <i class="bi bi-list-check"></i>
                                                    </div>
                                                    <?php echo form_error('semester', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nama-prodi">Nama Prodi</label>
                                                <div class="position-relative">
                                                    <select class="form-control form-select <?php echo form_error('nama_prodi') ? 'is-invalid' : ''; ?>" name="nama_prodi" id="nama-prodi">
                                                        <option hidden selected value="<?php echo $mk->nama_prodi ?>"><?php echo $mk->nama_prodi ?></option>
                                                        <?php foreach ($prodi as $prd) : ?>
                                                            <option value="<?php echo $prd->nama_prodi ?>"><?php echo $prd->nama_prodi ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-book"></i>
                                                    </div>
                                                    <?php echo form_error('nama_prodi', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-12 d-flex justify-content-between mt-3 align-items-center">
                                        <?php echo anchor('admin/matakuliah', '<button type="button" class="btn btn-warning btn-sm me-1 mb-1">Kembali</button>') ?>
                                        <div>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>