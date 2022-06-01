<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active">
                <a href="{{ route('admin.dashboard') }}">
                    {{-- Line Awesome Icons --}}
                    {{-- https://themewagon.github.io/Ready-Bootstrap-Dashboard/icons.html --}}
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{ trans('admin/sidebar.Home') }}</span>
                </a>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item @if (Request::is('admin/associations*')) open @endif ">
                <a href="">
                    <i class="la la-font"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ trans('admin/sidebar.WebsiteLanguages') }}</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ App\Models\Language::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.languages') }}" data-i18n="nav.dash.ecommerce">{{ trans('admin/sidebar.ViewAll') }}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.languages.create') }}" data-i18n="nav.dash.crypto">{{ trans('admin/sidebar.AddNewLanguage') }}</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-sitemap"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ trans('admin/sidebar.MainCategories') }}</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">

                        {{-- 🔥 For Unpaid 🔥 --}}

                        {{-- Use Scope in MainCategory Model --}}
                        {{-- {{ App\Models\MainCategory::DefaultCategory() -> count() }} --}}

                        {{-- 🔥 For Paid 🔥 --}}

                        {{\App\Models\Category::Parent() -> count()}}

                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.mainCategories') }}" data-i18n="nav.dash.ecommerce">{{ trans('admin/sidebar.ViewAll') }}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.mainCategories.create') }}" data-i18n="nav.dash.crypto">{{ trans('admin/sidebar.AddNewMainCategory') }}</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-sitemap"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ trans('admin/sidebar.SubCategories') }}</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">

                        {{-- 🔥 For Unpaid 🔥 --}}

                        {{-- {{ App\Models\SubCategory::count() }} --}}

                        {{-- 🔥 For Paid 🔥 --}}

                        {{\App\Models\Category::Child() -> count()}}

                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.subCategories') }}" data-i18n="nav.dash.ecommerce">{{ trans('admin/sidebar.ViewAll') }}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.subCategories.create') }}" data-i18n="nav.dash.crypto">{{ trans('admin/sidebar.AddNewSubCategory') }}</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-institution"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ trans('admin/sidebar.Vendors') }}</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ App\Models\Vendor::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    {{-- class="active" --}}
                    <li>
                        <a class="menu-item" href="{{ route('admin.vendors') }}" data-i18n="nav.dash.ecommerce">{{ trans('admin/sidebar.ViewAll') }}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.vendors.create') }}" data-i18n="nav.dash.crypto">{{ trans('admin/sidebar.AddNewVendor') }}</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-registered"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الماركات التجارية</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">

                        {{ App\Models\Brand::count() }}

                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.brands') }}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.brands.create') }}" data-i18n="nav.dash.crypto">اضافة ماركة</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-tag"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">العلامات</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">

                        {{ App\Models\Tag::count() }}

                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.tags') }}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.tags.create') }}" data-i18n="nav.dash.crypto">اضافة علامة</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-cart-plus"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">

                        {{ App\Models\Product::count() }}

                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.products') }}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.products.general.create') }}" data-i18n="nav.dash.crypto">اضافة منتج</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-check-circle-o"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> خصائص المنتج </span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">

                        {{ App\Models\Attribute::count() }}

                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.attributes') }}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.attributes.create') }}" data-i18n="nav.dash.crypto">اضافة خاصية</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-check-circle-o"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قيم الخصائص </span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">

                        {{ App\Models\Option::count() }}

                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.options') }}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.options.create') }}" data-i18n="nav.dash.crypto">اضافة قيمة</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    {{-- la la-film | la la-camera--}}
                    <i class="la la-image"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> السليدر </span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">

                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.sliders.create') }}" data-i18n="nav.dash.ecommerce">صور السليدر</a>
                    </li>
                </ul>
            </li>

            <!-- ====================================================== -->

            <li class="nav-item">
                <a href="">
                    <i class="la la-cog"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ trans('admin/sidebar.settings') }}</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{ App\Models\Setting::count() }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="" data-i18n="nav.dash.ecommerce">{{ trans('admin/sidebar.ShippingMethods') }}</a>
                        <ul class="menu-content">
                            <li>
                                <a class="menu-item" href="{{ route('edit.shipping.methods', 'free') }}">{{ trans('admin/sidebar.FreeShipping') }}</a>
                            </li>
                            <li>
                                <a class="menu-item" href="{{ route('edit.shipping.methods', 'local') }}">{{ trans('admin/sidebar.LocalShipping') }}</a>
                            </li>
                            <li>
                                <a class="menu-item" href="{{ route('edit.shipping.methods', 'outer') }}">{{ trans('admin/sidebar.OuterShipping') }}</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>

            <!-- ====================================================== -->

        </ul>

    </div>
</div>
