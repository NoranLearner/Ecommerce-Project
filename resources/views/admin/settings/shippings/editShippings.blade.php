@extends('layouts.admin')

@section('title')
    وسائل التوصيل
@stop

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">وسائل التوصيل</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}"> الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> وسائل التوصيل
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">

                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">

                    <div class="row match-height">

                        <div class="col-md-12">

                            <div class="card">

                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> تعديل وسيلة التوصيل </h4>
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
                                    <div class="card-body">

                                        <form class="form" action="{{route('update.shipping.methods',$shippingMethod -> id)}}" method="POST" enctype="multipart/form-data">

                                            @csrf

                                            <!-- No Validate For logo & password in edit form , Not required in edit form -->
                                            <input name="id" value="{{$shippingMethod -> id}}" type="hidden">

                                            <!-- ------------------------------------- -->

                                            {{-- <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$vendor -> logo}}"
                                                        class="height-150" alt="لوجو المتجر">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label> لوجو المتجر </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="logo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('logo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div> --}}

                                            <!-- ------------------------------------- -->

                                            <div class="form-body">

                                                <h4 class="form-section"> <i class="ft-home"></i> بيانات  وسائل التوصيل </h4>

                                                <!-- ------------------------------------- -->

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الاسم </label>
                                                            <input type="text" value="{{$shippingMethod -> value}}" id="value" class="form-control" placeholder="" name="value">
                                                            @error("value")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> قيمه التوصيل </label>
                                                            <input type="number" value="{{$shippingMethod -> plain_value}}" id="plain_value" class="form-control" placeholder="" name="plain_value">
                                                            @error("plain_value")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- ------------------------------------- -->

                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </section>
                <!-- // Basic form layout section end -->

            </div>

        </div>
    </div>
@endsection
