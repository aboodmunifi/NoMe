@extends('admin.layout')

@section('title', __('الأقسام'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">

                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">اضافة قسم</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">اضافة قسم</a>
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
                                    <h4 class="card-title">اضافة قسم</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="category_name">اسم القسم</label>
                                                    <input
                                                        type="text"
                                                        id="category_name"

                                                        class="form-control @error('category_name') is-invalid @enderror"
                                                        placeholder=" الرجاء ادخال اسم القسم  "
                                                        name="category_name"
                                                        value="{{ old('category_name') }}"
                                                    />
                                                    @if($errors->has('category_name'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors->first('category_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">حفظ</button>
                                                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">عودة</a>
                                            </div>
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
