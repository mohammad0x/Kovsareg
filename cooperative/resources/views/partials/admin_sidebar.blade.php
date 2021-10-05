<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('index.admin')}}" class="nav-link @if($selected == 'dashboard') active @endif">
                <p>
                    داشبورد
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('about_us.admin')}}" class="nav-link @if($selected == 'about_us') active @endif">
                <p>
                    درباره ما
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview @if($menu == 'branches') menu-open @endif">
            <a href="#" class="nav-link">
                <p>
                    شعبه ها
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('create_branch.admin')}}" class="nav-link @if($selected == 'createBranch') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ایجاد شعبه</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('branches.admin')}}" class="nav-link @if($selected == 'branches') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>لیست شعبه ها</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @if($menu == 'users') menu-open @endif">
            <a href="#" class="nav-link">
                <p>
                    کاربران
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('create_users.admin')}}" class="nav-link @if($selected == 'createUser') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ایجاد کاربر جدید</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.admin')}}" class="nav-link @if($selected == 'usualUsers') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>کاربران معمولی</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('premium.admin')}}" class="nav-link @if($selected == 'premiumUsers') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>کاربران ویژه</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @if($menu == 'advertisings') menu-open @endif">
            <a href="#" class="nav-link">
                <p>
                    آگهی
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('advertisings.admin')}}" class="nav-link @if($selected == 'createAdvertising') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>لیست آگهی</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('my_advertisings.admin')}}" class="nav-link @if($selected == 'createAdvertising') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>  لیست آگهی من</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('create_advertising.admin')}}" class="nav-link @if($selected == 'createOrder') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ثبت آگهی</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @if($menu == 'posts') menu-open @endif">
            <a href="#" class="nav-link">
                <p>
                    پست ها
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('create_post.admin')}}" class="nav-link @if($selected == 'createPost') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ایجاد پست</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('posts.admin')}}" class="nav-link @if($selected == 'posts') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>لیست پست ها</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @if($menu == 'categories') menu-open @endif">
            <a href="#" class="nav-link">
                <p>
                    دسته ها
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('create_category.admin')}}" class="nav-link @if($selected == 'createcategory') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ایجاد دسته بندی</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('Categories.admin')}}" class="nav-link @if($selected == 'category') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>لیست دسته بندی ها</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('logout.admin')}}" class="nav-link">
                <p>
                    خروج

                </p>
            </a>
        </li>

        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
