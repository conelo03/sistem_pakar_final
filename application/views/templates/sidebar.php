        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion bg-success" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sistem Pakar</div>
            </a>

            <div class="sidebar-heading">
                WBS
            </div>
            <?php if ($title == 'Uji Coba Diagnosa') : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url('Diagnosa'); ?>">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Uji Coba Diagnosa</span></a>
                </li>


                    <?php
                    if ($this->session->role == 'admin') { ?>
                        <hr class="sidebar-divider">
                        <div class="sidebar-heading">
                            Master Data
                        </div>


                        <?php if ($title == 'Data Indikator') : ?>
                            <li class="nav-item active">
                            <?php else : ?>
                            <li class="nav-item">
                            <?php endif; ?>
                            <a class="nav-link pb-0" href="<?= base_url('Indikator'); ?>">
                                <i class="fas fa-fw fa-key"></i>
                                <span>Data Indikator</span></a>
                            </li>

                            <?php if ($title == 'Data Tingkat Cemas') : ?>
                                <li class="nav-item active">
                                <?php else : ?>
                                <li class="nav-item">
                                <?php endif; ?>
                                <a class="nav-link pb-0" href="<?= base_url('Tingkat_cemas'); ?>">
                                    <i class="fas fa-fw fa-key"></i>
                                    <span>Data Tingkat Kecemasan</span></a>
                                </li>

                                <?php if ($title == 'Data Relasi') : ?>
                                    <li class="nav-item active">
                                    <?php else : ?>
                                    <li class="nav-item">
                                    <?php endif; ?>
                                    <a class="nav-link pb-0" href="<?= base_url('Relasi'); ?>">
                                        <i class="fas fa-fw fa-key"></i>
                                        <span>Data Relasi</span></a>
                                    </li>

                                    <?php if ($title == 'Rule') : ?>
                                        <li class="nav-item active">
                                        <?php else : ?>
                                        <li class="nav-item">
                                        <?php endif; ?>
                                        <a class="nav-link pb-0" href="<?= base_url('Rule'); ?>">
                                            <i class="fas fa-fw fa-key"></i>
                                            <span>Rule</span></a>
                                        </li>
                                        <?php if ($title == 'Riwayat Diagnosa') : ?>
                                            <li class="nav-item active">
                                            <?php else : ?>
                                            <li class="nav-item">
                                            <?php endif; ?>
                                            <a class="nav-link pb-0" href="<?= base_url('Riwayat'); ?>">
                                                <i class="fas fa-fw fa-key"></i>
                                                <span>Riwayat</span></a>
                                            </li>

                                            <?php if ($title == 'Data Admin') : ?>
                                                <li class="nav-item active">
                                                <?php else : ?>
                                                <li class="nav-item">
                                                <?php endif; ?>
                                                <a class="nav-link pb-0" href="<?= base_url('Admin'); ?>">
                                                    <i class="fas fa-fw fa-key"></i>
                                                    <span>Tambah Admin</span></a>
                                                </li>
                                            <?php } ?>


                                            <hr class="sidebar-divider mt-3">
                                            <div class="text-center d-none d-md-inline">
                                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                            </div>

        </ul>
        <!-- End  of Sidebar -->