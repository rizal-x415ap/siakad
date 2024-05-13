<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Tahun Akademik</h3>
                <p class="text-subtitle text-muted">Form edit tahun akademik.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/tahun_akademik') ?>"><?= $this->uri->segment(2) ?></a></li>
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
                        <form method="post" action="<?php echo base_url('admin/tahun_akademik/edit_aksi') ?>" class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <?php foreach ($tahun_akademik as $tmik) : ?>
                                        <input type="hidden" name="id_thn_akad" value="<?php echo $tmik->id_thn_akad ?>">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="tahun-akademik">Tahun Akademik</label>
                                                <div class="position-relative">
                                                    <input name="tahun_akademik" value="<?php echo $tmik->tahun_akademik ?>" type="text" class="form-control <?php echo form_error('tahun_akademik') ? 'is-invalid' : ''; ?>" id="tahun-akademik">
                                                    <div class="form-control-icon">
                                                    <i class="bi bi-calendar-check"></i>
                                                    </div>
                                                    <?php echo form_error('tahun_akademik', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="semester">Semester</label>
                                                <div class="position-relative">
                                                    <select class="form-control form-select <?php echo form_error('semester') ? 'is-invalid' : ''; ?>" name="semester" id="semester">
                                                        <option hidden selected value="<?php echo $tmik->semester ?>"><?php echo $tmik->semester ?></option>
                                                        <option value="Ganjil">Ganjil</option>
                                                        <option value="Genap">Genap</option>
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
                                                <label for="status">Status</label>
                                                <div class="position-relative">
                                                    <select class="form-control form-select <?php echo form_error('status') ? 'is-invalid' : ''; ?>" name="status" id="status">
                                                        <option hidden selected value="<?php echo $tmik->status ?>"><?php echo $tmik->status ?></option>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-question-circle"></i>
                                                    </div>
                                                    <?php echo form_error('status', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-12 d-flex justify-content-between mt-3 align-items-center">
                                        <?php echo anchor('admin/tahun_akademik', '<button type="button" class="btn btn-warning btn-sm me-1 mb-1">Kembali</button>') ?>
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