<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="dist/img/PLN.png">
        </div>
        <div class="info">
            <a class="d-block"><strong><?= strtoupper($userdata['username']) ?></strong></a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">MENU</li>
            <li class="nav-item">
                <a href="?page=beranda" class="nav-link
                <?php if ($_GET['page'] == 'beranda'){ echo "active"; } ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>BERANDA</p>
                </a>
            </li>
            
            <?php if ($userdata['role'] == 2 ) { ?>
            <li class="nav-item">
                <a href="?page=wig" class="nav-link 
                <?php if ($_GET['page'] == 'wig' || $_GET['page'] == 'wigtambah' || $_GET['page'] == 'wigtambahpro' || $_GET['page'] == 'wigedit'
                         || $_GET['page'] == 'wigeditpro' || $_GET['page'] == 'wighapus' || $_GET['page'] == 'wigview'){ echo "active"; } ?>">
                <i class="nav-icon fas fa-list-ul"></i>
                    <p>WIG</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?page=progress" class="nav-link 
                <?php if ($_GET['page'] == 'progress' || $_GET['page'] == 'wigprogress'){ echo "active"; } ?>">
                <i class="nav-icon far fa-list-alt"></i>
                    <p>INPUT PROGRESS</p>
                </a>
            </li>
            <?php }?>
            <?php if($userdata['role'] == 0) { ?> 
            <li class="nav-item">
                <a href="?page=user" class="nav-link 
                <?php if ($_GET['page'] == 'user' || $_GET['page'] == 'useredit' || $_GET['page'] == 'usereditpro' || $_GET['page'] == 'userhapus'
                         || $_GET['page'] == 'usertambah' || $_GET['page'] == 'usertambahpro'){ echo "active"; } ?>">
                <i class="nav-icon far fa-list-alt"></i>
                    <p>MANAJEMEN USER</p>
                </a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</div>