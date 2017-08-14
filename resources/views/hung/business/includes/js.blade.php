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
<script src="{{ asset('web/js/plugin/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/plugin/table-editable.js') }}" type="text/javascript"></script>
@yield('custom js')
<script>
jQuery(document).ready(function() {       
	Metronic.init();
	Layout.init();
	Demo.init();
	TableEditable.init();
});
</script>
<script>
    var winHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    $('.page-content').css('min-height',winHeight);
</script>