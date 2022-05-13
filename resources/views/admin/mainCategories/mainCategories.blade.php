@extends('layouts.admin')

@section('title')
    الاقسام الرئيسية
@stop

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الاقسام الرئيسية </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الاقسام الرئيسية
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">

                <!-- DOM - jQuery events table -->

                <section id="dom">

                    <div class="row">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header">
                                    <h4 class="card-title">الاقسام الرئيسية</h4>
                                    <a class="heading-elements-toggle">
                                        <i class="la la-ellipsis-v font-medium-3"></i>
                                    </a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">

                                            <thead>

                                                {{-- 🔥 For Unpaid 🔥 --}}
{{--
                                                <tr>
                                                    <th>اسم القسم</th>
                                                    <th>اختصار اللغة</th>
                                                    <th>الصورة</th>
                                                    <th>الحالة</th>
                                                    <th>الإجراءات</th>
                                                </tr>
--}}
                                                {{-- 🔥 For Paid 🔥 --}}

                                                <th>الاسم</th>
                                                <th>القسم الرئيسي</th>
                                                <th> الاسم بالرابط</th>
                                                <th>صوره القسم</th>
                                                <th>الحالة</th>
                                                <th>الإجراءات</th>

                                            </thead>

                                            <tbody>

                                                {{-- 🔥 For Unpaid 🔥 --}}
                                                {{-- @isset($mainCategories) --}}

                                                {{-- 🔥 For Paid 🔥 --}}
                                                @isset($categories)

                                                    {{-- 🔥 For Unpaid 🔥 --}}
                                                    {{-- @foreach($mainCategories as $mainCategory) --}}

                                                    {{-- 🔥 For Paid 🔥 --}}
                                                    @foreach($categories as $category)

                                                        <tr>

                                                            {{-- 🔥 For Unpaid 🔥 --}}
                                                            {{-- <td>{{$mainCategory -> name}}</td> --}}

                                                            {{-- 🔥 For Paid 🔥 --}}
                                                            <td>{{$category -> name}}</td>

                                                            {{-- 🔥 For Unpaid 🔥 --}}
                                                            {{-- <td>{{$mainCategory -> translation_lang}}</td> --}}
                                                            {{-- OR Use Helper Function --}}
                                                            {{-- <td>{{getDefaultLang()}}</td> --}}

                                                            {{-- 🔥 For Paid 🔥 --}}
                                                            <td>{{$category -> _parent -> name  ?? '--' }}</td>

                                                            {{-- 🔥 For Paid 🔥 --}}
                                                            <td>{{$category -> slug}}</td>

                                                            {{-- 🔥 For Unpaid 🔥 --}}
                                                            {{-- <td> <img src="{{$mainCategory -> photo}}" alt="" style="width: 100px; height: 100px;"> </td> --}}

                                                            {{-- 🔥 For Paid 🔥 --}}
                                                            <td> <img style="width: 150px; height: 100px;" src=" "></td>

                                                            {{-- 🔥 For Unpaid 🔥 --}}
                                                            {{-- In Main Category Model --}}
                                                            {{-- <td>{{$mainCategory -> getActive()}}</td> --}}

                                                            {{-- 🔥 For Paid 🔥 --}}
                                                            <td>{{$category -> getActive()}}</td>

                                                            <td>

                                                                {{-- 🔥 For Unpaid 🔥 --}}
                                                                {{-- <div class="btn-group" role="group" aria-label="Basic example">

                                                                    <a href="{{ route( 'admin.mainCategories.edit', $mainCategory -> id ) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"> تعديل </a>

                                                                    <a href="{{ route( 'admin.mainCategories.status', $mainCategory -> id ) }}" class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                        @if($mainCategory -> active == 0)
                                                                            تفعيل
                                                                            @else
                                                                            الغاء التفعيل
                                                                        @endif
                                                                    </a>

                                                                    <a href="{{ route('admin.mainCategories.delete', $mainCategory -> id) }}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"> حذف </a>

                                                                </div> --}}

                                                                {{-- 🔥 For Paid 🔥 --}}
                                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                                    <a href="{{ route( 'admin.mainCategories.edit', $category -> id ) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1"> تعديل </a>

                                                                    <a href="{{ route('admin.mainCategories.delete', $category -> id) }}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"> حذف </a>

                                                                </div>

                                                            </td>

                                                        </tr>

                                                    @endforeach

                                                @endisset

                                            </tbody>

                                        </table>

                                        <div class="justify-content-center d-flex"></div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </section>
                <!-- / DOM - jQuery events table -->

            </div>

        </div>
    </div>
@endsection
