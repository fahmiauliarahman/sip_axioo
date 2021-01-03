$(document).ready(function() {
    $(document).on("click", "nav a", function() {
        $(".nav li.active").removeClass("active");

        const $parent = $(this).parent();
        $parent.addClass("active");
        e.preventDefault();
    });

    $(window).scroll(function() {
        const scroll = $(window).scrollTop();

        if (scroll >= 60) {
            $(".navbar").addClass("bg-dark");
        } else {
            $(".navbar").removeClass("bg-dark");
        }
    });

    $(document).on("submit", "#form-message", function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.post("kirimpesan", data).done(function(result) {
            alert(result.message);
            if (result.success === true) {
                $(this).trigger("reset");
            }
        });
    });
});
