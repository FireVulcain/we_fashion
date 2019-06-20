(function () {
    $(document).ready(function () {
        $(".delete").on("submit", function(){
            return confirm("Êtes-vous sûrs de vouloir supprimer cet élément ?");
        });
    });
})($);