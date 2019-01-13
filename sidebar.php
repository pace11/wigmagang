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
            
            <li class="nav-item">
                <a href="?page=wig" class="nav-link 
                <?php if ($_GET['page'] == 'wig' || $_GET['page'] == 'wigtambah' || $_GET['page'] == 'wigtambahpro' || $_GET['page'] == 'wigedit'
                         || $_GET['page'] == 'wigeditpro' || $_GET['page'] == 'wighapus'){ echo "active"; } ?>">
                <i class="nav-icon fas fa-list-ul"></i>
                    <p>WIG</p>
                </a>
            </li> 
            <li class="nav-header">INPUT PROGRES</li> 
            <li class="nav-item">
                <a href="?page=wigprogress" class="nav-link 
                <?php if ($_GET['page'] == 'wigprogress' || $_GET['page'] == 'wigprogresstambah' || $_GET['page'] == 'wigprogresstambahpro' || $_GET['page'] == 'wigprogressedit'
                         || $_GET['page'] == 'wigprogressditpro' || $_GET['page'] == 'wigprogresshapus'){ echo "active"; } ?>">
                <i class="nav-icon far fa-list-alt"></i>
                    <p>WIG</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?page=lm" class="nav-link 
                <?php if ($_GET['page'] == 'lm' || $_GET['page'] == 'lmtambah' || $_GET['page'] == 'lmtambahpro' || $_GET['page'] == 'lmedit'
                         || $_GET['page'] == 'lmeditpro' || $_GET['page'] == 'lmhapus'){ echo "active"; } ?>">
                <i class="nav-icon fas fa-users"></i>
                    <p>LM</p>
                </a>
            </li>
        </ul>
    </nav>
</div>