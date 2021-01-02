$(".modal")
    .on("hidden.bs.modal", function(e) {
        if ($(".modal:visible").length) {
            $(".modal-backdrop")
                .first()
                .css(
                    "z-index",
                    parseInt(
                        $(".modal:visible")
                            .last()
                            .css("z-index")
                    ) - 10
                );
            $("body").addClass("modal-open");
        }
    })
    .on("show.bs.modal", function(e) {
        if ($(".modal:visible").length) {
            $(".modal-backdrop.in")
                .first()
                .css(
                    "z-index",
                    parseInt(
                        $(".modal:visible")
                            .last()
                            .css("z-index")
                    ) + 10
                );
            $(this).css(
                "z-index",
                parseInt(
                    $(".modal-backdrop.in")
                        .first()
                        .css("z-index")
                ) + 10
            );
        }
    });

function number_format(nStr) {
    nStr += "";
    x = nStr.split(".");
    x1 = x[0];
    x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + "," + "$2");
    }
    return x1 + x2;
}
