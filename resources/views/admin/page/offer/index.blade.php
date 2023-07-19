@extends('admin.layout')

@section('title', 'العروض')

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
                            <h2 class="content-header-title float-start mb-0">العروض</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">العروض</a>
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
                            <div class="card">
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
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">الأقسام</h4>
                                    <a href="{{route('admin.offers.create')}}"
                                       class="btn btn-primary me-1">اضافة عرض</a>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم منتج</th>
                                            <th>السعر الجديد</th>
                                            <th>السعر القديم</th>
                                            <th>تاريخ الاضافة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($offers as $offer)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$offer->product->product_name}}</td>
                                                <td>{{$offer->new_price}}</td>
                                                <td>{{$offer->old_price}}</td>


                                                <td>{{$offer->created_at}}</td>

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

                                                            <form class="dropdown-item" method="post" action="{{route('admin.offers.destroy',$offer->id)}}">
                                                                @csrf
                                                                @method('delete')
                                                                <i data-feather="trash" class="me-50"></i>
                                                                <span><button data-toggle="modal"
                                                                    data-target="#delete{{ $offer->id }}" style="background: none; border: none; outline: none" type="submit">حذف</button></span>


                                                                </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach


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
