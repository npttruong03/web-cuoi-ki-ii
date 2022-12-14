<?php
require_once("../thong-ke/check-login.php");
session_start();
check_login1();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>ADMIN</title>
	<!-- Bootstrap Styles-->
    <link href="../../../css/admin/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../../../css/admin/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../../../css/admin/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <?php
        require_once ('../../dao/pdo.php');
    ?>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../../../bigshoes/trang-chinh/"><strong style = "margin-left: 40px;">BIG SHOES</strong></a>
            </div>
           
    <!-- Nav bar-->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> C??i ?????t</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../tai_khoan_admin/dang-xuat.php"><i class="fa fa-sign-out fa-fw"></i> ????ng xu???t</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li>
                        <a href="../thong-ke/thong-ke-list.php"><i class="fa fa-dashboard"></i>TRANG CH???</a>
                    </li>
                    <li>
                        <a href="../loai-hang/loai-hang-list.php"><i class="fa fa-list-alt" aria-hidden="true"></i>LO???I H??NG</a>
                    </li>
                    <li>
                        <a href="../hang-hoa/hang-hoa-list.php"><i class="fa fa-qrcode"></i>H??NG H??A</a>
                    </li>
                    
                    <li>
                        <a href="../khach-hang/khach-hang-list.php"><i class="fa fa-user"></i>KH??CH H??NG</a>
                    </li>
                    <li>
                        <a href="../binh-luan/binh-luan-list.php"><i class="fa fa-comment-o" aria-hidden="true"></i>B??NH LU???N</a>
                    </li>
                    <li>
                        <a href="../hoa-don/hoa-don-list.php"><i class="fa fa-edit"></i>????N H??NG</a>
                    </li>  
                    <li>
                        <a href="../tai_khoan_admin/thong-tin-tk.php"><i class="fa fa-user"></i>T??i Kho???n Admin</a>
                    </li>
                    <li>
                        <a href="../tin-tuc/tin-tuc-list.php"><i class="fa fa-book"></i>Tin T???c</a>
                    </li> 
                       
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
		  <div class="header"> 
                        <div class="page-header">
                            <h1>QU???N L?? H??NG H??A</h1>
                            <p>??i???n ?????y ????? th??ng tin ????? ti???n h??nh th??m h??ng h??a m???i :</p>

                            <!-- /. CODE X??? L?? PHP  -->
                            <?php
                                require_once ('../../dao/hang-hoa.php');
                                require_once ('../../dao/loai-hang.php');

                                extract($_REQUEST);
                                if(array_key_exists("btn_insert",$_REQUEST)){
                                    $up_hinh = save_file("hinh", "../../../../bigshoes/css/admin/images/products/");
                                    $hinh = strlen($up_hinh) > 0 ? $up_hinh : 'product.png';

                                    hang_hoa_insert($ten_hh,$hinh,$don_gia,$giam_gia,$mo_ta,$ma_loai);
                                    unset($ten_hh,$hinh,$don_gia,$giam_gia,$mo_ta,$ma_loai);
                                }
                            ?>
                            <!-- /. CONTENT  -->
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <label for="">T??n h??ng h??a:</label>
                            <input type="text" class="form-control" id="ten_hh" name="ten_hh"
                                placeholder="Nh???p t??n h??ng h??a ...">
                            </div>

                            <div class="form-group">
                            <label for="">????n gi??</label>
                            <input type="number" class="form-control" id="don_gia" name="don_gia"
                                placeholder="Nh???p ????n gi?? ...">
                            </div>

                            <div class="form-group">
                            <label for="">Gi???m gi?? (%)</label>
                            <input type="number" class="form-control" id="giam_gia" name="giam_gia" min="0" max="100"
                                placeholder="Nh???p gi???m gi??">
                            </div>

                            <div class="form-group">
                            <label for="">H??nh ???nh</label>
                            <input type="file" class="form-control-file border" name="hinh">
                            </div>

                            <div class="form-group">
                            <label for="">M?? t???:</label>
                            <textarea class="form-control" rows="5" id="mo_ta" name="mo_ta"
                                placeholder="M?? t??? h??ng h??a ..."></textarea>
                            </div>

                            <div class="form-group">
                            <label for="">M?? lo???i?</label>
                            <select name="ma_loai" class="form-control">
                                    <?php
                                        $loai_select_list = loai_hang_select_all();
                                        foreach ($loai_select_list as $loai) {
                                            echo '<option value="'.$loai['ma_loai'].'">'.$loai['ten_loai'].'</option>';
                                            }
                                        ?>
                                    </select>
                            </div>
                            <button type="submit" name="btn_insert" class="btn btn-primary">Th??m m???i</button>
                        </form>
                        </div>
		</div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../../../css/admin/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../../../css/admin/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../../../css/admin/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../../../css/admin/js/custom-scripts.js"></script>
    
   
</body>
</html>
