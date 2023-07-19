<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25"> حقوق الطبع محفوظة &copy; 2021<a class="ms-25" href="" target="_blank">متجر نو مي</a><span class="d-none d-sm-inline-block"></span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>


<script src="{{ asset('dashboard/app-assets/vendors/js/vendors.min.js') }}"></script>

@yield('scripts')

<script src="{{ asset('dashboard/app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/js/core/app.min.js') }}"></script>
<!-- jquery -->
<script src="{{ URL::asset('dashboard/app-assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('dashboard/app-assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->

<script>
    var plugin_path = 'js/';
</script>
<script>
    $(window).on('load',  function(){
        if (feather) {
            feather.replace({ width: 14, height: 14 });
        }
    })
</script>
