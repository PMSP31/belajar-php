<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Siswa</h3>

            <?php foreach ($data['siswa'] as $siswa) : ?>
                <ul>
                    <li><?= $siswa['nama']; ?></li>
                    <li><?= $siswa['nis']; ?></li>
                    <li><?= $siswa['email']; ?></li>
                    <li><?= $siswa['jurusan']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>