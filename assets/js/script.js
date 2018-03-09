$(document).ready(function (jQuery) {

    // Merge text and variables
    function sprintf(format, arguments) {
        for (var i = 0; i < arguments.length; i++) {
            format = format.replace(/%s/, arguments[i]);
        }
        return format;
    }

    // Load tasks
    function __load() {
        setTimeout(function () {
            jQuery.ajax({
                url: "index.php",
                data: {
                    url: "task/all"
                },
                dataType: "html",
                success: function (response) {
                    jQuery("div#content").html(response);
                },
                error: function (xhr) {
                    //
                }
            });
        }, 1000)
    }

    __load();

    // Add new task
    jQuery("form#task-form").submit(function (e) {

        var name = encodeURIComponent(jQuery("input#task").val());
        jQuery.ajax({
            url: "index.php",
            data: {
                url: sprintf("task/add/%s", [name])
            },
            success: function () {
                __load()
            },
            error: function (xhr) {
                //
            }
        });

        e.preventDefault();
    });

    // Delete task
    jQuery(document).on("click", "a.btn-remove", function (e) {

        var id = jQuery(this).attr("data-id");
        jQuery.ajax({
            url: "index.php",
            data: {
                url: sprintf("task/delete/%s", [id])
            },
            success: function () {
                __load()
            },
            error: function (xhr) {
                //
            }
        });

        e.preventDefault();
    });


});