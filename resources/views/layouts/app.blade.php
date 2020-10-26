<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <meta http-equiv="refresh" content="300"> -->
  <title>Alemdar</title>
  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- <link href="css/style.css" rel="stylesheet"> -->
    <style type="text/css">
      .css{
        text-align: right;
        font-weight: bold;
        font-size: 18pt;
        width: 100%;
      }
      .custom{
        color:white;
        text-align: right;
        direction: rtl;
        font-size: 14pt;
        width: 90%;
        margin:3% auto;
        background: rgb(82,88,81);
        background: linear-gradient(198deg, rgba(82,88,81,1) 0%, rgba(33,37,41,1) 100%);
      }
      .scroll{
        overflow-y: scroll;
        height:498px;
      }
      .sidebar .nav-item .nav-link {
        text-align : right !important;
            direction: rtl !important;
      }
      .sidebar{
            direction: ltr !important;
        }
    </style>
</head>
<body style="overflow:scroll !important;">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php">Alemdar</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
  </nav>
  <div id="wrapper">
<ul class="sidebar navbar-nav" style="direction: ltr !important; align-item:right;">
  @if(Auth::user()->type == 0)
    <li class="nav-item">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-list "></i>
        <span>اظافة طلب</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-user "></i>
        <span>ادارة المستخدمين</span></a>
    </li>

    <li class="nav-item">
    <a class="nav-link" href="/order">
        <i class="fas fa-clipboard-list "></i>
        <span>الطلبات</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/user_report">
        <i class="fas fa-clipboard "></i>
        <span>التقارير</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/rejected_report">
        <i class="fas fa-clipboard "></i>
        <span>تقارير الطلبات المرفوضة</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/delivered_report">
        <i class="fas fa-clipboard "></i>
        <span>تقارير الطلبات المستلمة</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/new">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة قيد التجهيز</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/complete">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة تم التجهيز</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/delivered">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة تم التسليم </span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/rejected">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة الرفض</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/logout">
        <i class="fas fa-fw fa-sign-out-alt "></i>
        <span>تسجيل الخروج</span></a>
    </li>
  @endif
  @if(Auth::user()->type ==1)
    <li class="nav-item">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-list "></i>
        <span>اظافة طلب</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/logout">
        <i class="fas fa-fw fa-sign-out-alt "></i>
        <span>تسجيل الخروج</span></a>
    </li>
  @endif

  @if(Auth::user()->type ==2)
    <li class="nav-item">
    <a class="nav-link" href="/new">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة قيد التجهيز</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/complete">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة تم التجهيز</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/delivered">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة تم التسليم </span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/rejected">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة الرفض</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/logout">
        <i class="fas fa-fw fa-sign-out-alt "></i>
        <span>تسجيل الخروج</span></a>
    </li>
  @endif
</ul>

@yield("content")

<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Creative Projects 2020</span>
    </div>
  </div>
</footer>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin.min.js"></script>
<script src="assets/js/script.js"></script>
<!-- Demo scripts for this page-->
<script src="assets/js/demo/datatables-demo.js"></script>
</body>
</html>