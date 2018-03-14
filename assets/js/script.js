$(document).ready(function (jQuery) {
// Merge text and variables
    function sprintf(format, arguments) {
        for (var i = 0; i < arguments.length; i++) {
            format = format.replace(/%s/, arguments[i]);
        }
        return format;
    }

// Load Tasks
    function _load() {
        setTimeout(function () {
            jQuery.ajax({
                url: "index.php?url=task/all",
                dataType: "html",
                success: function (response) {
                    jQuery("ul#todo-list").html(response);
                },
                error: function (xhr) {
                    //
                }
            });
        }, 100)
    }

// Update Task
    function _updateTask(task) {
        var id = jQuery(task).attr("data-todo-id");
        var name = encodeURIComponent(jQuery("input.todo-input", task).val());
        var status = jQuery("input.todo-checkbox", task).is(':checked');

        jQuery.ajax({
            url: sprintf("index.php?url=task/update/%s", [id]),
            type: "POST",
            data: {
                name: name,
                status: status
            },
            success: function () {
                _load();
            },
            error: function (xhr) {
                //
            }
        });
    }

// Remove Task(s)
    function _removeTask(ids) {
        jQuery.ajax({
            url: "index.php?url=task/delete",
            type: "POST",
            data: {
                ids: ids
            },
            success: function () {
                _load();
            },
            error: function (xhr) {
                //
            }
        });
    }

    //
    _load();

    // Add new Task
    var todoInput = jQuery("input#new-todo");
    todoInput.keyup(function (e) {

        if (e.keyCode === 13 && todoInput.val().trim().length) {
            var name = encodeURIComponent(todoInput.val().trim());
            jQuery.ajax({
                url: "index.php?url=task/add",
                type: "POST",
                data: {
                    name: name
                },
                success: function () {
                    todoInput.val("");
                    _load();
                },
                error: function (xhr) {
                    //
                }
            });
        }
    });

    // Delete Task
    jQuery(document).on("click", "a.todo-remove", function (e) {
        var id = jQuery(this).closest("li").attr("data-todo-id");
        _removeTask([id]);
        e.preventDefault();
    });

    // Delete Task(s)
    jQuery(document).on("click", "a.todo-clear", function (e) {
        var ids = [];
        jQuery("input.todo-checkbox:checked").each(function () {
            ids.push(jQuery(this).closest("li").attr("data-todo-id"));
        });
        _removeTask(ids);
        e.preventDefault();
    });

    // Update Task status
    jQuery(document).on("change", "input.todo-checkbox", function (e) {
        jQuery(this).closest("li").toggleClass("todo-done");
        _updateTask(jQuery(this).closest("li"));
    });

    // Update Task name
    jQuery(document).on("keyup", "input.todo-input", function (e) {
        if (e.keyCode === 13) {
            _updateTask(jQuery(this).closest("li"));
        }
    });

    jQuery(document).on("mouseenter mouseleave", "li.todo-item", function (e) {
        jQuery(this).closest("li").toggleClass("todo-hover");
    });

    jQuery(document).on("click", "span.todo-content", function (e) {
        var parent = jQuery(this).closest("li");

        jQuery("div.todo-view", parent).hide();
        jQuery("div.todo-edit", parent).show();
    });

});