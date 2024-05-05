<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Mahasiswa</h3>
                <p class="text-subtitle text-muted">Form edit mahasiswa.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/mahasiswa') ?>"><?= $this->uri->segment(2) ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $this->uri->segment(3) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="card">
                    <div class="card-content mt-1">
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url('admin/mahasiswa/edit_aksi') ?>" class="form form-vertical" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <?php foreach ($mahasiswa as $mhs) : ?>
                                            <input type="hidden" name="id" value="<?php echo $mhs->id ?>">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="nim">NIM</label>
                                                    <div class="position-relative">
                                                        <input name="nim" value="<?php echo $mhs->nim ?>" type="text" class="form-control <?php echo form_error('nim') ? 'is-invalid' : ''; ?>" id="nim">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person-vcard"></i>
                                                        </div>
                                                        <?php echo form_error('nim', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <div class="position-relative">
                                                        <input name="nama_lengkap" value="<?php echo $mhs->nama_lengkap ?>" type="text" class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid' : ''; ?>" id="nama_lengkap">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                        <?php echo form_error('nama_lengkap', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="alamat">Alamat</label>
                                                    <div class="position-relative">
                                                        <input name="alamat" value="<?php echo $mhs->alamat ?>" type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : ''; ?>" id="alamat">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-house"></i>
                                                        </div>
                                                        <?php echo form_error('alamat', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="email">Email</label>
                                                    <div class="position-relative">
                                                        <input name="email" value="<?php echo $mhs->email ?>" type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" id="email">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-envelope-at"></i>
                                                        </div>
                                                        <?php echo form_error('email', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="telepon">No Telepon</label>
                                                    <div class="position-relative">
                                                        <input name="telepon" value="<?php echo $mhs->telepon ?>" type="text" class="form-control <?php echo form_error('telepon') ? 'is-invalid' : ''; ?>" id="telepon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-telephone"></i>
                                                        </div>
                                                        <?php echo form_error('telepon', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <div class="position-relative">
                                                        <input name="tempat_lahir" value="<?php echo $mhs->tempat_lahir ?>" type="text" class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid' : ''; ?>" id="tempat_lahir">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-geo-alt"></i>
                                                        </div>
                                                        <?php echo form_error('tempat_lahir', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <div class="position-relative">
                                                        <input name="tanggal_lahir" value="<?php echo $mhs->tanggal_lahir ?>" type="text" class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid' : ''; ?>" id="tanggal_lahir">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-calendar-check"></i>
                                                        </div>
                                                        <?php echo form_error('tanggal_lahir', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <div class="d-flex justify-content-start align-items-center mb-1">
                                                    <div class="form-check me-2">
                                                        <input class="form-check-input" <?php if ($mhs->jenis_kelamin == 'Laki-laki') {
                                                                                            echo 'checked';
                                                                                        } ?> value="Laki-laki" type="radio" name="jenis_kelamin" id="jenis_kelamin1">
                                                        <label class="form-check-label" for="jenis_kelamin1">
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" <?php if ($mhs->jenis_kelamin == 'Perempuan') {
                                                                                            echo 'checked';
                                                                                        } ?> value="Perempuan" type="radio" name="jenis_kelamin" id="jenis_kelamin2">
                                                        <label class="form-check-label" for="jenis_kelamin2">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php echo form_error('jenis_kelamin', '<span class="text-danger text-sm"><i class="bx bx-radio-circle"></i>', '</span>'); ?>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="prodi">Program Studi</label>
                                                    <div class="position-relative">
                                                        <select class="form-control form-select <?php echo form_error('nama_prodi') ? 'is-invalid' : ''; ?>" name="nama_prodi" id="prodi">
                                                            <option hidden selected value="<?php echo $mhs->nama_prodi ?>"><?php echo $mhs->nama_prodi ?></option>
                                                            <?php foreach ($prodi as $prd) : ?>
                                                                <option value="<?php echo $prd->nama_prodi ?>"><?php echo $prd->nama_prodi ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-rocket"></i>
                                                        </div>
                                                        <?php echo form_error('nama_prodi', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nama-matakuliah">Pas Foto (Kosongkan jika tidak ingin merubah foto!)</label>
                                                    <input class="form-control"  name="file" type="file" id="formFile">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-between mt-3 align-items-center">
                                                <?php echo anchor('admin/mahasiswa', '<button type="button" class="btn btn-warning btn-sm me-1 mb-1">Kembali</button>') ?>
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
            <div class="col-lg-3 col-md-12">
                <div class="card shadow">
                    <img src="<?= base_url('assets/files/foto/') . $mhs->photo ?>" class="card-img-top p-5 rounded-pill " alt="Gambar">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $mhs->nama_lengkap ?></h5>
                        <p class="card-text"><?php echo $mhs->email ?>.</p>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
    </section>
</div>