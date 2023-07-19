@extends('admin.layout')

@section('title', "تعديل قسم"))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">تعديل مستخدم</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">تعديل مستخدم</a>
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
                                    <h4 class="card-title">تعديل مستخدم</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route('admin.users.update',$user->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                            <div class="row">
                                                 <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name">اسم مستخدم</label>
                                                    <input
                                                        type="text"
                                                        id="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="ادخل اسم مستخدم"
                                                        name="name"
                                                        value="{{ old('name')?? old('name') ?? $user->name }}"
                                                    />
                                                    @if($errors->has('name'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors -> first('name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password"> كلمة سر</label>
                                                    <input
                                                        type="password"
                                                        id="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        placeholder="ادخل كلمة السر "
                                                        name="password"
                                                        value="{{ old('password')?? old('password') ?? $user->password }}"

                                                        
                                                    />
                                                    @if($errors->has('password'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors -> first('password') }}</div>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <label for="name"
                                                        class="mr-sm-2">صلاحية 
                                                        :</label>
    
                                                    <div class="box col-md-12">
                                                        <select class="form-control form-control-lg " name="role">
                                                              
                                                            <option value="" ></option>
                                                            <option value="user" @if ($user->role == 'user') selected @endif>مستخدم</option>
                                                            <option value="admin" @if ($user->role == 'admin') selected @endif>مدير</option>

                                                        </select>
                                                    </div>
    
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">تعديل</button>
                                                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">عودة</a>
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
