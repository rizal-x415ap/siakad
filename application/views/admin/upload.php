<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Layout Default</h3>
                <p class="text-subtitle text-muted">The default layout.</p>
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
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Default Layout</h4>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Uploader</th>
                        <th>file</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no= 1;
                         foreach($upload as $up):?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $up->uploader?></td>
                                <td><img height="70" src="<?= base_url('assets/files/foto/').$up->file?>"></td>
                                <td><?= anchor('admin/upload/hapus/'.$up->id_file,'<div class="btn btn-sm btn-danger">Hapus</div>')?></td>
                            </tr>
                            <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('admin/upload/post')?>" enctype="multipart/form-data" method="post">
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" name="file" type="file" id="formFile">
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" name="simpan" value="simpan" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
</section>
</div>