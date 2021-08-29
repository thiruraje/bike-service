<footer class="main-footer">
    <strong> <a href="">{{auth()->user()->name}}</a>.</strong> 
</footer>
</div>
<script src="{{ url('/assets/js/app.min.js') }}"></script>
<script src="{{ url('/assets/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('/assets/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/assets/js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('/assets/js/datatable/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('/assets/js/datatable/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('/assets/js/datatable/jszip.min.js') }}"></script>
<script src="{{ url('/assets/js/datatable/pdfmake.min.js') }}"></script>
<script src="{{ url('/assets/js/datatable/vfs_fonts.js') }}"></script>
<script src="{{ url('/assets/js/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ url('/assets/js/datatable/buttons.print.min.js') }}"></script>
<script src="{{ url('/assets/js/datatable/date-dd-MMM-yyyy.js') }}"></script>
<script src="{{ url('/assets/js/datatable/jquery-ui.js') }}"></script>
<script src="{{ url('/assets/js/moment.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" type="text/javascript"></script>


<script>
    $(document).ready( function () {
        $('.DataTable').DataTable({
        	 "order": []
        });
    });
</script>
@yield('Modal')
@yield('script')
