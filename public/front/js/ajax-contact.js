$(function() {
    var e = $("#contact-form"),
        o = $(".form-message");
    $(e).submit(function(t) {
        t.preventDefault();
        var s = $(e).serialize();
        $.ajax({
            type: "POST",
            url: $(e).attr("action"),
            data: s
        }).done(function(e) {
            $(o).removeClass("error"), $(o).addClass("success"), console.log(e), $(o).text(e), $("#contact-form input,#contact-form textarea").val("")
        }).fail(function(e) {
            $(o).removeClass("success"), $(o).addClass("error"), console.log(e), console.log("13311113"), "" !== e.responseText ? $(o).text(e.responseText) : $(o).text("Oops! An error occured and your message could not be sent.")
        })
    })
});