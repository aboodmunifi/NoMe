@extends('admin.layout')

@section('title', 'الأقسام الفرعية')

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">الاقسام الفرعية</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">الاقسام الفرعية</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if (session('delete'))
                                <div class="alert alert-success">{{ session('delete') }}</div>
                            @endif
                            @if (session('update'))
                                <div class="alert alert-info">{{ session('update') }}</div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-danger">{{ session('warning') }}</div>
                            @endif
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">الأقسام الفرعية</h4>
                                    <a href="{{ route('admin.sub_categories.create') }}"
                                       class="btn btn-primary me-1">اضافة قسم فرعي</a>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم القسم الفرعي</th>
                                            <th>القسم الثانوي</th>
                                            <th>تاريخ الاضافة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($subCategories as $subCategory )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $subCategory->sub_category_name }}</td>
                                                <td>{{ $subCategory->secondCategory->second_category_name ?? "القسم غير موجود"}}</td>
                                                <td>{{ $subCategory->created_at }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm text-white dropdown-toggle hide-arrow py-0"
                                                            data-bs-toggle="dropdown"
                                                        >
                                                            <a class="dropdown-item" href="#">
                                                                <i data-feather="settings" class="me-50"></i>
                                                            </a>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="{{ route('admin.sub_categories.edit', $subCategory->id ) }}">
                                                                <i data-feather="edit-2" class="me-50"></i>
                                                                <span>تعديل</span>
                                                            </a>
                                                            <form class="dropdown-item" method="post" action="{{ route('admin.sub_categories.destroy', $subCategory->id ) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <i data-feather="trash" class="me-50"></i>
                                                                <input type="hidden" value="{{ $subCategory->id }}" name="id" />
                                                                <span><button  style="background: none; border: none; outline: none" type="submit">حذف</button></span>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr colspan="3">لا يوجد أقسام</tr>
                                            @endforelse


                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/js/scripts/tables/table-datatables-advanced.min.js') }}"></script>
@endsection
