@extends('layouts.admin')

@section('title')
    اضافة منتج
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
                                <li class="breadcrumb-item active">إضافة منتج
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
                                    <h4 class="card-title" id="basic-layout-form"> إضافة منتج </h4>
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

                                        <form class="form" action="{{route('admin.products.general.store')}}" method="POST" enctype="multipart/form-data">

                                            @csrf

                                            <!-- ------------------------------------- -->

                                            <div class="form-body">

                                                <h4 class="form-section"> <i class="ft-home"></i> البيانات الاساسية للمنتج </h4>

                                                <!-- ------------------------------------- -->

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">اسم المنتج </label>
                                                            <input type="text" value="{{old('name')}}" id="name" class="form-control" placeholder="" name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الاسم بالرابط</label>
                                                            <input type="text" value="{{old('slug')}}" id="slug" class="form-control" placeholder="" name="slug">
                                                            @error("slug")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- ------------------------------------- -->

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">وصف المنتج</label>
                                                            <textarea  name="description" id="description" class="form-control" placeholder="">
                                                                {{old('description')}}
                                                            </textarea>
                                                            @error("description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الوصف المختصر</label>
                                                            <textarea  name="short_description" id="short_description" class="form-control" placeholder="">
                                                                {{old('short_description')}}
                                                            </textarea>
                                                            @error("short_description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- ------------------------------------- -->

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">

                                                            <label for="projectinput1"> اختر القسم </label>

                                                            <select name="categories[]" class="select2 form-control" multiple>

                                                                <optgroup label="من فضلك أختر القسم ">

                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $category)
                                                                            <option value="{{$category -> id }}">
                                                                                {{$category -> name}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif

                                                                </optgroup>

                                                            </select>

                                                            @error('categories.0')
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                    <!-- ----------------- -->

                                                    <div class="col-md-4">
                                                        <div class="form-group">

                                                            <label for="projectinput1"> اختر ألعلامات الدلالية </label>

                                                            {{-- May Add multiple --}}
                                                            <select name="tags[]" class="select2 form-control" multiple>

                                                                <optgroup label="من فضلك أختر ألعلامات الدلالية ">

                                                                    @if($tags && $tags -> count() > 0)
                                                                        @foreach($tags as $tag)
                                                                            <option value="{{$tag -> id }}">
                                                                                {{$tag -> name}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif

                                                                </optgroup>

                                                            </select>

                                                            @error('tags')
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                    <!-- ----------------- -->

                                                    <div class="col-md-4">
                                                        <div class="form-group">

                                                            <label for="projectinput1"> اختر الماركة التجارية </label>

                                                            <select name="brand_id" class="select2 form-control">

                                                                <optgroup label="من فضلك أختر الماركة ">

                                                                    @if($brands && $brands -> count() > 0)
                                                                        @foreach($brands as $brand)
                                                                            <option value="{{$brand -> id }}">
                                                                                {{$brand -> name}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif

                                                                </optgroup>

                                                            </select>

                                                            @error('brand_id')
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- ------------------------------------- -->

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">

                                                            <label for="switcheryColor4" class="card-title ml-1">الحالة</label>

                                                            <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success" checked/>

                                                            @error("is_active")
                                                                <span class="text-danger">{{$message }}</span>
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
                                                    <i class="la la-check-square-o"></i> حفظ
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
