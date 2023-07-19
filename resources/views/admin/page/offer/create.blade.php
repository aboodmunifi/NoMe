@extends('admin.layout')

@section('title', __('العرضات'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">اضافة عرض</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">اضافة عرض</a>
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
                                    <h4 class="card-title">اضافة عرض</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post" action="{{route('admin.offers.store')}}" enctype="multipart/form-data" >
                                        @csrf




                                        <div class="row">

                                            <div class="col-md-4 col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="new_price" style="font-size: 16px">السعر </label>
                                                    <input
                                                        type="text"
                                                        id="new_price"
                                                        required
                                                        class="form-control @error('new_price') is-invalid @enderror"
                                                        placeholder=" الرجاء ادخال سعر العرض  "
                                                        name="new_price"
                                                        value="{{ old('new_price') }}"
                                                    />
                                                    @if($errors->has('new_price'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors -> first('new_price') }}</div>
                                                    @endif
                                                </div>
                                            </div>




                                        </div>
                                        <div class="row">

                                            <div class="col-md-4 col-6">
                                                <label for="name"
                                                    class="mr-sm-2" style="font-size: 16px"> اسم  المنتج
                                                    :</label>

                                                <div class="box col-md-12">
                                                    <select class="form-control form-control-lg " name="product_id">
                                                        
                                                        @forelse ($products as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->product_name }}</option>
                                                        @empty
                                                            <div>جميع المنتجات عليها عروض</div>
                                                        @endforelse
                                                    </select>
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
