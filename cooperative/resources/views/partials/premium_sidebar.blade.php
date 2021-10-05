<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('index.premium')}}" class="nav-link @if($selected == 'dashboard') active @endif">
                <p>
                    داشبورد
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview @if($menu=='advertisings') menu-open @endif">
            <a href="#" class="nav-link">
                <p>
                    آگهی
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('advertisings.premium')}}" class="nav-link @if($selected == 'advertisings') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>آگهی های من</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('create_advertisings.premium')}}" class="nav-link @if($selected == 'createAdvertising') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ثبت آگهی</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('logout.premium')}}" class="nav-link">
                <p>
                    خروج

                </p>
            </a>
        </li>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
