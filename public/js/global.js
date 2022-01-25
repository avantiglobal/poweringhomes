$(document).ready(function () {
    //--- General functions
    function emailIsValid(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    }

    function showError(errMessage, errElement = '#add_err') {
        $(errElement).text(errMessage);
        $(errElement).css('color', '#c00');
    }

    function clearError(errElement = '#add_err') {
        $(errElement).html("");
    }
    // ----

    //Onload function
    // $(function () {
    //     // $('#data_table').DataTable({
    //     //     'paging': true,
    //     //     'lengthChange': false,
    //     //     'searching': true,
    //     //     'ordering': true,
    //     //     'info': true,
    //     //     'autoWidth': false
    //     // });

    //     $("#add_err").css('display', 'none', 'important');
    //     if ($('#intended_domain').val() !== '') {
    //         $('#existing-website').hide();
    //         $('#new-website').show();
    //         $("input[name=has-website][value='new']").prop("checked", true);
    //     }
    //     $('[data-toggle="tooltip"]').tooltip();
    // });

    // Logout
    $("#login-form").submit(function (event) {
        event.preventDefault();

        console.log('Login');
        const username = $("#username").val();
        const password = $("#password").val();
        const defa_controller = $("#defa_controller").val();
        const defa_action = $("#defa_action").val();
        //const error_container = $("#add_err").val();

        if (username == "" || password == "") {
            showError('Please insert the Username and Password');
            return;
        }

        console.log('Sends the form');
        console.log('entra btn login' + username + " -- " + password + " -- " + defa_controller + " -- " + defa_action);


        $.ajax({
            type: "POST",
            url: "/user/auth",
            data: "username=" + username + "&password=" + password,
            cache: "false",
            success: function (data) {
                console.log(data);
                if (data === 'true') {
                    clearError();
                    window.location = "/" + defa_controller + "/" + defa_action;
                } else {
                    showError("Wrong username or password");
                    //$("#preloader").html("");
                }
            },
            beforeSend: function () {
                clearError();
                // $("#preloader").html("<i class='fa fa-spinner fa-spin'>");
            },
        });
    });

    // Logout
    $("#btn-logout").click(function () {
        $.ajax({
            url: "/user/logout",
            success: function (data) {
                window.location = "/login";
            }
        });
        return false;
    });
    // Click Row Function
    $('.tr_table').click(function () {
        var controller = $(this).parent().parent().attr('data-table-name');
        var action = $(this).attr('data-action');
        var query = $(this).attr('data-query');
        //alert('Controller: ' + controller +' -- Action: ' + action + ' -- Query: ' + query)
        // console.log('Este es el Id del TR: ' + table_name + '/' + query);
        var url = '/' + controller + '/' + action + '/' + query;
        //console.log(url);
        window.location = url;
    });
    // Create User
    $('#btn-user-form').click(function () {
        var name = $("#name").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var id = $("#user-id").val();
        var url = (id === '') ? "/user/add" : "/user/update";
        var pwdval = $('#pwdval').val();

        if (pwdval == 1 && password == '') {
            $('#password').attr('data-toggle', 'tooltip');
            $('#password').attr('title', 'Please insert a Password');
            $('[data-toggle="tooltip"]').tooltip();
            $('#password').focus();
            return;
        }

        if (name !== '' && lastname !== '' && email !== '' && username !== '') {
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: "id=" + id + "&name=" + name + "&lastname=" + lastname + "&email=" + email + "&phone=" + phone + "&address=" + address +
                    "&username=" + username + "&password=" + password,
                //cache: "false",
                success: function (data) {
                    console.log(data);

                    var user = jQuery.parseJSON(data);
                    if (user.result === 'true') {
                        if (id === '') {
                            alert("User added successfully");
                            window.location = "/user/edit/" + user.last_id
                        }
                        else {
                            $('#alert-dismiss').removeClass("hidden");
                            $('#alert-dismiss').css('display', 'inline', 'important');
                            window.setTimeout(function () {
                                $("#alert-dismiss").fadeTo(500, 0).slideUp(500, function () {
                                    $(this).css('visibility', 'hidden', 'important');
                                });
                            }, 2000);
                            window.setTimeout(function () {
                                $("#alert-dismiss").removeAttr('style');
                                $("#alert-dismiss").addClass('hidden');
                            }, 4000);
                            $("#preloader").html("");
                        }
                        //$('#user_form')[0].reset();
                    } else {
                        $("#add_err").css('display', 'inline', 'important');
                        $("#add_err").html("Impossible to add User");
                    }
                },
                beforeSend: function () {
                    //$("#add_err").css('display', 'inline', 'important');
                    //$("#add_err").html("<div><i class=''> Loading...</div>");
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        else {
            if (name == '') {
                $('#name').attr('data-toggle', 'tooltip');
                $('#name').attr('title', 'Please insert a Name');
                $('[data-toggle="tooltip"]').tooltip();
                $('#name').focus();
                return;
            }
            if (lastname == '') {
                $('#lastname').attr('data-toggle', 'tooltip');
                $('#lastname').attr('title', 'Please insert a Last Name');
                $('[data-toggle="tooltip"]').tooltip();
                $('#lastname').focus();
                return;
            }
            if (email == '') {
                $('#email').attr('data-toggle', 'tooltip');
                $('#email').attr('title', 'Please insert an Email');
                $('[data-toggle="tooltip"]').tooltip();
                $('#email').focus();
                return;
            }
            if (username == '') {
                $('#username').attr('data-toggle', 'tooltip');
                $('#username').attr('title', 'Please insert an Username');
                $('[data-toggle="tooltip"]').tooltip();
                $('#username').focus();
                return;
            }
        }
    });
    //Change password btn
    $('#btn-change-pass').click(function () {
        $('#password').toggle();
        $('#password').focus();

        if ($(this).html() === "Change password") {
            $('#pwdval').val('1');
            $(this).html('Cancel');
            return;
        }
        if ($(this).html() === "Cancel") {
            $('#pwdval').val('0');
            $(this).html('Change password');
            return;
        }
    })
    // Edit User
    $('#btn-edit-user').click(function () {
        var id = $("#id").val();
        var name = $("#name").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var username = $("#username").val();
        var password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "/user/update",
            dataType: "text",
            data: "id=" + id + "&name=" + name + "&lastname=" + lastname + "&email=" + email + "&phone=" + phone +
                "&address=" + address + "&username=" + username + "&password=" + password,
            //cache: "false",
            success: function (user) {
                if (user === 'true') {
                    alert("User updated successfully");
                } else {
                    $("#add_err").css('display', 'inline', 'important');
                    $("#add_err").html('Impossible to update User');
                }
            },
            beforeSend: function () {
                //$("#add_err").css('display', 'inline', 'important');
                //$("#add_err").html("<div><i class=''> Loading...</div>");
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    });
    // Delete User
    $('#btn-delete-user').click(function () {
        if (confirm("Are you sure you want to delete this User?")) {
            var id = $("#user-id").val();
            $.ajax({
                type: "POST",
                url: "/user/delete",
                dataType: "text",
                data: "id=" + id,
                success: function (user) {
                    //console.log(user);
                    if (user === 'true') {
                        alert("User deleted successfully");
                        window.location = '/user/viewall';

                    } else {
                        $("#add_err").css('display', 'inline', 'important');
                        $("#add_err").html('Impossible to update User');
                    }
                },
                beforeSend: function () {
                    //$("#add_err").css('display', 'inline', 'important');
                    //$("#add_err").html("<div><i class=''> Loading...</div>");
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    });
    //Add Client form - Has website
    $("input[name='has-website']").click(function () {
        if (this.value == 'existing') {
            $('#existing-website').show();
            $('#new-website').hide();
        };
        if (this.value == 'new') {
            $('#existing-website').hide();
            $('#new-website').show();
        };
    });
    //Add client
    $('#btn-new-client').click(function () {
        var modal_source = $("#modal_source").val();
        var name = $("#name").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var country = $("#country").val();
        var company_name = modal_source == 'true' ? '' : $("#company_name").val();
        var company_about = modal_source == 'true' ? '' : $("#company_about").val();
        var budget = modal_source == 'true' ? '' : $("#budget").val();
        var target_audience = modal_source == 'true' ? '' : $("#target_audience").val();
        var website = modal_source == 'true' ? '' : $("#website").val();
        var webhost_company = modal_source == 'true' ? '' : $("#webhost_company").val();
        var use_existing_website_content = modal_source == 'true' ? '' : $("#use_existing_website_content").val();
        var intended_domain = modal_source == 'true' ? '' : $("#intended_domain").val();

        $.ajax({
            type: "POST",
            url: "/client/add",
            dataType: "json",
            data: "name=" + name + "&lastname=" + lastname + "&email=" + email + "&phone=" + phone +
                "&address=" + address + "&country=" + country + "&company_name=" + company_name +
                "&company_about=" + company_about + "&budget=" + budget + "&target_audience=" + target_audience +
                "&website=" + website + "&webhost_company=" + webhost_company +
                "&use_existing_website_content=" + use_existing_website_content +
                "&intended_domain=" + intended_domain + "&modal_source=" + modal_source,
            success: function (data) {
                //alert(data);
                var json = jQuery.parseJSON(data);

                if (json.result === 'true') {
                    $('#form-new-client')[0].reset();
                    if (modal_source === 'true') {
                        $('#modal-add-client').modal('toggle');
                        $('#select-client').append($('<option>', {
                            value: json.client_id,
                            text: json.client_name
                        }));
                        $("#select-client").val(json.client_id);
                    } else {
                        alert("Client added successfully");
                    }
                } else {
                    $("#add_err").css('display', 'inline', 'important');
                    $("#add_err").html("Impossible to add User");
                }
            },
            beforeSend: function () {
                //$("#add_err").css('display', 'inline', 'important');
                //$("#add_err").html("<div><i class=''> Loading...</div>");
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    });
    //Edit client
    $('#btn-edit-client').click(function () {
        var id = $("#id").val();
        var name = $("#name").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var country = $("#country").val();
        var company_name = $("#company_name").val();
        var company_about = $("#company_about").val();
        var budget = $("#budget").val();
        var target_audience = $("#target_audience").val();
        var website = $("#website_name").val();
        var webhost_company = $("#webhost_company").val();
        var use_existing_website_content = $("#use_existing_website_content").val();
        var intended_domain = $("#intended_domain").val();

        $.ajax({
            type: "POST",
            url: "/client/update",
            dataType: "text",
            data: "id=" + id + "&name=" + name + "&lastname=" + lastname + "&email=" + email + "&phone=" + phone +
                "&address=" + address + "&country=" + country + "&company_name=" + company_name +
                "&company_about=" + company_about + "&budget=" + budget + "&target_audience=" + target_audience +
                "&website=" + website + "&webhost_company=" + webhost_company +
                "&use_existing_website_content=" + use_existing_website_content + "&intended_domain=" + intended_domain,
            success: function (data) {
                //console.log(data);
                if (data === 'true') {
                    alert("Client updated successfully");
                } else {
                    //$("#add_err").css('display', 'inline', 'important');
                    //$("#add_err").html("Impossible to update User");
                    alert("Impossible to update User");
                }
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    });
    // Delete Client
    $('#btn-delete-client').click(function () {
        if (confirm("Are you sure you want to delete this Client?")) {
            var id = $("#id").val();

            $.ajax({
                type: "POST",
                url: "/client/delete",
                dataType: "text",
                data: "id=" + id,
                success: function (user) {
                    //alert(user);
                    if (user === 'true') {
                        alert("Client deleted successfully");
                        window.location = '/client/viewall';

                    } else {
                        $("#add_err").css('display', 'inline', 'important');
                        $("#add_err").html('Impossible to update User');
                    }
                },
                beforeSend: function () {
                    //$("#add_err").css('display', 'inline', 'important');
                    //$("#add_err").html("<div><i class=''> Loading...</div>");
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    });
    // Show new client modal from select tag
    $('#select-client').on('change', function () {
        if (this.value == 'add') {
            $('#modal-add-client').modal('show');
        }
    });
    //proposal-template-stage-btn
    $('#btn-proposal-template-stage').click(function () {
        var proposal_name = $('#proposal-name').val();
        var client_id = $('#select-client').val();
        var due_date = $('#prop-due-date').val();
        var prop_notes = $('#prop-notes').val();
        var prob_range = $('#prob_range').val();
        var stage = $('.stage-name').data('stage-name');
        //console.log("stage=" + stage + "&proposal_name=" + proposal_name + "&client_id=" + client_id + "&due_date=" + due_date + "&prop_notes=" + prop_notes + "&prob_range=" + prob_range);
        if (proposal_name != '' && client_id != '') {
            $.ajax({
                type: "POST",
                url: "/proposal/add",
                dataType: "text",
                data: "stage=" + stage + "&proposal_name=" + proposal_name + "&client_id=" + client_id + "&due_date=" + due_date + "&prop_notes=" + prop_notes + "&prob_range=" + prob_range,
                success: function (proposal) {
                    console.log(proposal);
                    if (proposal == 1) {
                        console.log("redirecting...");
                        window.location = "/proposal/new/template";
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        else {
            $('#proposal-name').css('border-color', '#f0523d');
            $('#select-client').css('border-color', '#f0523d');
            $('#proposal-name').focus();
        }
    });
    // Select template stage: Shows a checkmark next to the selected template
    $('.thumbnail-protemplate').click(function () {
        var thumbnail_id = $(this).attr("id");
        $('#thumb-check').remove();
        $('#protemplate-id-' + thumbnail_id).append(' <i id="thumb-check" class="fa fa-check bg-teal-active color-palette round-border"></i>');
        $('#template-id').val(thumbnail_id);
    });
    //proposal-offer-stage-btn
    $('#btn-proposal-offer-stage').click(function () {
        if ($('#template-id').val() != '') {
            var stage = $('.stage-name').data('stage-name');
            var template_id = $('#template-id').val();
            console.log(stage);
            $.ajax({
                type: "POST",
                url: "/proposal/add",
                dataType: "text",
                data: "stage=" + stage + "&template_id=" + template_id,
                success: function (proposal) {
                    console.log(proposal);
                    if (proposal == 1) {
                        window.location = "/proposal/new/offer";
                    } else {
                        alert('Something went wrong updating the proposal. Please contact your Admininstrator.');
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        else {
            $('#choose-template-error-msg').html(' <b>Please select a template</b>');
            $('#choose-template-error-msg').css('color', '#f0523d');
        }
    });
    //load proposal costs breakdown
    $('#select-product-breakdown').on('change', function () {
        $('#proposal-initial-invoice').val(($(this).find(':selected').attr('data-price') * 60) / 100);
        $('#proposal-approved-design-invoice').val(($(this).find(':selected').attr('data-price') * 20) / 100);
        $('#proposal-final-invoice').val(($(this).find(':selected').attr('data-price') * 20) / 100);
        $('#proposal-subtotal-initial-invoice').val($('#proposal-initial-invoice').val() * $('#proposal-qty-initial-invoice').val());
        $('#proposal-subtotal-approved-design-invoice').val($('#proposal-approved-design-invoice').val() * $('#proposal-qty-approved-design-invoice').val());
        $('#proposal-subtotal-final-invoice').val($('#proposal-final-invoice').val() * $('#proposal-qty-final-invoice').val());
        $('#proposal-total-cost').val($(this).find(':selected').attr('data-price'));
    });
    //proposal-preview-stage-btn
    $('#btn-proposal-preview-stage').click(function () {
        //alert($('#proposal-name').val());
        var stage = $('.stage-name').data('stage-name');
        var product_id = $('#select-product-breakdown').val();
        //var breakdown = $('#costs-breakdown-table').html();
        //alert(breakdown);
        if ($(product_id).val() != '') {
            $.ajax({
                type: "POST",
                url: "/proposal/add",
                dataType: "text",
                data: "stage=" + stage + "&product_id=" + product_id,
                success: function (proposal) {
                    //alert(proposal);
                    if (proposal == 1) {
                        window.location = "/proposal/new/preview";
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        else {
            $('#choose-product-error-msg').html('<b>Please select a template</b>');
            $('#choose-product-error-msg').css('color', '#f0523d');
        }
    });

    $('#send-proposal-to, #send-proposal-from, #send-proposal-subject, #editor1').blur(function () {
        $("#preview-send-proposal-to").html($('#send-proposal-to').val());
        $("#preview-send-proposal-from").html($('#send-proposal-from').val());
        $("#preview-send-proposal-subject").html($('#send-proposal-subject').val());
        //$("#preview-send-proposal-message").html($('#editor1').val());
    });
    //save and send new proposal
    $('#btn-proposal-send-stage').on('click', function () {
        alert("Sent...");
    });
    /* Save Post */
    $('#btn-save-post').click(function () {
        var title = $('#post-title').val();
        var content = CKEDITOR.instances['post-content'].getData();
        //console.log('[CONTENT]', content);
        // var content = $('#post-content').val();
        var id = $('#post-id').val();
        var url = (id === '') ? "/post/add" : "/post/update";
        // alert(url);

        if (title != '') {
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: "title=" + title + '&content=' + encodeURIComponent(content) + '&id=' + id,
                success: function (data) {
                    //console.log(data);
                    var post = jQuery.parseJSON(data);
                    if (post.result === 'true') {
                        if (id === '') {
                            window.location = "/post/edit/" + post.last_id
                        }
                        else {
                            const myAlert = document.querySelector('#alertToast');

                            const bsAlert = new bootstrap.Toast(myAlert);//inizialize it

                            bsAlert.show();//show it

                            const myAlertMsg = $('#toast-body');
                            myAlertMsg.html("Post Saved Successfully");

                            $('#alert-dismiss').removeClass("d-none");
                            $('#alert-dismiss').css('display', 'inline', 'important');
                            window.setTimeout(function () {
                                $("#alert-dismiss").fadeTo(500, 0).slideUp(500, function () {
                                    $(this).css('visibility', 'd-none', 'important');
                                });
                            }, 4000);
                            window.setTimeout(function () {
                                $("#alert-dismiss").removeAttr('style');
                                $("#alert-dismiss").addClass('d-none');
                            }, 6000);
                            $("#preloader").html("");
                        }
                    }
                },
                beforeSend: function () {
                    $("#preloader").html("<i class='fa fa-spinner fa-spin'>");
                }
            });
        }
        else {
            $('#post-title').attr('data-toggle', 'tooltip');
            $('#post-title').attr('title', 'Please insert a Title');
            $('[data-toggle="tooltip"]').tooltip();
            $('#post-title').focus();
        }
    });
    /* Save Page */
    $('#btn-save-page').click(function () {
        var title = $('#page-title').val();
        var content = CKEDITOR.instances['page-content'].getData();
        // var content = $('#page-content').val();
        var id = $('#page-id').val();
        var url = (id === '') ? "/page/add" : "/page/update";
        console.log('[CONTENT]', content, '[TYPE OF ID]', typeof id, '[url]', url);
        // alert(url);

        if (title != '') {
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: "title=" + title + '&content=' + encodeURIComponent(content) + '&id=' + id,
                success: function (data) {
                    console.log('returnedData', data);
                    var post = jQuery.parseJSON(data);
                    if (post.result === 'true') {
                        if (id === '') {
                            window.location = "/page/edit/" + post.last_id
                        }
                        else {
                            const myAlert = document.querySelector('#alertToast');
                            const bsAlert = new bootstrap.Toast(myAlert);//inizialize it
                            bsAlert.show();//show it
                            const myAlertMsg = $('#toast-body');
                            myAlertMsg.html("Page Saved Successfully");

                            // $('#alert-dismiss').removeClass("d-none");
                            // $('#alert-dismiss').css('display', 'inline', 'important');
                            // window.setTimeout(function () {
                            //     $("#alert-dismiss").fadeTo(500, 0).slideUp(500, function () {
                            //         $(this).css('visibility', 'd-none', 'important');
                            //     });
                            // }, 4000);
                            // window.setTimeout(function () {
                            //     $("#alert-dismiss").removeAttr('style');
                            //     $("#alert-dismiss").addClass('d-none');
                            // }, 6000);
                            // $("#preloader").html("");
                        }
                    }
                },
                beforeSend: function () {
                    $("#preloader").html("<i class='fa fa-spinner fa-spin'>");
                }
            });
        }
        else {
            $('#page-title').attr('data-toggle', 'tooltip');
            $('#page-title').attr('title', 'Please insert a Title');
            $('[data-toggle="tooltip"]').tooltip();
            $('#page-title').focus();
        }
    });
    /* Save New Product */
    $('#btn-product-save').click(function () {
        var name = $('#product-name').val();
        var short_description = $('#short_description').val();
        var product_description = $('#product_description').val();
        var price = $('#price').val();
        var regular_price = $('#regular-price').val();
        var sale_price = $('#sale-price').val();
        var category = $('#category').val();
        var active = ($('#active_toggle_switch').is(':checked')) ? '1' : '0';
        var id = $('#product-id').val();
        var saved_name = $('#saved-name').val();
        var url = (id === '') ? "/product/add" : "/product/update";
        //alert(active);

        if (name != '') {
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: "name=" + name
                    + '&short_description=' + encodeURIComponent(short_description)
                    + '&product_description=' + encodeURIComponent(product_description)
                    + '&price=' + price
                    + '&regular_price=' + regular_price
                    + '&sale_price=' + sale_price
                    + '&category=' + category
                    + '&active=' + active
                    + '&saved_name=' + saved_name
                    + '&id=' + id,
                success: function (data) {
                    //console.log(data);
                    var product = jQuery.parseJSON(data);
                    if (product.result === 'true') {
                        if (id === '') {
                            window.location = "/product/edit/" + product.last_id
                        }
                        else {
                            //alert('updated');
                            $('#alert-dismiss').removeClass("hidden");
                            $('#alert-dismiss').css('display', 'inline', 'important');
                            window.setTimeout(function () {
                                $("#alert-dismiss").fadeTo(500, 0).slideUp(500, function () {
                                    $(this).css('visibility', 'hidden', 'important');
                                });
                            }, 2000);
                            window.setTimeout(function () {
                                $("#alert-dismiss").removeAttr('style');
                                $("#alert-dismiss").addClass('hidden');
                            }, 4000);
                            $("#preloader").html("");
                        }
                    }
                    if (product.result === 'slug_already_exists') {
                        $('#product-name').attr('data-toggle', 'tooltip');
                        $('#product-name').attr('title', 'This product name already exists! Please change it');
                        $('[data-toggle="tooltip"]').tooltip();
                        $('#product-name').focus();
                        $("#preloader").html("");
                    }
                },
                beforeSend: function () {
                    $("#preloader").html("<i class='fa fa-spinner fa-spin'>");
                }
            });
        }
        else {
            $('#product-name').attr('data-toggle', 'tooltip');
            $('#product-name').attr('title', 'Please insert a Name');
            $('[data-toggle="tooltip"]').tooltip();
            $('#product-name').focus();
        }
    });

    $('#entity_image').change((e) => {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        // $('#update-image-label').hide();
        $('#btn-update-img').removeClass('d-none');
        // console.log('Input', e.target.files[0].name);
        // console.log('Input', url);
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-update-icon').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        else {
            $('.img-update-icon').attr('src', '/img/sys/image-fill.svg');
        }
    });

    $('#form-update-img').submit(function (e) {
        e.preventDefault();

        var pic = $("#entity_image").prop('files')[0];
        var post_id = $("#post_id").val();
        var data = new FormData();
        data.append('pic', pic);
        data.append('id', post_id);

        $.ajax({
            url: '/post/upload_image',
            type: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false, // Not to process data
            dataType: false,
            success: function (data) {
                //console.log(data);
                $('#post_image').attr('src', data);
            },
            error: function (e) {
                alert("error while trying to add or update image!");
            }
        });

        $('#btn-update-img').addClass('d-none');
    })

    $('.img-update-icon').click(() => {
        //console.log('open dialog');
        $('#entity_image').click();
    })

    /*$('#active_toggle_switch').click(function(){
       if($(this).is(':checked'))
        alert($(this).val());
    })*/

    /* Save New Term */
    $('#btn-term-save').click(function () {
        var name = $('#term-name').val();
        var active = ($('#active_toggle_switch').is(':checked')) ? '1' : '0';
        var id = $('#term-id').val();
        var saved_name = $('#saved-name').val();
        var url = (id === '') ? "/term/add" : "/term/update";
        //alert(active);

        if (name != '') {
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: "name=" + encodeURIComponent(name)
                    + '&active=' + active
                    + '&saved_name=' + saved_name
                    + '&id=' + id,
                success: function (data) {
                    //console.log(data);
                    var term = jQuery.parseJSON(data);
                    if (term.result === 'true') {
                        if (id === '') {
                            window.location = "/term/edit/" + term.last_id
                        }
                        else {
                            //alert('updated');
                            $('#alert-dismiss').removeClass("hidden");
                            $('#alert-dismiss').css('display', 'inline', 'important');
                            window.setTimeout(function () {
                                $("#alert-dismiss").fadeTo(500, 0).slideUp(500, function () {
                                    $(this).css('visibility', 'hidden', 'important');
                                });
                            }, 2000);
                            window.setTimeout(function () {
                                $("#alert-dismiss").removeAttr('style');
                                $("#alert-dismiss").addClass('hidden');
                            }, 4000);
                            $("#preloader").html("");
                        }
                    }
                    if (term.result === 'term_already_exists') {
                        $('#product-name').attr('data-toggle', 'tooltip');
                        $('#product-name').attr('title', 'This Term name already exists! Please change it');
                        $('[data-toggle="tooltip"]').tooltip();
                        $('#product-name').focus();
                        $("#preloader").html("");
                    }
                },
                beforeSend: function () {
                    $("#preloader").html("<i class='fa fa-spinner fa-spin'>");
                }
            });
        }
        else {
            $('#product-name').attr('data-toggle', 'tooltip');
            $('#product-name').attr('title', 'Please insert a Name');
            $('[data-toggle="tooltip"]').tooltip();
            $('#product-name').focus();
        }
    });

    $("#submit-contact-form-btn").click(function () {
        let valid = true;
        let companyEmail = $("#companyEmail").val();
        let contactName = $("#contactName").val();
        let contactEmail = $("#contactEmail").val();
        let contactSubject = $("#contactSubject").val();
        let contactMessage = $("#contactMessage").val();
        let contactNewsletter = $("#contactNewsletter").val();

        $('#contact-form input, #contact-form textarea').each(
            function (index) {
                var input = $(this);
                if (input.val() == "" && input.attr('required') == 'required') {
                    input.css('border', 'solid #dd4a21 1px', 'important');
                    valid = false;
                }
            }
        );
        if (valid) {
            $.ajax({
                type: "POST",
                url: "/user/submitContactForm",
                dataType: "text",
                data: "name=" + contactName + "&email=" + contactEmail + "&subject=" + contactSubject + "&message=" + contactMessage,
                cache: "false",
                success: function (data) {
                    // alert(data);
                    if (data === '1') {
                        $("#contact-form").css('display', 'flex', 'important');
                        $("#contact-form").css('align-items', 'center', 'important');
                        $("#contact-form").css('justify-content', 'center', 'important');
                        $("#contact-form").css('height', '20%', 'important');
                        $("#contact-form").html("<h3>Your message has been sent</h3> <br/>");
                        $("<p id='message-text' style='display:flex; align-items: center; justify-content: center;' class='text-muted'>I will be reaching out to you shortly</p>").insertAfter("#contact-form");
                    } else {
                        $("#add_err").css('display', 'flex', 'important');
                        $("#add_err").css('align-items', 'center', 'important');
                        $("#add_err").css('justify-content', 'center', 'important');
                        $("#add_err").css('height', '50px', 'important');
                        $("#add_err").css('color', 'red', 'important');
                        $("#add_err").html("There was an error sending your message. Please try again or send me an email to <a href='mailto:" + companyEmail + "'>" + companyEmail + "</a>");
                        $("#preloader").html("");
                    }
                },
                beforeSend: function () {
                    $("#add_err").css('display', 'none', 'important');
                    $("#preloader").html("<i class='bi bi-arrow-clockwise'>");
                },
            });
        }
        return false;
    });

    $('#recruiter').click(() => {
        if ($("#recruiter").is(':checked')) {
            $("#company, #linkedin").attr('disabled', false);
            $("#company, #linkedin").attr('required', true);
            $("#company").focus();
        } else {
            $("#company, #linkedin").attr('disabled', true);
            $("#company, #linkedin").css('border', 'solid #CED4DA 1px');
            $("#company, #linkedin").val('');
        }
    });

    $("#signup-btn").click(function () {
        let valid = true;
        let companyEmail = $("#companyEmail").val();
        let userName = $("#name").val();
        let userLastName = $("#lastname").val();
        let userEmail = $("#email").val();
        let userPassword = $("#password").val();
        let recruiterChk = $("#recruiter").val() == 'on' ? 1 : 0;
        let linkedin = $("#linkedin").val();
        let company = $("#company").val();
        const preloader = $('#preloader');
        preloader.removeClass('d-none');

        // Validation
        $('#signup-form input, #signup-form password').each(
            function (index) {
                const input = $(this);
                const val = input.val();

                if (val == "" && input.attr('required') == 'required') {
                    input.css('border', 'solid #dd4a21 1px', 'important');
                    valid = false;
                }
                if (input.attr('id') == 'email' && !emailIsValid(val)) {
                    $('#email').css('border', 'solid #dd4a21 1px', 'important');
                    $('#email-error').remove(); // Remove any existing error messages
                    $("<small id='email-error' style='display:flex; align-items: left; justify-content: left;' class='text-danger'>Please enter the correct email format</small>").insertAfter("#email");
                    valid = false;
                }
                if (input.attr('id') == 'password' && val.length < 8) {
                    $('#password').css('border', 'solid #dd4a21 1px', 'important');
                    $('#password-error').remove(); // Remove any existing error messages
                    $("<small id='password-error' style='display:flex; align-items: left; justify-content: left;' class='text-danger'>Password must be at least 8 characters long.</small>").insertAfter("#password");
                    valid = false;
                }
            }
        );

        if (valid) {
            $.ajax({
                type: "POST",
                url: "/user/submitSignupForm",
                dataType: "text",
                data: "name=" + userName + "&lastname=" + userLastName + "&email=" + userEmail + "&password=" + userPassword + "&recruiter=" + recruiterChk + "&company=" + company + "&linkedin=" + linkedin,
                cache: "false",
                success: function (data) {
                    console.log('data: ' + data);
                    if (data === 'invalidEmail') {
                        $('#email').css('border', 'solid #dd4a21 1px', 'important');
                        $('#email-error').remove(); // Remove any existing error messages
                        $("<small id='email-error' style='display:flex; align-items: left; justify-content: left;' class='text-danger'>Email already exists.</small>").insertAfter("#email");
                        return;
                    }
                    if (data === 'true1') {
                        $("#signup-title").css('display', 'none', 'important');
                        $("#signup-card").css('display', 'flex', 'important');
                        $("#signup-card").css('align-items', 'center', 'important');
                        $("#signup-card").css('justify-content', 'center', 'important');
                        $("#signup-card").css('height', '20%', 'important');
                        $("#signup-card").html("<h3>Thank you!</h3> <br/>");
                        $("<p id='message-text' style='display:flex; align-items: center; justify-content: center;' class='text-muted'>Now you can have access to more detailed content</p>").insertAfter("#signup-card");
                        window.location = '/';
                    } else {
                        $("#add_err").css('display', 'flex', 'important');
                        $("#add_err").css('align-items', 'center', 'important');
                        $("#add_err").css('justify-content', 'center', 'important');
                        $("#add_err").css('height', '50px', 'important');
                        $("#add_err").css('color', 'red', 'important');
                        $("#add_err").html("There was an error sending your request. Please try again.");
                        $("#preloader").html("");
                    }
                },
                beforeSend: function () {
                    $("#add_err").css('display', 'none', 'important');
                    $("#preloader").html("<i class='bi bi-arrow-clockwise'>");
                },
            });
        }
        preloader.addClass('d-none');
        return false;
    });

    // Toggle Menu
    $('#navbar-toggle').click(() => {
        toggleMenu = !toggleMenu;
        if (toggleMenu) {
            $("header").css('display', 'block', 'important');
            $("header").css('padding-top', '5em', 'important');
        } else {
            $("header").css('display', 'none', 'important');
        }
    });

    $('.zipcode-checker-form').submit((e) => {
        e.preventDefault();

        const zipcode = ($('#zipcode-checker-input').val() == "" || $('#zipcode-checker-input').val() == undefined) ? $('#zipcode-checker-input2').val() : $('#zipcode-checker-input').val();
        const data = "?zip=" + zipcode;
        const apiURL = $('#apiURL').val();
        console.log('apiURL', apiURL + data);
        if (!isNumeric(zipcode)) {
            $('#zipcode-form-error').removeClass('d-none');
            $('#zipcode-form-error').html("ZIP Code must be a numeric value");
            return;
        }

        $.ajax({
            type: "POST",
            crossDomain: true,
            url: apiURL + data,
            success: function (data) {
                if (data.message === 'success') {
                    if (data.data['powur_served'] == 1) {
                        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                            keyboard: false
                        })
                        myModal.show();
                    } else {
                        alert("Sorry, " + data.data["city"] + ", " + data.data["state_id"] + ", is not within our served areas.");
                    }
                    clearError();
                    //window.location = "/" + defa_controller + "/" + defa_action;
                } else {
                    console.log('apiURL + data', apiURL + data);
                    $('#zipcode-form-error').removeClass('d-none');
                    $('#zipcode-form-error').html("Invalid ZIP Code");
                }
            }
        });
    });

    $('#zipcode-checker-input').keyup(() => {
        const zipcode = $('#zipcode-checker-input').val();
        if (zipcode.length == 0) {
            $('#zipcode-form-error').addClass('d-none');
        }
    });

    $('#quote-form').submit((e) => {
        e.preventDefault();
        const formElements = e.target.elements;
        let queryParams = "";
        for (var i = 0, element; element = formElements[i++];) {
            if (element.type !== "button" && element.value !== "") {
                const connector = i == 1 ? "" : "&";
                queryParams += connector + element.name + "=" + element.value;
            }
        }

        console.log("queryParams", queryParams);

        $.ajax({
            url: '/page/submit_quote',
            type: "POST",
            data: queryParams,
            dataType: "json",
            success: function (data) {
                console.log('data: ' + data);
                var client = jQuery.parseJSON(data);
                if (client.result === "true") {
                    $('#quote-form-fields').addClass('d-none');
                    $('#quote-thankyou').removeClass('d-none');
                    $('#btn-quote-form').addClass('d-none');
                }
            },
            error: function (e) {
                alert("Error while trying to save the quote!");
            }
        });
    });

    $('#post-delete').click((e) => {
        e.preventDefault();
        console.log('Delete Post');
        if (confirm('Are you sure?')) {
            const post_id = $('#post-delete').attr("data-id");
            $.ajax({
                type: "POST",
                url: "/post/delete",
                dataType: "text",
                data: "id=" + post_id,
                success: function (user) {
                    //console.log(user);
                    if (user === 'true') {
                        window.location = '/post/list';
                    } else {
                        // $("#add_err").css('display', 'inline', 'important');
                        // $("#add_err").html('Impossible to update User');
                    }
                },
                beforeSend: function () {
                    //$("#add_err").css('display', 'inline', 'important');
                    //$("#add_err").html("<div><i class=''> Loading...</div>");
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    });

    $('#form-contact').submit((e) => {
        e.preventDefault();
        const formElements = e.target.elements;
        let queryParams = "";
        for (var i = 0, element; element = formElements[i++];) {
            if (element.type !== "button") {
                const connector = i == 1 ? "" : "&";
                queryParams += connector + element.name + "=" + element.value;
            }
        }

        console.log("queryParams", queryParams);

        $.ajax({
            url: '/page/submitContactForm',
            type: "POST",
            data: queryParams,
            dataType: "json",
            success: function (data) {
                if (data === true) {
                    $('.contact-wrapper').addClass('d-none');
                    $('.contact-thankyou').removeClass('d-none');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });
});

function isNumeric(str) {
    if (typeof str != "string") return false // we only process strings!  
    return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
        !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
}