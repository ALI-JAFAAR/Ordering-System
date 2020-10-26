@extands("index")

@section("side")
<ul class="sidebar navbar-nav" style="direction: ltr !important; align-item:right;">
    <li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-list "></i>
        <span>اظافة طلب</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="users.php">
        <i class="fas fa-fw fa-user "></i>
        <span>ادارة المستخدمين</span></a>
    </li>

    <li class="nav-item">
    <a class="nav-link" href="orders.php">
        <i class="fas fa-clipboard-list "></i>
        <span>الطلبات</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="report.php">
        <i class="fas fa-clipboard "></i>
        <span>التقارير</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="rej_report.php">
        <i class="fas fa-clipboard "></i>
        <span>تقارير الطلبات المرفوضة</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="del_report.php">
        <i class="fas fa-clipboard "></i>
        <span>تقارير الطلبات المستلمة</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="new_order.php">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة قيد التجهيز</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="comp_order.php">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة تم التجهيز</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="del_order.php">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة تم التسليم </span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="reject_order.php">
        <i class="fas fa-fw fa-cog fa-spin"></i>
        <span>طلبات في حالة الرفض</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="?logout">
        <i class="fas fa-fw fa-sign-out-alt "></i>
        <span>تسجيل الخروج</span></a>
    </li>
</ul>
@endsection