<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url("dashboard") . "?id=1" ?>" class="brand-link">
        <img src="<?= base_url('asset/')  ?>dist/img/pance.png" alt="Pance Shop Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-bold">Administrator Shop</span>
    </a>
    <?php

    $hak = $this->session->userdata('hak');
    $query = "SELECT a.id_sub as id,nama from akses_menu_user a join menu_user m on m.id=a.id_sub WHERE a.id_hak=$hak ORDER BY m.urutan ASC";
    $result = $this->db->query($query)->result_array();
    // var_dump($result);
    // die;
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('asset/')  ?>dist/img/profile/<?= $user['gambar']  ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url("dashboard") . "?id=1" ?>" class="d-block"><?= $user['nama']  ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <?php foreach ($result as $key) : ?>

                    <?php

                    $d = "SELECT * FROM sub_menu_user WHERE id_sub=$key[id] AND active=1";
                    $c = $this->db->query($d)->result_array();

                    ?>
                    <?php foreach ($c as $r) : ?>

                        <li class="nav-item ">
                            <?php if ($title == $r['menu']) : ?>
                                <a href="<?= base_url($r['url'])  ?>?id=<?= $key['id']  ?>" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url($r['url'])  ?>?id=<?= $key['id']  ?>" class="nav-link ">
                                    <?php endif; ?>

                                    <i class="<?= $r['icon']  ?>"></i>
                                    <p>
                                        <?= $r['menu']  ?>

                                    </p>
                                    </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>