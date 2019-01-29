<?php

  if (isset($_GET['page'])) $page=$_GET['page'];
  else $page="beranda";
  
  if ($page == "beranda") include("page/beranda.php");
  elseif ($page == "logout") include("page/logout.php");

  // ------------- User ----------------------
  elseif ($page == "user")               include("page/user/user.php");
  elseif ($page == "usertambah")         include("page/user/usertambah.php");
  elseif ($page == "usertambahpro")      include("page/user/usertambahpro.php");
  elseif ($page == "useredit")           include("page/user/useredit.php");
  elseif ($page == "usereditpro")        include("page/user/usereditpro.php");
  elseif ($page == "userlihat")          include("page/user/userlihat.php");
  elseif ($page == "userhapus")          include("page/user/userhapus.php");


  // ------------- WIG ----------------------
  elseif ($page == "wig")                include("page/wig/wig.php");
  elseif ($page == "wigtambah")          include("page/wig/wigtambah.php");
  elseif ($page == "wigtambahpro")       include("page/wig/wigtambahpro.php");
  elseif ($page == "wigedit")            include("page/wig/wigedit.php");
  elseif ($page == "wigeditpro")         include("page/wig/wigeditpro.php");
  elseif ($page == "wiglihat")           include("page/wig/wiglihat.php");
  elseif ($page == "wigview")            include("page/wig/wigview.php");
  elseif ($page == "wighapus")           include("page/wig/wighapus.php");

  // ------------- Proses ----------------------
  elseif ($page == "progress")           include("page/wig/wig.php");
  elseif ($page == "wigprogress")        include("page/wig/wigprogress.php");

else echo"Konten tidak ada";

?>