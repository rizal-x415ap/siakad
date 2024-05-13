<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data KRS</h3>
                <p class="text-subtitle text-muted">Form edit KRS.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/krs') ?>"><?= $this->uri->segment(2) ?></a></li>
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
                        <form id="myForm" method="post" action="<?php echo base_url('admin/krs/edit_aksi') ?>">
                            <input name="id_thn_akad" value="<?php echo $id_thn_akad ?>" type="hidden">
                            <input name="id_krs" value="<?php echo $id_krs ?>" type="hidden">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="tahun-akademik">Tahun Akademik</label>
                                            <div class="position-relative">
                                                <input name="thn_akad_smt" value="<?php echo $tahun_akademik . '/' . $semester; ?>" type="text" class="form-control" readonly id="tahun-akademik">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="nim">Nim Mahasiswa</label>
                                            <div class="position-relative">
                                                <input name="nim" value="<?php echo $nim; ?>" type="text" class="form-control" readonly id="nim">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-vcard"></i>
                                                </div>
                                                <?php echo form_error('nim', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="nama-matakuliah">Matakuliah</label>
                                            <div class="position-relative">
                                                <?php
                                                $query = $this->db->query('SELECT kode_matakuliah, nama_matakuliah FROM matakuliah');

                                                $dropdowns = $query->result();
                                                foreach ($dropdowns as $dropdown) {
                                                    $dropDownList[$dropdown->kode_matakuliah] = $dropdown->nama_matakuliah;
                                                }

                                                $dropdownAttributes = array(
                                                    'class' => 'form-control form-select',
                                                    'id' => 'tahun-akademik'
                                                );

                                                echo form_dropdown('kode_matakuliah', $dropDownList, $kode_matakuliah, $dropdownAttributes);
                                                ?>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-journal-bookmark"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success me-1 mb-1">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>