<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Mahasiswa</h3>
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
                            <button type="button" data-bs-toggle="modal" data-bs-target="#tambah-data" class="btn  btn-outline-success font-bold"><i class="bi bi-clipboard-plus-fill"></i> Tambah Mahasiswa</button>
                            <?php echo form_open('admin/mahasiswa') ?>
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
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <th>Nim</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($mahasiswa)) : ?>
                                        <tr>
                                            <td colspan="7">
                                                <h5 class="text-center">Tidak ada data yang ditemukan!</h5>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php
                                    foreach ($mahasiswa as $mhs) : ?>
                                        <tr>
                                            <td><?= ++$page ?></td>
                                            <td><?php echo $mhs->nama_lengkap ?></td>
                                            <td><?php echo $mhs->alamat ?></td>
                                            <td><?php echo $mhs->nim ?></td>
                                            <td><?php echo $mhs->email ?></td>
                                            <td class="ps-0">
                                                <div class="d-flex flex-column flex-sm-row justify-content-start align-items-start">
                                                    <?php echo anchor('admin/mahasiswa/detail/' . $mhs->id, '<div class="btn btn-sm btn-success me-1 mb-1 rounded-pill"><i class="bi bi-eye-fill"></i></i></div>') ?>
                                                    <?php echo anchor('admin/mahasiswa/edit/' . $mhs->id, '<div class="btn btn-sm btn-primary me-1 mb-1 rounded-pill"><i class="bi bi-pencil-fill"></i></i></div>') ?>
                                                    <a class="btn btn-sm btn-danger rounded-pill tombol-hapus" href="<?= base_url('admin/mahasiswa/hapus/') . $mhs->id ?>"><i class="bi bi-trash2-fill"></i></i></a>
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
            <div class="modal-header ">
                <h4 class="modal-title" id="myModalLabel33">Form tambah Mahasiswa</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle-fill text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/mahasiswa/input_aksi')  ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="nim">Nim</label>
                                <div class="position-relative">
                                    <input name="nim" value="<?php echo set_value('nim'); ?>" type="text" class="form-control <?php echo form_error('nim') ? 'is-invalid' : ''; ?>" placeholder="Masukkan nim max(8)" id="nim">
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
                                    <input name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>" type="text" class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama lengkap" id="nama_lengkap">
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
                                    <input name="alamat" value="<?php echo set_value('alamat'); ?>" type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : ''; ?>" placeholder="Masukkan alamat" id="alamat">
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
                                    <input name="email" value="<?php echo set_value('email'); ?>" type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" placeholder="Masukkan email" id="email">
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
                                    <input name="telepon" value="<?php echo set_value('telepon'); ?>" type="text" class="form-control <?php echo form_error('telepon') ? 'is-invalid' : ''; ?>" placeholder="Masukkan telepon" id="telepon">
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
                                    <input name="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" type="text" class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid' : ''; ?>" placeholder="Masukkan tempat lahir" id="tempat_lahir">
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
                                    <input name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" type="date" class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid' : ''; ?>" placeholder="Masukkan tanggal_lahir" id="tanggal_lahir">
                                    <div class="form-control-icon">
                                    <i class="bi bi-calendar-check"></i>
                                    </div>
                                    <?php echo form_error('tanggal_lahir', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label for="jenis_kelamin">jenis_kelamin</label>
                            <div class="d-flex justify-content-start align-items-center mb-1">
                                <div class="form-check me-2">
                                    <input class="form-check-input" <?php if (set_value('jenis_kelamin') == 'Laki-laki') {
                                                                        echo 'checked';
                                                                    } ?> value="Laki-laki" type="radio" name="jenis_kelamin" id="jenis_kelamin1">
                                    <label class="form-check-label" for="jenis_kelamin1">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" <?php if (set_value('jenis_kelamin') == 'Perempuan') {
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
                                <label for="nama-prodi">Program Studi</label>
                                <div class="position-relative">
                                    <select class="form-control form-select <?php echo form_error('nama_prodi') ? 'is-invalid' : ''; ?>" name="nama_prodi" id="nama-prodi">
                                        <option selected value="<?php echo set_value('nama_prodi') ?>"><?php echo set_value('nama_prodi') ? set_value('nama_prodi') : 'Pilih prodi...'; ?></option>
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
                                <label for="nama-matakuliah">Pas Foto</label>
                                <input class="form-control" value="<?php echo set_value('photo') ?>" name="file" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success me-1 mb-1">Simpan</button>
                <button type="reset" id="form_reset_button" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>