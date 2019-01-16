<?php 

$user = $_SESSION['username'];

$sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$user'");
$userdata = mysqli_fetch_array($sql);

    function GetLM($params){
        include "lib/koneksi.php";
        $getlm  = mysqli_query($conn, "SELECT lm_pic FROM tbl_lm WHERE id_wig='$params'") or die (mysqli_error($koneksi));
        $datalm = mysqli_fetch_array($getlm);
        $json = json_decode($datalm['lm_pic']);
        $no=1;
        echo "<div class='table-responsive'><table><tr><th>No.</th><th>LM</th><th>PIC</th></tr>";
        foreach($json as $item) {
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td>".$item->lm."</td>";
            echo "<td>".$item->pic."</td>";
            echo "</tr>";
            $no++;
        }
        echo "</div></table>";
    }
?>



<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
</ul>

<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="btn btn-info" style="margin-right:5px;" href="#">
        <i class="fas fa-user"></i> Halo, <strong><?= strtoupper($userdata['username']) ?></strong>
        </a>
    </li>
    <li class="nav-item">
        <a class="btn btn-danger" href="?page=logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </li>
</ul>