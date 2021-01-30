$(document).ready(function () {
    /* Ajax setup */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //error by status
    var statusErrorMap = {
        400: "Server understood the request, but request content was invalid.",
        401: "Unauthorized access.",
        403: "Forbidden resource can't be accessed.",
        413: 'Files size too large then 8MB',
        500: "Internal server error.",
        503: "Service unavailable."
    };
    // Page type & template //
    $('body').on('change', '#page_type_id', function () {
        var page_type = $('#page_type_id :selected').val();
        var ajax_url = $('#page_type_id').data('url');
        var mainWrapper = 'div.wrapper';
        var imageLoader = '#image-loader';
        $.ajax({
            type: 'POST',
            url: ajax_url,
            dataType: 'json',
            data: {
                page_type: page_type
            },
            beforeSend: function () {
                $(mainWrapper).fadeTo("fast", 0.2);
                $(mainWrapper).css('pointer-events', 'none');
                $(imageLoader).show();
            },
            success: function (result) {
                if (result.status === 'ok') {
                    console.log(result.response);
                    $('#page_template_id').html(result.response);
                } else {
                    console.log(result.message)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });

            },
            complete: function () {
                $(mainWrapper).fadeTo("fast", 1);
                $(mainWrapper).css('pointer-events', '');
                $(imageLoader).hide();
            }
        });
    });
    // helper field types
    $('body').on('change', '#type', function () {
        let getType = $('#type');
        let url = getType.data('url');
        let id = getType.data('id');
        let type = $('#type :selected').val();
        let mainWrapper = 'div.wrapper';
        let imageLoader = '#image-loader';
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {
                id: id,
                type: type
            },
            beforeSend: function () {
                $(mainWrapper).fadeTo("fast", 0.2);
                $(mainWrapper).css('pointer-events', 'none');
                $(imageLoader).show();
            },
            success: function (result) {
                if (result.status === 'ok') {
                    console.log(result.response);
                    $('#type_template').html(result.response);
                } else {
                    console.log(result.message)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });
            },
            complete: function () {
                $(mainWrapper).fadeTo("fast", 1);
                $(mainWrapper).css('pointer-events', '');
                $(imageLoader).hide();
                if (type === '3') {
                    tinymce.init({
                        selector: 'textarea.editor',
                        theme: 'silver',
                        height: 400,
                        plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help code',
                        toolbar: 'insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | pagebreak | removeformat | template | code',
                        templates: [
                            {
                                title: 'image',
                                description: '',
                                content: '[image src="image.jpg" top_title="About" title="სათაური" desc="მინი აღწერა"][/image]'
                            },
                            {title: 'text', description: '', content: '[text]content[/text]'},
                        ],
                    });
                } else {
                    if (typeof tinymce !== 'undefined') {
                        tinymce.remove();
                    }
                }
                if (type === '4') {
                    check();
                }
            },
        });
    });
    // manual sort
    function JQueryUISort() {
        $("#sortable").sortable({
            axis: "y",
            update: function (event, ui) {
                var data = $(this);
                var url = data.data('url');
                let i = 1;
                $(".ui-state-default > td > span").each(function () {
                    $(this).html(i);
                    i++;
                });
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: "json",
                    data: {
                        sortList: data.sortable("toArray")
                    },
                    success: function (response) {
                        if (response.status === "ok") {
                            console.log(data.sortable("toArray"));
                            toastr["success"]("<b>Dreadnought Project</b><br/>New sorting order has been successfully saved.");
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                                footer: 'Dreadnought Project'
                            });
                        }
                    },
                    error: function (error) {
                        if (typeof error.responseJSON != "undefined") {
                            error = error.responseJSON;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: error,
                            footer: 'Dreadnought Project'
                        });
                    }
                });
            }
        });
        // manual sort's visual effects
        $("tr.ui-state-default").mousedown(function () {
            $(this).mousemove(function () {
                let target = "#" + this.id;
                $(target + " div.hideOnMove").attr("hidden", true);
            });
        }).mouseup(function () {
            $(this).unbind('mousemove');
            $("div.hideOnMove").attr("hidden", false);
        });
    }
    $(this).disableSelection();
    JQueryUISort();
    //file store multiple file upload
    $("#dreadnought-file-store").on("change", function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var form = $(this)[0];
        var data = new FormData(form);
        data.append(
            "multipleAttach",
            $("div.uploaded_files").hasClass('multiple_attach')
        );
        var resetFileUploader = 'input[name = "files[]"]';
        var dragAndDropContainer = '.drag-and-drop-container';
        var dragAndDroptitle = '.drag-and-drop-title';
        var imageLoader = '#file-uploading-loader';
        $.ajax({
            url: url,
            type: 'POST',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            dataType: 'json',
            cache: false,
            data: data,
            timeout: 600000,
            beforeSend: function () {
                $(dragAndDroptitle).fadeTo("fast", 0);
                $(dragAndDropContainer).css('pointer-events', 'none');
                $(imageLoader).show();
            },
            success: function (result) {
                if (result.status === "ok") {
                    $('.uploaded_files').html(result.response);
                    $(resetFileUploader).val('');
                    toastr["success"]("<b>Dreadnought Project</b><br/>File(s) has/have been successfully uploaded.");
                } else {
                    $(resetFileUploader).val('');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function (error) {
                $(resetFileUploader).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });
            },
            complete: function () {
                $(dragAndDroptitle).fadeTo("slow", 1);
                $(dragAndDropContainer).css('pointer-events', '');
                $(imageLoader).hide();
            }
        });
    });
    // delete files from file store
    $('.uploaded_files').on('click', 'a.delete', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        let smallWindow = this.classList.contains('small_window');
        var mainWrapper = 'div.wrapper';
        var imageLoader = '#image-loader';
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {
                smallWindow: smallWindow
            },
            beforeSend: function () {
                $(mainWrapper).fadeTo("fast", 0.2);
                $(mainWrapper).css('pointer-events', 'none');
                $(imageLoader).show();
            },
            success: function (result) {
                if (result.status === "ok") {
                    $('.uploaded_files').html(result.response);
                    toastr["success"]("<b>Dreadnought Project</b><br/>File has been successfully removed.");
                } else {
                    $(resetFileUploader).val('');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });
            },
            complete: function () {
                $(mainWrapper).fadeTo("fast", 1);
                $(mainWrapper).css('pointer-events', '');
                $(imageLoader).hide();
            }
        });
    });
    var fileStoreWindow = window;
    //file attach with new small window
    $('.card-body').on('click', 'a.attach', function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        var width = $(this).data("width");
        var height = $(this).data("height");
        if (typeof width === 'undefined') {
            width = '950';
        }
        if (typeof height === 'undefined') {
            height = '500';
        }
        fileStoreWindow = window.open(url, 'File Store', 'left=20,top=20,width=' + width + ',height=' + height + ',toolbar=0,resizable=0,scrollbars=yes');
    });
    // add particular file
    $('body').on('click', 'embed.choose', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        let path = $(this).attr('title');
        let inputName = $('input.text_upload', opener.document).attr('name');
        $.ajax({
            url: url,
            type: 'POST',
            dataType: "json",
            data: {
                path: path,
                inputName: inputName,
            },
            success: function (result) {
                if (result.status === "ok") {
                    $('.attached_file_name', opener.document).html(result.response);
                    $('a.upload_file_icons.view', opener.document).show();
                    $('a.upload_file_icons.clear', opener.document).show();
                    $('a.upload_file_icons.attach', opener.document).hide();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });
            }, complete: function () {
                if (fileStoreWindow) {
                    fileStoreWindow.close();
                }
            }
        });
    });

    // select multiple file
    $("body").on("click", "embed.multiple_attach", function () {
        if (!$(this).hasClass("selected_reference")) {
            $(this).addClass("selected_reference");
        } else {
            $(this).removeClass("selected_reference");
        }
    });

    // add files to file references
    $("body").on("click", "a#apply_references", function (e) {
        e.preventDefault();
        var url = $(this).data("url");
        let fileReferences = [];
        let selectedReferences = $("embed.selected_reference");
        for (let i of selectedReferences) {
            fileReferences.push($(i).attr("id"));
        }
        let referenceID = url.split("/")[8];
        let referenceType = url.split("/")[7];
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: {
                fileReferences: fileReferences,
                reference_id: referenceID,
                reference_type: referenceType
            },
            success: function (result) {
                if (result.status === "ok") {
                    $(".uploaded_files", opener.document).html(result.response);
                    if (fileStoreWindow) {
                        fileStoreWindow.close();
                    }
                } else {
                    Swal.fire({
                        icon: result.status == "warning" ? "warning" : "error",
                        title:
                            result.status == "warning" ? "Warning" : "Oops...",
                        text: result.message,
                        footer: "Dreadnought Project"
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error,
                    footer: "Dreadnought Project"
                });
            }
        });
    });

    // unset files from file references
    $(".uploaded_files").on("click", "a.unset", function (e) {
        e.preventDefault();
        var url = $(this).data("url");
        let fileID = $(this)
            .closest("ul")
            .parent()
            .find("embed")
            .attr("id");
        let referenceID = url.split("/")[8];
        let referenceType = url.split("/")[7];
        var mainWrapper = "div.wrapper";
        var imageLoader = "#image-loader";
        $.ajax({
            url: url,
            type: "DELETE",
            dataType: "json",
            data: {
                file_id: fileID,
                reference_id: referenceID,
                reference_type: referenceType
            },
            beforeSend: function () {
                $(mainWrapper).fadeTo("fast", 0.2);
                $(mainWrapper).css("pointer-events", "none");
                $(imageLoader).show();
            },
            success: function (result) {
                if (result.status === "ok") {
                    $(".uploaded_files").html(result.response);
                    toastr["success"](
                        "<b>Dreadnought Project</b><br/>File has been successfully removed."
                    );
                } else {
                    $(resetFileUploader).val("");
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: result.message,
                        footer: "Dreadnought Project"
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error,
                    footer: "Dreadnought Project"
                });
            },
            complete: function () {
                $(mainWrapper).fadeTo("fast", 1);
                $(mainWrapper).css("pointer-events", "");
                $(imageLoader).hide();
            }
        });
    });

    // Roles tree view
    $.fn.extend({
        rolesTree: function () {
            $(this).addClass("tree");
            $(this).find('li').has("ul").each(function () {
                var branch = $(this);
                branch.find('.role_trigger').on('click', function (e) {
                    $(this).find('.indicator').toggleClass('fa-plus fa-minus');
                    $(this).siblings('ul').slideToggle();
                });
            });
        }
    });
    $('#tree1').rolesTree();
    // role permission's checkboxes
    $("body").on("change", "input[type='checkbox'].special", function () {
        var name = $(this).attr('id');
        if ($(this).is(':checked')) {
            console.log('checked');
            $("input[name='" + name + "']").val(1);
        } else {
            console.log('not checked');
            $("input[name='" + name + "']").val(0);
        }
    });
    // role select all permission checkbox
    $("body").on("change", "input[type='checkbox'].special_all", function () {
        let targetUl = $(this).parent().parent().parent();
        if ($(this).is(':checked')) {
            targetUl.find('input[type="checkbox"]').prop('checked', true);
            targetUl.find('input[type="hidden"]').val(1);
        } else {
            targetUl.find('input[type="checkbox"]').prop('checked', false);
            targetUl.find('input[type="hidden"]').val(0);
        }
    });

    // 'attach_file' form
    function check() {
        // check input field on first load
        if ($('.text_upload').val() !== '') {
            $('a.upload_file_icons.view').show();
            $('a.upload_file_icons.clear').show();
        } else {
            $('a.upload_file_icons.attach').show();
        }
    }

    check();
    $('body').on('click', 'a.upload_file_icons.clear', function () {
        // toogle view clear vs attach when text input is empty
        $(this).hide();
        let viewLink = $('a.upload_file_icons.view');
        let defaultHref = viewLink.attr('title');
        viewLink.attr('href', defaultHref);
        viewLink.hide();
        $('input[type="text"].text_upload').val('');
        $('a.upload_file_icons.attach').show();
    });
    $('body').on('click', 'a.upload_file_icons.view', function () {
        // append to view link file name from text input
        let viewLink = $(this);
        let originalHref = viewLink.attr('href');
        if (originalHref.slice(-1) === '/') {
            // if the view's link don't has a file name
            originalHref = originalHref.slice(0, -1);
            let value = $('input[type="text"].text_upload').val();
            $(viewLink).attr('href', originalHref + value);
        }
    });

    // MapBox
    // get marker form
    $('body').on('click', '.get_marker_form', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let mainWrapper = 'div.wrapper';
        let imageLoader = '#image-loader';
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            data: {},
            beforeSend: function () {
                $(mainWrapper).fadeTo("fast", 0.2);
                $(mainWrapper).css('pointer-events', 'none');
                $(imageLoader).show();
            },
            success: function (result) {
                if (result.status == 'ok') {
                    console.log(result.response);
                    $(".modal-content").html(result.response);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });
            },
            complete: function () {
                $(mainWrapper).fadeTo("fast", 1);
                $(mainWrapper).css('pointer-events', '');
                $(imageLoader).hide();
            }
        });
    });
    // Markers Create/Update
    $('body').on('click', '#marker_form', function (e) {
        e.preventDefault();
        let url = $(this).data('url');
        let action = $(this).attr('title');
        let title = $('#title').val();
        let desc = $('#desc').val();
        let mainWrapper = 'div.wrapper';
        let imageLoader = '#image-loader';
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {title: title, desc: desc},
            beforeSend: function () {
                $('.marker_modal').modal('toggle');
                $(mainWrapper).fadeTo("fast", 0.2);
                $(mainWrapper).css('pointer-events', 'none');
                $(imageLoader).show();
            },
            success: function (result) {
                if (result.status === 'ok') {
                    console.log(result.response);
                    if (action === 'Edit') {
                        $("#markers_wrapper").html(result.response);
                    } else {
                        $("#markers_wrapper").html(result.response);
                        $("#map_wrapper").html(result.response2);
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });
            },
            complete: function () {
                $(mainWrapper).fadeTo("fast", 1);
                $(mainWrapper).css('pointer-events', '');
                $(imageLoader).hide();
                JQueryUISort();
            }
        });
    });
    // Markers Delete
    $('body').on('click', '.delete_marker', function (e) {
        e.preventDefault();
        let url = $(this).data('url');
        let mainWrapper = 'div.wrapper';
        let imageLoader = '#image-loader';
        $.ajax({
            type: 'DELETE',
            url: url,
            dataType: 'json',
            data: {},
            beforeSend: function () {
                $(mainWrapper).fadeTo("fast", 0.2);
                $(mainWrapper).css('pointer-events', 'none');
                $(imageLoader).show();
            },
            success: function (result) {
                if (result.status == 'ok') {
                    console.log(result.response);
                    $("#markers_wrapper").html(result.response);
                    $("#map_wrapper").html(result.response2);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });
            },
            complete: function () {
                $(mainWrapper).fadeTo("fast", 1);
                $(mainWrapper).css('pointer-events', '');
                $(imageLoader).hide();
                JQueryUISort();
            }
        });
    });
    // save data coordinates
    $('body').on('click','#save_data_coordinates',function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let template_type = $("#template_type option:selected").val();
        let myForm = document.getElementById('data_coordinates');
        let formData = new FormData(myForm);
        console.log(myForm);
        formData.append('template_type',template_type);
        $.ajax({
            type:'POST',
            url: url,
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function(result) {
                if(result.status === 'ok') {
                    toastr["success"]("<b>Dreadnought Project</b><br/>New data coordinates have been successfully saved.");
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });
            }
        });
    });

    //confirm to delete an item
    $('body').on('click', '.confirm_to_delete', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let mainWrapper = 'div.wrapper';
        let imageLoader = '#image-loader';
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            data: {},
            beforeSend: function () {
                $(mainWrapper).fadeTo("fast", 0.2);
                $(mainWrapper).css('pointer-events', 'none');
                $(imageLoader).show();
            },
            success: function (result) {
                console.log(result);
                if (result.status == 'ok') {
                    console.log(result.response);
                    // $(".modal-content").html(result.response);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message,
                        footer: 'Dreadnought Project'
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                    footer: 'Dreadnought Project'
                });
            },
            complete: function () {
                $(mainWrapper).fadeTo("fast", 1);
                $(mainWrapper).css('pointer-events', '');
                $(imageLoader).hide();
            }
        });
    });
});
