@extends('admin.layout')

@section('title', __('الصور'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">

                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">اضافة صورة</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">اضافة صورة</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="multiple-column-form">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">اضافة صورة</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="image_name">اسم الصورة</label>
                                                    <input
                                                        type="text"
                                                        id="image_name"

                                                        class="form-control @error('image_name') is-invalid @enderror"
                                                        placeholder=" الرجاء ادخال اسم الصورة  "
                                                        name="image_name"
                                                        value="{{ old('image_name') }}"
                                                    />
                                                    @if($errors->has('image_name'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors->first('image_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>


                                          
                                        </div>
                                        <div class="row">
                                
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1" style="font-size: 16px">الصورة  
                                                        :</label>
                                                    <input type="file" name="image_src" class="form-control-file" required
                                                        id="exampleFormControlFile1">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1">حفظ</button>
                                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">عودة</a>
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
