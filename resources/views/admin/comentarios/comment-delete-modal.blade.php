<div class="modal fade" id="modalDeleteComentario" tabindex="-1" role="dialog" aria-labelledby="modalDeleteComentarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteComentarioLabel">Eliminar el comentario de: <strong id="autor-comment-delete" ></strong> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  method="POST" action="{{ route('comentarios.delete') }}">
            {{ csrf_field()}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <p>¿Realmente deseas eliminar el comentario?</p>
                        <p>Tambien se eliminarán las respuestas que tenga</p>
                    </div>
                </div>
                <input type="hidden" id="review_id-delete" name="review_id_delete"   >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit"  class="btn btn-primary">Eliminar</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script>

        function commentDelete(elemento){
            autor = elemento.getAttribute("data-autor");
            id = elemento.getAttribute("data-id");
           
            $("#autor-comment-delete").html(autor);
            $("#review_id-delete").val(id);

        }
  </script>