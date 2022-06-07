@extends('layouts.admin')

@section('title')
    ادارة المستودع
@stop

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">المنتجات</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}"> الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.products')}}">المنتجات</a>
                                </li>
                                <li class="breadcrumb-item active"> ادارة المستودع
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
                                    <h4 class="card-title" id="basic-layout-form"> ادارة المستودع </h4>
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

                                        <form class="form" action="{{route('admin.products.stock.store')}}" method="POST" enctype="multipart/form-data">

                                            @csrf

                                            <input type="hidden" name="product_id" value="{{$id}}">

                                            <!-- ------------------------------------- -->

                                            <div class="form-body">

                                                <h4 class="form-section"> <i class="ft-home"></i> اداره المستودع </h4>

                                                <!-- ------------------------------------- -->

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">كود  المنتج</label>
                                                            <input type="text" value="{{old('sku')}}" id="sku" class="form-control" placeholder="" name="sku">
                                                            @error("sku")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                            <label for="projectinput1"> حالة المنتج </label>

                                                            <select name="in_stock" class="select2 form-control">

                                                                <optgroup label="من فضلك أختر الحالة ">
                                                                    <option value="1"> متوفر </option>
                                                                    <option value="0"> غير متوفر </option>
                                                                </optgroup>

                                                            </select>

                                                            @error('in_stock')
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- ------------------------------------- -->

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                            <label for="projectinput1"> تتبع المستودع </label>

                                                            <select name="manage_stock" class="select2 form-control" id="manageStock">

                                                                <optgroup label="من فضلك أختر التتبع ">
                                                                    <option value="1"> متاح </option>
                                                                    <option value="0" selected> غير متاح </option>
                                                                </optgroup>

                                                            </select>

                                                            @error('manage_stock')
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="display:none" id="qtyDiv">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الكمية</label>
                                                            <input type="text" value="{{old('qty')}}" id="qty" class="form-control" placeholder="" name="qty">
                                                            @error("qty")
                                                            <span class="text-danger">{{$message}}</span>
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

@section('script')

    <script>

        $(document).on('change','#manageStock',function(){

            if($(this).val() == 1 ){

                // Show Quantity Field
                $('#qtyDiv').show();

            }else{

                $('#qtyDiv').hide();

            }

        });

    </script>

@stop
