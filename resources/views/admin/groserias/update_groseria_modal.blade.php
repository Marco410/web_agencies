<div class="modal fade" id="modalUpdateGroseria" tabindex="-1" role="dialog" aria-labelledby="modalUpdateGroseriaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalUpdateGroseriaLabel">Actualizar Groseria </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  method="POST" action="{{ route('groserias.update') }}">
            {{ csrf_field()}}
            <div class="modal-body">
                <input type="hidden" id="groseria_id" name="groseria_id" >
                <div class="row">
                    <div class="col-sm-12">
                        <input class="form-control" type="text" name="update_groseria" id="update_groseria">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit"  class="btn btn-warning text-white">Actualizar</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script>

        function updateGroseria(elemento){
            groseria = elemento.getAttribute("data-groseria");
            id = elemento.getAttribute("data-id");
           
            $("#update_groseria").val(groseria);
            $("#groseria_id").val(id);

        }
  </script>