<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
{{-- {{ Html::script(mix('js/app.js')) }} --}}
{{ Html::script('https://unpkg.com/axios/dist/axios.min.js') }}


    <script src="{{ asset('styles/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('styles/js/popper.min.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap-hijri-datetimepicker.js') }}"></script>
    <script src="{{ asset('styles/js/app.js') }}"></script>
    <script src="{{ asset('styles/js/course.js') }}"></script>
    <script src="{{ asset('styles/js/info.js') }}"></script>
    <script src="{{ asset('styles/js/load.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/components-datatable_ar.js') }}"></script>
    <script src="{{ asset('styles/js/wizard/jquery.smartWizard.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
    @yield('extend_js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>