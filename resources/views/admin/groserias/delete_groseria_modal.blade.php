<div class="modal fade" id="modalDeleteGroseria" tabindex="-1" role="dialog" aria-labelledby="modalDeleteGroseriaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteGroseriaLabel">Eliminar Groseria </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  method="POST" action="{{ route('groserias.delete') }}">
            {{ csrf_field()}}
            <div class="modal-body">
                <input type="hidden" id="groseria_id_delete" name="groseria_id_delete" >
                <div class="row">
                    <div class="col-sm-12">
                      <p>¿Realmente deseas eliminar la groseria?</p>
                        <input class="form-control" readonly type="text" name="delete_groseria" id="delete_groseria">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit"  class="btn btn-primary text-white">Eliminar</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script>

        function deleteGroseria(elemento){
            groseria = elemento.getAttribute("data-groseria");
            id = elemento.getAttribute("data-id");
           
            $("#delete_groseria").val(groseria);
            $("#groseria_id_delete").val(id);

        }
  </script>