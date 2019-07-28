<?php if (sizeof($requestbuku) != 0) { ?>
    <p>Buku lain yang anda request:</p>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Kode Buku</td>
            <td>Buku</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($requestbuku as $u) {
            ?>
            <tr>
                <td class="text-center">  <?php echo $u->id_buku ?></td>
                <td class="text-center">  <?php echo $u->judul_buku ?> </td>
                <td class="text-center">
                    <a class="btn btn-sm btn-danger"
                       href="<?php echo base_url(); ?>Buku/RequestBuku/<?php echo $u->id_buku . "/" . $u->id_anggota ?>"
                    >Batal</a>
                </td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
    <?php
}
?>
