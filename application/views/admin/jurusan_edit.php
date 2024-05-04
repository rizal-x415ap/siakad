<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Jurusan</h3>
                <p class="text-subtitle text-muted">Form edit jurusan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/jurusan') ?>"><?=$this->uri->segment(2)?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$this->uri->segment(3)?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="col-md-8 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/jurusan/edit_aksi') ?>" class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <?php foreach ($jurusan as $jrs) : ?>
                                        <input type="hidden" name="id_jurusan" value="<?php echo $jrs->id_jurusan ?>">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="kode-jurusan">Kode Jurusan</label>
                                                <div class="position-relative">
                                                    <input name="kode_jurusan" value="<?php echo $jrs->kode_jurusan ?>" type="text" class="form-control <?php echo form_error('kode_jurusan') ? 'is-invalid' : ''; ?>" id="kode-jurusan">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-puzzle-fill"></i>
                                                    </div>
                                                    <?php echo form_error('kode_jurusan', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">

                                            <div class="form-group has-icon-left">
                                                <label for="nama-jurusan">Nama jurusan</label>
                                                <div class="position-relative">
                                                    <input name="nama_jurusan" value="<?php echo $jrs->nama_jurusan ?>" type="text" class="form-control <?php echo form_error('nama_jurusan') ? 'is-invalid' : ''; ?>" id="nama-jurusan">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-rocket-fill"></i>
                                                    </div>
                                                    <?php echo form_error('nama_jurusan', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-12 d-flex justify-content-between mt-3 align-items-center">
                                        <?php echo anchor('admin/jurusan','<button type="button" class="btn btn-light btn-sm me-1 mb-1">Kembali</button>')?>
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