<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active">
                <a href="{{ route('admin.dashboard') }}">
                    {{-- Line Awesome Icons --}}
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية</span>
                </a>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item @if (Request::is('admin/associations*')) open @endif ">
                <a href="">
                    <i class="la la-font"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">لغات الموقع</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ App\Models\Language::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{ route('admin.languages') }}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.languages.create') }}" data-i18n="nav.dash.crypto">اضافة لغة جديدة</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-sitemap"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الرئيسية</span>
                    <span class="badge badge badge-danger badge-pill float-right mr-2">
                        {{ App\Models\MainCategory::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="" data-i18n="nav.dash.crypto">اضافة قسم جديد</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

        </ul>

    </div>
</div>
