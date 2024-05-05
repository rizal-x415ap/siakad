<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Program Studi</h3>
                <p class="text-subtitle text-muted">Form edit program studi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/prodi') ?>"><?= $this->uri->segment(2) ?></a></li>
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
                        <form method="post" action="<?php echo base_url('admin/prodi/edit_aksi') ?>" class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <?php foreach ($prodi as $prd) : ?>
                                        <input type="hidden" name="id_prodi" value="<?php echo $prd->id_prodi ?>">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="kode-prodi">Kode Prodi</label>
                                                <div class="position-relative">
                                                    <input name="kode_prodi" value="<?php echo $prd->kode_prodi ?>" type="text" class="form-control <?php echo form_error('kode_prodi') ? 'is-invalid' : ''; ?>" id="kode-prodi">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-puzzle"></i>
                                                    </div>
                                                    <?php echo form_error('kode_prodi', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nama-prodi">Nama Prodi</label>
                                                <div class="position-relative">
                                                    <input name="nama_prodi" value="<?php echo $prd->nama_prodi ?>" type="text" class="form-control <?php echo form_error('nama_prodi') ? 'is-invalid' : ''; ?>" id="nama-prodi">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-book"></i>
                                                    </div>
                                                    <?php echo form_error('nama_prodi', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nama-jurusan">Nama Jurusan</label>
                                                <div class="position-relative">
                                                    <select class="form-control form-select <?php echo form_error('nama_prodi') ? 'is-invalid' : ''; ?>" name="nama_jurusan" id="nama-jurusan">
                                                        <option hidden selected value="<?php echo $prd->nama_jurusan ?>"><?php echo $prd->nama_jurusan ?></option>
                                                        <?php foreach ($jurusan as $jrs) : ?>
                                                            <option value="<?php echo $jrs->nama_jurusan ?>"><?php echo $jrs->nama_jurusan ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-rocket"></i>
                                                    </div>
                                                    <?php echo form_error('nama_prodi', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-12 d-flex justify-content-between mt-3 align-items-center">
                                        <?php echo anchor('admin/prodi', '<button type="button" class="btn btn-warning btn-sm me-1 mb-1">Kembali</button>') ?>
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