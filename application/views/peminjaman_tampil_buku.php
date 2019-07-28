<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>Kode Buku</td>
        <td>Buku</td>
        <td>Tanggal Pinjam</td>
        <td>Sisa Waktu</td>
        <td>Kembali Buku</td>
    </tr>
    </thead>
    <input type="text" value="<?php echo sizeof($daftarBuku) ?>" id="jmhPinjam" hidden>
    <?php
    if (sizeof($daftarBuku) != 0) {
        foreach ($daftarBuku as $tmp):?>
            <tr>
                <td><?php echo $tmp->id_buku; ?></td>
                <td><?php echo $tmp->judul_buku; ?></td>
                <td><?php echo $tmp->tgl_pinjam; ?></td>
                <td>
                    <?php
                    $start_date = new DateTime(date("Y-m-d"));
                    $end_date = new DateTime($tmp->batas_kembali);
                    $interval = $start_date->diff($end_date);
                    if ($start_date > $end_date) {
                        ?>
                        <span class="badge badge-danger">telah melewati masa waktu</span>
                        <?php
                    } else {
                        if ($interval->days >= 2 && $interval->days <= 3) {
                            ?>
                            <span class="badge badge-success">sisa waktu <?php echo $interval->days ?> hari</span>
                            <?php
                        } else if ($interval->days == 1) {
                            ?>
                            <span class="badge badge-info">sisa waktu <?php echo $interval->days ?> hari</span>
                            <?php
                        } else if ($interval->days == 0) {
                            ?>
                            <span class="badge badge-warning">sisa waktu <?php echo $interval->days ?> hari</span>
                            <?php
                        }
                    }
                    ?>
                </td>
                <td class="text-center">
                    <a class="btn btn-sm btn-warning"
                       id="kembalikan_buku" kode="<?php echo $tmp->id_buku; ?>"
                       id_peminjaman="<?php echo $tmp->id_peminjaman ?>" id_anggota="<?php echo $tmp->id_anggota ?>"
                       href="#">Kembali</a>
                </td>
            </tr>
        <?php endforeach;
    } else {
        ?>
        <td colspan="5"><p class="text-center">Tidak ada buku yang dipinjam</p></td>
        <?php
    }
    ?>
</table>

<?php
if (sizeof($daftarBuku) == 0 && $idanggota != "null") {
    ?>
    <a href="<?php echo base_url()?>Peminjaman/bebas_pustaka" target="_blank" class="btn btn-primary float-right">Bebas Pustaka</a>
<?php }
?>