function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 19.4978, lng: -99.1269 },
        zoom: 5,
    });
    const input = document.getElementById("pac-input");
    // Specify just the place data fields that you need.
    const autocomplete = new google.maps.places.Autocomplete(input, {
        fields: ["place_id", "geometry", "formatted_address", "name", "address_components", "international_phone_number", "opening_hours", 'rating', 'photos', 'reviews'],
        language: "es"

    });

    autocomplete.bindTo("bounds", map);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");

    infowindow.setContent(infowindowContent);

    const marker = new google.maps.Marker({ map: map });

    marker.addListener("click", () => {
        infowindow.open(map, marker);
    });
    autocomplete.addListener("place_changed", () => {
        infowindow.close();

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        // Set the position of the marker using the place ID and location.
        marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location,
        });
        marker.setVisible(true);
        infowindowContent.children.namedItem("place-name").textContent = place.name;
        infowindowContent.children.namedItem("place-address").textContent =
            place.formatted_address;
        infowindow.open(map, marker);
        console.log(place);
        $("#nombre").val(place.name);
        $("#direccion").val(place.formatted_address);
        try {
            if (place.address_components.length == 7) {
                $("#calle").val(place.address_components[1].long_name + " #" + place.address_components[0].long_name);
                $("#colonia").val(place.address_components[2].long_name);
                $("#ciudad").val(place.address_components[3].long_name);
                $("#estado").val(place.address_components[4].long_name);
                $("#pais").val(place.address_components[5].long_name);
                $("#cp").val(place.address_components[6].long_name);
            } else if (place.address_components.length == 6) {
                $("#calle").val(place.address_components[0].long_name);
                $("#colonia").val(place.address_components[1].long_name);
                $("#ciudad").val(place.address_components[2].long_name);
                $("#estado").val(place.address_components[3].long_name);
                $("#pais").val(place.address_components[4].long_name);
                $("#cp").val(place.address_components[5].long_name);
            }

        } catch (error) {

        }

        $("#telefono").val(place.international_phone_number);
        $("#lat").val(place.geometry.location.lat());
        $("#lng").val(place.geometry.location.lng());
        $("#place_id_input").val(place.place_id);
        $("#rating").val(place.rating);

        try {
            var horario = "<span>" + place.opening_hours.weekday_text[0] + "</span><br>" + "<span>" + place.opening_hours.weekday_text[1] + "</span><br>" + "<span>" + place.opening_hours.weekday_text[2] + "</span><br>" + "<span>" + place.opening_hours.weekday_text[3] + "</span><br>" + "<span>" + place.opening_hours.weekday_text[4] + "</span><br>" + "<span>" + place.opening_hours.weekday_text[5] + "</span><br>" + "<span>" + place.opening_hours.weekday_text[6] + "</span><br>";
            $("#horario").html(horario);
            $("#horario_input").val(horario);
        } catch (error) {
            $("#horario_input").val(0);
            $("#horario").html("<span class='text-secondary' >No se encontro horario para esta agencia</span>");


        }

        $("#fotos").html("");
        try {
            for (var k = 0; k < place.photos.length; k++) {
                $("#fotos").append("<div class='col-sm-3 mt-1' > <img class='img-fluid rounded' src='" + place.photos[k].getUrl({ maxWidth: 200, maxHeight: 300 }) + "' />  </div>");
                $("#fotos").append("<input type='hidden' value='" + place.photos[k].getUrl() + "' name='fotos[]' />");
            }
        } catch (error) {
            $("#fotos").html("<span class='text-secondary' >No se encontraron fotos para esta agencia</span>");
        }

        try {
            var q = 1;
            for (var l = 0; l < place.reviews.length; l++) {

                $("#reviews").append("<input type='hidden' class='form-control' value='" + place.reviews[l].text + "' name='review[]' />");
                $("#reviews").append("<input type='hidden' class='form-control' value='" + place.reviews[l].author_name + "' name='autor_review[]' />");
                $("#reviews").append("<input type='hidden' class='form-control' value='" + place.reviews[l].author_url + "' name='autor_url[]' />");
                $("#reviews").append("<input type='hidden' class='form-control' value='" + place.reviews[l].profile_photo_url + "' name='foto_url[]' />");
                $("#reviews").append("<input type='hidden' class='form-control' value='" + place.reviews[l].rating + "' name='rating_review[]' />");
                $("#reviews").append("<input type='hidden' class='form-control' value='" + place.reviews[l].time + "' name='time[]' />");
                $("#reviews").append("<div class='col-sm-12'>");
                $("#reviews").append("<label class='mr-2 text-primary'> " + q + " </label>");
                $("#reviews").append("<p class='mr-2'><strong> " + place.reviews[l].author_name + " </strong></p>");
                $("#reviews").append("<p> " + place.reviews[l].text + " </p>");
                $("#reviews").append("</div>");
                q++;
            }
        } catch (error) {
            $("#reviews").html("<span class='text-secondary' >No se encontraron reviews para esta agencia</span>");

        }

        if ($("#place_id_solicitud")) {
            if ($("#place_id_solicitud").val() != place.place_id) {
                $("#msj_place_id").html("<h5 class='text-danger'> La agencia encontrada no coincide con la agencia de la solicitud, vuelva a buscar en el mapa: " + $('#razon_social_search').val() + "</h5>");
            } else {
                $("#msj_place_id").html("<h5 class='text-success' >La agencia que quiere añadir el usuario coincide</h5>");
            }
        }



    });
}
