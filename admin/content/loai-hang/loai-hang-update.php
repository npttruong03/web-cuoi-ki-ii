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
                            <h1>QU???N L?? LO???I H??NG</h1>
                            <p>C???p nh???t l???i th??ng tin lo???i h??ng: </p>

                            <!-- /. CODE X??? L?? PHP  -->
                            <?php
                                require_once ('../../dao/loai-hang.php');
                                extract($_REQUEST);
                                $items = loai_hang_select_by_id($ma_loai);
                                extract($items);

                                extract($_REQUEST);
                                if(array_key_exists("btn_update",$_REQUEST)){
                                    loai_hang_update($ma_loai,$ten_loai);
                                }
                            ?>
                            <!-- /. CONTENT  -->
                            <form action="" method="POST">
                                <div class="form-group">
                                <label>M?? lo???i:</label>
                                <input
                                    class="form-control"
                                    placeholder="Auto number ..."
                                    name="ma_loai"
                                    value = "<?=$ma_loai?>"
                                    readonly
                                />
                                </div>
                                <div class="form-group">
                                <label for="">T??n lo???i:</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Nh???p t??n lo???i ..."
                                    name="ten_loai"
                                    value="<?=$ten_loai?>"
                                />
                                </div>
                                <div class="form-group form-check"></div>
                            <button type="submit" name="btn_update" class="btn btn-danger">C???p nh???t</button>
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
