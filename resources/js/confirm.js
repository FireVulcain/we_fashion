(function () {
    /**
     * When submiting a form with a '.delete' class, ask for a confirmation
     */

    $(document).ready(function () {
        $(".delete").on("submit", function(){
            return confirm("Êtes-vous sûrs de vouloir supprimer cet élément ?");
        });
    });

})($);