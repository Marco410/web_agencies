
@if(Route::is(['agencias']))
<script src="{{asset('assets/js/view_controllers/agencias_vs.js')}}"></script>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3cOZ4msHc0Ty1zVmpkJ96QRmxEdlzQkk&callback=agenciasMarkers"  ></script>
@endif
@if(Route::is(['index','agencias']))
<script src="{{asset('assets/js/view_controllers/index_vs.js')}}"></script>
@endif

<!-- Sticky Sidebar JS -->
<script src="{{asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<!-- Datepicker Core JS -->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Owl JS -->
<script src="{{asset('assets/plugins/owlcarousel/owl.carousel.min.js')}}"></script>

@if(Route::is(['user.citas','user.comments']))
<!-- Datatables JS -->
<script src="{{asset('assets_admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
@endif

@if(Route::is(['user.perfil']))
<script src="{{asset('assets/js/view_controllers/usuario_perfil_vs.js')}}"></script>
@endif
<!-- Custom JS -->
<script src="{{asset('assets/js/owl2row.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>


@if(Route::is(['agencia.detalles']))
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
<script>
  flatpickr("input[type=datetime-local]", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    altInput: true,
    altFormat: "j F Y H:i",
    minDate: "today",
    locale: "es",
    time_24hr: false
  });
</script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3cOZ4msHc0Ty1zVmpkJ96QRmxEdlzQkk&callback=initialize&v=weekly"
      async
    ></script>
<script src="{{asset('assets/js/view_controllers/agencias_vs.js')}}"></script>
@endif

@if(Route::is(['landing.index']))
<script src="{{asset('assets/js/landing.js')}}"></script>
@endif

@if(Route::is(['user.personal']))
<script src="{{asset('assets/js/view_controllers/personal_vs.js')}}"></script>
@endif

@if(Route::is(['user.comments']))
<script src="{{asset('assets/js/view_controllers/comentarios_vs.js')}}"></script>
@endif

@if(Route::is(['user.perfil.membresia.contrato']))
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script src="{{asset('assets/js/view_controllers/membresia_contrato_vs.js')}}"></script>

@endif

@if(Route::is(['user.agency.stats']))
<script src="{{asset('assets/js/view_controllers/usuario_agency_vs.js')}}"></script>
@endif

@if(Route::is(['user.reportes']))
<script src="{{asset('assets/js/view_controllers/reports_user_vs.js')}}"></script>

@endif

@if(Route::is(['user.citas']))
<script src="{{asset('assets/js/view_controllers/citas_vs.js')}}"></script>
@endif

@if(Route::is(['user.agency.solicitar']))
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3cOZ4msHc0Ty1zVmpkJ96QRmxEdlzQkk&callback=initMap&libraries=places&v=weekly&language=es" ></script>
<script src="{{asset('assets/js/view_controllers/agencies_user_vs.js')}}"></script>
@endif