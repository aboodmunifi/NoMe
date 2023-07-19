@extends('admin.layout')

@section('title', __('المنتجات'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">تعديل منتج</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">تعديل منتج</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">تعديل منتج</h4>
                                </div>
                                <div class="card-body">

                                    <form class="form" method="post" action="{{route('admin.products.update',$product->id)}}" enctype="multipart/form-data" >
                                        @csrf
                                        @method('patch')

                                        <div class="row">

                                            <div class="col-md-4 col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name" style="font-size: 16px">اسم المنتج</label>
                                                    <input
                                                        type="text"
                                                        id="name"
                                                        class="form-control @error('product_name') is-invalid @enderror"
                                                        placeholder=" الرجاء ادخال اسم المنتج  "
                                                        name="product_name"
                                                        required
                                                        value="{{ old('product_name')?? old('product_name') ?? $product->product_name }}"
                                                    />
                                                    @if($errors->has('product_name'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors -> first('product_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-6">
                                                <label for="name"
                                                    class="mr-sm-2" style="font-size: 16px"> اسم القسم الفرعي
                                                    :</label>

                                                <div class="box col-md-12">
                                                    <select class="form-control form-control-lg " name="sub_category_id" required>
                                                        <option disabled="" selected="" value="{{ $product->sub_category_id }}">{{ $product->subCategory->sub_category_name }}</option>

                                                        @foreach ($subCategories as $subCategory)

                                                                <option value="{{ $subCategory->id }}">
                                                                    {{ $subCategory->sub_category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-4 col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="price" style="font-size: 16px">السعر </label>
                                                    <input
                                                        type="text"
                                                        id="price"
                                                        required
                                                        class="form-control @error('price') is-invalid @enderror"
                                                        placeholder=" الرجاء ادخال سعر المنتج  "
                                                        name="price"
                                                        value="{{ old('price')?? old('price') ?? $product->price }}"
                                                    />
                                                    @if($errors->has('price'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors -> first('price') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="description" style="font-size: 16px">الوصف </label>
                                                    <input
                                                        type="text"
                                                        id="description"
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        placeholder=" الرجاء ادخال  وصف المنتج  "
                                                        name="description"
                                                        value="{{ old('description')?? old('description') ?? $product->description }}"

                                                    />
                                                    @if($errors->has('description'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors -> first('description') }}</div>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>


                                        <br>
                                        <div>
                                            <label style="font-size: 16px">المقاسات المحددة مسبقا</label>
                                            <p>
                                                @foreach ($product->sizes as $size)
                                                    <b style="font-size: 16px">{{ $size->size_name }}</b> ||
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="repeater-default">
                                            <div data-repeater-list="sizes">
                                                <div data-repeater-item>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="form-label" for="size" style="font-size: 16px">ادخل المقاس </label>

                                                            <div class="box ">
                                                                <input
                                                                    type="text"
                                                                    id="size"
                                                                    class="form-control @error('size') is-invalid @enderror"
                                                                    placeholder=" الرجاء ادخال المقاس  "
                                                                    name="size"

                                                                    value="{{ old('size') }}"
                                                                />
                                                                @if($errors->has('size'))
                                                                    <div
                                                                        class="invalid-feedback">{{ $errors -> first('size') }}</div>
                                                                @endif
                                                            </div>


                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2" style="font-size: 16px">العمليات
                                                                :</label>
                                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                                value="حذف المقاس" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="row mt-20">
                                                    <div class="col-12">
                                                        <input class="button" data-repeater-create type="button"
                                                            value="اضافة مقاس أخر" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                        <label style="font-size: 16px">الألوان المحددة مسبقا</label>
                                            <p>
                                                @foreach ($product->colors as $color)
                                                    <b style="font-size: 16px">{{ $color->color_name }}</b> ||
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="repeater-default">
                                            <div data-repeater-list="colors">
                                                <div data-repeater-item>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="form-label" for="color" style="font-size: 16px">ادخل اللون </label>

                                                            <div class="box ">
                                                                <input
                                                                    type="text"
                                                                    id="color"
                                                                    class="form-control @error('color') is-invalid @enderror"
                                                                    placeholder=" الرجاء ادخال اللون  "
                                                                    name="color"

                                                                    value="{{ old('color') }}"
                                                                />
                                                                @if($errors->has('color'))
                                                                    <div
                                                                        class="invalid-feedback">{{ $errors -> first('color') }}</div>
                                                                @endif
                                                            </div>


                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2" style="font-size: 16px">العمليات
                                                                :</label>
                                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                                value="حذف اللون" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="row mt-20">
                                                    <div class="col-12">
                                                        <input class="button" data-repeater-create type="button"
                                                            value="اضافة لون أخر" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">

                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1" style="font-size: 16px">صورة المنتج الرئيسية
                                                        :</label>
                                                    <input type="file" name="primary_image" class="form-control-file"
                                                        id="exampleFormControlFile1">
                                                    <img src="{{ asset('upload/admin/product/'. $product->primary_image) }}" width="100px" />
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <label style="font-size: 16px">الصور المحددة مسبقا</label>
                                                <p>
                                                    @foreach ($product->images as $image)
                                                    <img src="{{ asset('upload/admin/product/'. $image->image_name) }}" width="90px" />

                                                    @endforeach
                                                </p>
                                            </div>

                                        <div class="repeater-default">
                                            <div data-repeater-list="images">
                                                <div data-repeater-item>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="second_image"
                                                                class="mr-sm-2" style="font-size: 16px">اضافة صورة أخرى
                                                                :</label>

                                                            <div class="box ">
                                                                <input type="file" name="second_image" class="form-control-file"
                                                                id="second_image">
                                                            </div>

                                                        </div>
                                                        <div class="col">
                                                            <label for=""
                                                                class="mr-sm-2" style="font-size: 16px">العمليات
                                                                :</label>
                                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                                value="حذف الصورة" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="row mt-20">
                                                    <div class="col-12">
                                                        <input class="button"  data-repeater-create type="button"
                                                            value="اضافة صورة أخرى" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <br>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">حفظ</button>
                                                <a href="" class="btn btn-outline-secondary">عودة</a>
                                            </div>



                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
