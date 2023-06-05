<!-- JAVASCRIPT -->
<script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('js/pages/custom-form-validation.js')}}"></script>

<script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/select2/js/select2.min.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Buttons examples -->
<script src="{{asset('libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- dashboard init -->
{{--<script src="{{asset('js/pages/dashboard.init.js')}}"></script>--}}


<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/pages/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/pages/toastr.min.js') }}"></script>
<script src="{{ asset('js/pages/ajax-request.js') }}"></script>

<script>
    $(document).ready(function () {$("#datatable").DataTable()});
    @if(Session::has('message'))
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break
    }
    @endif
</script>
