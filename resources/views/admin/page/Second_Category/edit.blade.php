@extends('admin.layout')

@section('title', "تعديل قسم ثانوي"))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">تعديل قسم ثانوي</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">تعديل قسم ثانوي</a>
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
                                    <h4 class="card-title">تعديل قسم ثانوي</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route('admin.second_categories.update',$secondCategory->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                            <div class="row">
                                            <div class="col-md-4 col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="second_category_name">: اسم القسم الثانوي</label>
                                                    <input
                                                        type="text"
                                                        id="second_category_name"
                                                        class="form-control form-control-lg @error('second_category_name') is-invalid @enderror"
                                                        placeholder="ادخل اسم القسم الثانوي"
                                                        name="second_category_name"
                                                        value="{{ old('second_category_name')?? old('second_category_name') ?? $secondCategory->second_category_name }}"
                                                    />
                                                    @if($errors->has('second_category_name'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors -> first('second_category_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-6">
                                            <div class="mb-1">
                                                <label for="name"
                                                    class="mr-sm-2" style="font-size: 16px"> اسم القسم الرئيسي
                                                    :</label>

                                                {{-- <div class="box col-12"> --}}
                                                    <select class="form-control form-control-lg " name="category_id" required>
                                                        <option disabled="" selected="" value="{{ $secondCategory->category_id }}">{{ $secondCategory->category->category_name }}</option>

                                                        @foreach ($categories as $category)

                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                {{-- </div> --}}

                                            </div>
                                            </div>

                                        </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">تعديل</button>
                                                <a href="{{ route('admin.second_categories.index') }}" class="btn btn-outline-secondary">عودة</a>
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
