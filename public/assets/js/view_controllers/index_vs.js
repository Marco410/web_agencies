$('#btn_search,#btn_star',).on("click", function () {
    if ($('#search-box').is(':visible')) {
        $("#search-box").hide("slow");
    } else {
        $("#search-box").show("slow");
    }
});