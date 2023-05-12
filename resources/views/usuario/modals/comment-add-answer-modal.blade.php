<div class="modal fade" id="modalComentario" tabindex="-1" role="dialog" aria-labelledby="modalComentarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('user.comments.answer') }}">
            {{ csrf_field()}}
            <div class="modal-body">
                <div class="row">
                  <div class="col-sm-2">
                    <img style="padding: 10px" src="{{ asset('assets/img/user.png') }}" width="100%" alt="">
                  </div>
                  <div class="col-sm-10">
                    <div class="col-sm-12">
                        <h5 class="modal-title mr-4" id="modalComentarioLabel"><strong id="autor-comment" ></strong> </h5>
                        <div class="rating">
                            <i id="s1" class="fas fa-star"></i>
                            <i id="s2" class="fas fa-star"></i>
                            <i id="s3" class="fas fa-star"></i>
                            <i id="s4" class="fas fa-star"></i>
                            <i id="s5" class="fas fa-star"></i>
                            <span class="d-inline-block average-rating" id="rating-no">(5)</span>
                        </div>
                      <small class="text-secondary float-right"  id="created_at" ></small>
                    </div>
                    <div class="col-sm-12 mt-4 mb-2">
                      <small>Atención del Personal (<span id="ate" ></span>) <i
                        class="fas fa-star filled"></i></small>
                      <small>Instalaciones (<span id="prac" ></span>) <i
                              class="fas fa-star filled"></i></small>
                      <small>Tiempo de Respuesta (<span id="vel" ></span>) <i
                              class="fas fa-star filled"></i></small>
                      <small>Calificación General ( <span id="res" ></span> ) <i
                              class="fas fa-star filled"></i></small>
                    </div>
                  </div>
                 
                    <div class="col-sm-12 mb-4" id="comment-text" >
                </div>
                </div>
                <input type="hidden" id="review_id" name="review_id"   >
                <input type="hidden" id="autor_id" name="autor_id"   >
                
                <div class="row">
                  <div class="col-sm-12">
                    <textarea class="form-control" name="respuesta" id="respuesta" required rows="4" ></textarea>

                  </div>
                  <div class="col-sm-12 mt-4">
                    <button type="button" class="btn  float-right" data-dismiss="modal">Cancelar</button>
                    <button type="submit"  class="btn btn-primary btn-sm float-right mr-3">Guardar Respuesta</button>
                  </div>
                </div>
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
            rating = elemento.getAttribute("data-rating");
            created_at = elemento.getAttribute("data-created");

            ate = elemento.getAttribute("data-ate");
            prac = elemento.getAttribute("data-prac");
            vel = elemento.getAttribute("data-vel");
            res = elemento.getAttribute("data-res");
            
            $("#comment-text").html('"'+text+'"');
            $("#autor-comment").html(autor);
            $("#created_at").html(created_at);
            $("#review_id").val(id);
            $("#autor_id").val(autorid);
            $("#rating-no").html('('+rating+')');

            $("#ate").html(ate);
            $("#prac").html(prac);
            $("#vel").html(vel);
            $("#res").html(res);



            var ratingInt = parseFloat(rating);
            console.log(ratingInt);
            if(ratingInt == 0){
              $("#s1").removeClass("filled");
              $("#s2").removeClass("filled");
              $("#s3").removeClass("filled");
              $("#s4").removeClass("filled");
              $("#s5").removeClass("filled");
            }
            else if(ratingInt >= 1 && ratingInt <= 1.9){
              $("#s1").addClass("filled");
              $("#s2").removeClass("filled");
              $("#s3").removeClass("filled");
              $("#s4").removeClass("filled");
              $("#s5").removeClass("filled");
            }else if (ratingInt >= 2 && ratingInt <= 2.9){
              $("#s1").addClass("filled");
              $("#s2").addClass("filled");
              $("#s3").removeClass("filled");
              $("#s4").removeClass("filled");
              $("#s5").removeClass("filled");
            }else if(ratingInt >= 3 && ratingInt <= 3.9){
              $("#s1").addClass("filled");
              $("#s2").addClass("filled");
              $("#s3").addClass("filled");
              $("#s4").removeClass("filled");
              $("#s5").removeClass("filled");
            }else if (ratingInt >= 4 && ratingInt <= 4.9){
              $("#s1").addClass("filled");
              $("#s2").addClass("filled");
              $("#s3").addClass("filled");
              $("#s4").addClass("filled");
              $("#s5").removeClass("filled");
            }else if(ratingInt >= 5 && ratingInt <= 5){
              $("#s1").addClass("filled");
              $("#s2").addClass("filled");
              $("#s3").addClass("filled");
              $("#s4").addClass("filled");
              $("#s5").addClass("filled");
            }

        }
  </script>