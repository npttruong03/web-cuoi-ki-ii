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
   <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
</head>
<body>
    <?php
        // require_once ('../../content/thong-ke/check-login.php');
        require_once ('../../dao/pdo.php');
        session_start();
       
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
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../tai_khoan_admin/dang-xuat.php"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
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
                        <a href="../thong-ke/thong-ke-list.php"><i class="fa fa-dashboard"></i>TRANG CHỦ</a>
                    </li>
                    <li>
                        <a href="../loai-hang/loai-hang-list.php"><i class="fa fa-list-alt" aria-hidden="true"></i>LOẠI HÀNG</a>
                    </li>
                    <li>
                        <a href="../hang-hoa/hang-hoa-list.php"><i class="fa fa-qrcode"></i>HÀNG HÓA</a>
                    </li>
                    
                    <li>
                        <a href="../khach-hang/khach-hang-list.php"><i class="fa fa-user"></i>KHÁCH HÀNG</a>
                    </li>
                    <li>
                        <a href="../binh-luan/binh-luan-list.php"><i class="fa fa-comment-o" aria-hidden="true"></i>BÌNH LUẬN</a>
                    </li>
                    <li>
                        <a href="../hoa-don/hoa-don-list.php"><i class="fa fa-edit"></i>ĐƠN HÀNG</a>
                    </li> 
                    <li>
                        <a href="../tai_khoan_admin/thong-tin-tk.php"><i class="fa fa-user"></i>Tài Khoản Admin</a>
                    </li>
                    <li>
                        <a href="../tin-tuc/tin-tuc-list.php"><i class="fa fa-book"></i>Tin Tức</a>
                    </li>      
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
		  <div class="header"> 
                        <div class="page-header">
                            <h1>QUẢN LÝ Tin Tức</h1>
                            <p>Điền đầy đủ thông tin để tiến hành thêm tin tức mới :</p>

                            <!-- /. CODE XỬ LÝ PHP  -->
                            <?php
                                require_once ('../../dao/tin-tuc.php');
                                require_once ('../../dao/loai-tin-tuc.php');

                                extract($_REQUEST);
                                if(array_key_exists("btn_insert",$_REQUEST)){
                                    $up_hinh = save_file("hinh", "../../../../bigshoes/css/tin-tuc/img/");
                                    $hinh = strlen($up_hinh) > 0 ? $up_hinh : 'img.png';

                                    tin_tuc_insert($chu_de, $hinh, $noi_dung, $ma_loai);
                                    unset($chu_de,$hinh,$noi_dung,$ma_loai);
                                }
                            ?>
                            <!-- /. CONTENT  -->
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <label for="">Tên tin tức:</label>
                            <input type="text" class="form-control" id="chu_de" name="chu_de"
                                placeholder="Nhập tên tin tức ...">
                            </div>

                            <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control-file border" name="hinh">
                            </div>

                            <div class="form-group">
                            <label for="">Nội dung:</label>
                            <!-- <textarea class="form-control" rows="5" id="noi_dung" name="noi_dung"
                                placeholder="Mô tả tin tức ..."></textarea> -->
                                <textarea class="form-control" name="noi_dung" rows= "5" id="noi_dung" placeholder="Mô tả tin tức ..."></textarea>
                <script>
                        CKEDITOR.replace( 'noi_dung' );
                </script> 


                            </div>

                            <div class="form-group">
                            <label for="">Mã loại?</label>
                            <select name="ma_loai" class="form-control">
                                    <?php
                                        $loai_select_list = loai_tin_tuc_select_all();
                                        foreach ($loai_select_list as $loai) {
                                            echo '<option value="'.$loai['ma_loai'].'">'.$loai['ten_loai'].'</option>';
                                            }
                                        ?>
                                    </select>
                            </div>
                            <button type="submit" name="btn_insert" class="btn btn-primary">Thêm mới</button>
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
