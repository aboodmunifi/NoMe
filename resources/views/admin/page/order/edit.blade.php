@extends('admin.layout')

@section('title', "تعديل طلبية"))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">تعديل طلبية</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">تعديل طلبية</a>
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
                                    <h4 class="card-title">تعديل طلبية</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route('admin.orders.update',$orders->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')

                                            <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="person_name">اسم  صاحب الطلبية</label>
                                                    <input
                                                        type="text"
                                                        disabled
                                                        id="person_name"
                                                        class="form-control @error('person_name') is-invalid @enderror"
                                                        placeholder="ادخل اسم الطلبية"
                                                        name="person_name"
                                                        value="{{ old('person_name')?? old('person_name') ?? $orders->person_name }}"
                                                    />
                                                    @if($errors->has('person_name'))
                                                        <div
                                                            class="invalid-feedback">{{ $errors -> first('person_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 col-6">
                                                    <label for="name"
                                                        class="mr-sm-2" style="font-size: 16px"> الحالة  
                                                        :</label>
    
                                                    <div class="box col-md-12">
                                                        <select class="form-control form-control-lg " name="status">
                                                          
                                                              
                                                            <option value="1"  @if($orders->status == 1){{ 'selected' }} @endif>تسليم طلبية</option>
                                                            <option value="0"  @if($orders->status == 0){{ 'selected' }} @endif>طلبية غير مسلمة</option>
                                                            
                                                        </select>
                                                    </div>
    
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                            <br>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">تعديل</button>
                                                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">عودة</a>
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
