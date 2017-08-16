<script src="{{ asset('web/js/plugin/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/dataTables.bootstrap.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('theme/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('theme/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/scripts/datatable.js') }}"></script>
<script src="{{ asset('web/js/plugin/table-editable.js') }}" type="text/javascript"></script>

<!-- <script src="{{ asset('theme/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script> -->
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- <script type="text/javascript" src="{{ asset('theme/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ asset('theme/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script> -->

<!-- END PAGE LEVEL PLUGINS -->

<script>
jQuery(document).ready(function() {    
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	TableEditable.init();
        });
</script>
<script>
    var winHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    $('.page-content').css('min-height',winHeight);
</script>