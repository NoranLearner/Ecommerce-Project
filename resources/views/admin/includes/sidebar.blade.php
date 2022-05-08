<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active">
                <a href="{{ route('admin.dashboard') }}">
                    {{-- Line Awesome Icons --}}
                    {{-- https://themewagon.github.io/Ready-Bootstrap-Dashboard/icons.html --}}
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
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{-- Use Scope in MainCategory Model --}}
                        {{ App\Models\MainCategory::DefaultCategory()->count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{ route('admin.mainCategories') }}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.mainCategories.create') }}" data-i18n="nav.dash.crypto">اضافة قسم جديد</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-sitemap"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الفرعية</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ App\Models\SubCategory::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{ route('admin.subCategories') }}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.subCategories.create') }}" data-i18n="nav.dash.crypto">اضافة قسم فرعى جديد</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المتاجر</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ App\Models\Vendor::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{ route('admin.vendors') }}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.vendors.create') }}" data-i18n="nav.dash.crypto">اضافة متجر جديد</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-cog"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاعدادات</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">

                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="" data-i18n="nav.dash.ecommerce">وسائل التوصيل</a>
                        <ul class="menu-content">
                            <li>
                                <a class="menu-item" href="" data-i18n="nav.dash.main">توصيل مجانى</a>
                            </li>
                            <li>
                                <a class="menu-item" href="" data-i18n="nav.dash.main">توصيل داخلى</a>
                            </li>
                            <li>
                                <a class="menu-item" href="" data-i18n="nav.dash.main">توصيل خارجى</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>

            <!-- ====================================================== -->

        </ul>

    </div>
</div>
