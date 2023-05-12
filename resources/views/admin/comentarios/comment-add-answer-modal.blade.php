<div class="modal fade" id="modalComentario" tabindex="-1" role="dialog" aria-labelledby="modalComentarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalComentarioLabel">Responder el comentario de: <strong id="autor-comment" ></strong> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('comentarios.save-respuesta') }}">
            {{ csrf_field()}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 text-center mb-4" id="comment-text" >
                    </div>
                </div>
                <input type="hidden" id="review_id" name="review_id"   >
                <input type="hidden" id="autor_id" name="autor_id"   >
                <input type="text" class="form-control" placeholder="Responde el comentario aquí" name="respuesta" id="respuesta">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit"  class="btn btn-primary">Guardar Respuesta</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script>

        function comment(elemento){
            text = elemento.getAttribute("data-whatever");
            autor = elemento.getAttribute("data-autor");
            id = elemento.getAttribute("data-id");
            autorid = elemento.getAttribute("data-autorid");
            console.log(elemento.getAttribute("data-whatever"));

            $("#comment-text").html('"'+text+'"');
            $("#autor-comment").html(autor);
            $("#review_id").val(id);
            $("#autor_id").val(autorid);

        }
  </script>