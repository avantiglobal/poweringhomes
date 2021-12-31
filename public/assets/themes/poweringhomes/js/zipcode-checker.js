(function ($) {

    $("#zipcode-checker-btn").click(function () {
        // alert($("#zipcode-checker-input").val() + " Value");
        zipcode = $("#zipcode-checker-input").val();

        $.ajax({
            type: "POST",
            url: "/api/zipcode/?zip=" + zipcode,
            dataType: "json",
            // data: "zip=" + zipcode,
            // cache: "false",
            success: function (data) {
                // console.log('Response data: ' + data.powur_served);
                if (data.powur_served == '1') {
                    const clientForm = '<form id="clientForm" style="text-align:center;">' +
                        '  <div id="step-1">' +
                        '    <div class="form-step">1</div>' +
                        '    <div class="text-strong">HOW MUCH IS YOUR TYPICAL ELECTRICITY BILL?</div>' +
                        '    <span class="divider w-12"></span>' +
                        '    <input type="text" name="electricityamount" class="input-big" placeholder="$0" required>' +
                        '    <div class="input-under">Per Month</div>' +
                        '    <div id="req_electricityamount" class="step--hide text-danger">This field is required</div>' +
                        '    <div>&nbsp;</div>' +
                        '    <div class="form-step">2</div>' +
                        '    <div class="text-strong">TELL US MORE ABOUT YOU</div>' +
                        '    <span class="divider w-12"></span>' +
                        '    <div class="form-wrapper">' +
                        '      <div class="form-row">' +
                        '        <div class="form-group grow-2">' +
                        '          <div class="form-label">First Name</div><input type="text" name="firstname" class="form-input"  required>' +
                        '          <div id="req_firstname" class="step--hide text-danger">This field is required</div>' +
                        '        </div>' +
                        '        <div class="form-group grow-2">' +
                        '          <div class="form-label">Last Name</div><input type="text" name="lastname" class="form-input"  required>' +
                        '          <div id="req_lastname" class="step--hide text-danger">This field is required</div>' +
                        '        </div>' +
                        '      </div>' +
                        '      <div class="form-row">' +
                        '        <div class="form-group grow-3">' +
                        '          <div class="form-label">Street Address</div><input type="text" name="streetaddress" class="form-input"  required>' +
                        '          <div id="req_streetaddress" class="step--hide text-danger">This field is required</div>' +
                        '        </div>' +
                        '        <div class="form-group grow-1">' +
                        '          <div class="form-label">Unit</div><input type="text" name="unit" class="form-input" >' +
                        '        </div>' +
                        '      </div>' +
                        '      <div class="form-row">' +
                        '        <div class="form-group grow-1">' +
                        '          <div class="form-label">City</div><input type="text" name="city" class="form-input" value="' + data.city + '" required>' +
                        '          <div id="req_city" class="step--hide text-danger">This field is required</div>' +
                        '        </div>' +
                        '        <div class="form-group grow-1">' +
                        '          <div class="form-label">State</div><input type="text" name="state" class="form-input" value="' + data.state_id + '" required>' +
                        '          <div id="req_state" class="step--hide text-danger">This field is required</div>' +
                        '        </div>' +
                        '        <div class="form-group grow-1">' +
                        '          <div class="form-label">ZipCode</div><input type="text" name="zipcode" class="form-input" value="' + data.zip + '"  required>' +
                        '          <div id="req_zipcode" class="step--hide text-danger">This field is required</div>' +
                        '        </div>' +
                        '      </div>' +
                        '      <div class="form-row">' +
                        '        <div class="form-group grow-2">' +
                        '          <div class="form-label">Phone</div> <i class="fa fa-phone"></i><input type="text" name="phone" class="form-input pl-ext"  required>' +
                        '          <div id="req_phone" class="step--hide text-danger">This field is required</div>' +
                        '        </div>' +
                        '        <div class="form-group grow-2">' +
                        '          <div class="form-label">Email</div> <i class="fa fa-envelope"></i><input type="text" name="email" class="form-input pl-ext"  required>' +
                        '          <div id="req_email" class="step--hide text-danger">This field is required</div>' +
                        '        </div>' +
                        '      </div>' +
                        '      <div>&nbsp;</div>' +
                        '      <div>' +
                        '        <input type="button" class="modal-close-btn" value="NEXT STEP" onclick="nextStep()" />' +
                        '      </div>' +
                        '      <div>&nbsp;</div>' +
                        '      <div class="text-small mb-2">By submitting this request, you authorize Powering Homes to call you or text you on the phone number you provided and prerecorded calls or messages even if your number is on any federal, state, or local do not call list. Your consent to this agreement is not required to purchase products or services. We respect your privacy.</div>' +
                        '      <div>&nbsp;</div>' +
                        '    </div>' +
                        '  </div>' +
                        '  <div id="step-2" class="step--hide">' +
                        '    <div class="form-step">3</div>' +
                        '    <div>Load Bill</div>' +
                        '    <div>&nbsp;</div>' +
                        '    <div>' +
                        '    <input type="button" id="get_file" value="Find and Upload Bill" onclick="openFileBrowser()" >' +
                        '    <input type="file" id="my_file" onchange="uploadManager()" >' +
                        '    </div>' +
                        '    <div>&nbsp;</div>' +
                        '  </div> ' +
                        '</form>';

                    openModal('form', clientForm);
                    //     $("#add_err").html("");
                    //     window.location = "/" + defa_controller + "/" + defa_action;
                    // } else {
                    //     $("#add_err").css('display', 'inline', 'important');
                    //     $("#add_err").css('color', 'red', 'important');
                    //     $("#add_err").html("Wrong username or password");
                    //     $("#preloader").html("");
                } else {
                    const displayMsg = (data.city == undefined) ? 'Please enter a valid Zip Code' : "We're sorry! " + data.city + ", " + data.state_id + " is not currently in an area we support.";
                    openModal('text', '<h3>' + displayMsg + '</h3>');
                }
            },
            beforeSend: function () {
                // $("#add_err").css('display', 'none', 'important');
                // $("#preloader").html("<i class='fa fa-spinner fa-spin'>");
            },
        });
        return false;

    });


    function openModal(contentType, content) {
        $("body").addClass("modal-open");
        $("#modal-wrapper").addClass("modal--open");
        if (contentType == 'form') {
            $(".card-header-wrapper").addClass('card-header--bg-blue');
            $(".card-header").after("<div class='card-header-text'>Congratulations, you are in an area prime for solar savings." +
                "<div class='card-header-subtext'>Complete your information below to continue.</div>" +
                "</div>");
            $(".card-footer").hide();
        } else {
            // $(".card-body").addClass("text-big");
        }
        $(".card-body").html(content);
    }

    function closeModal() {
        resetModalContent();
        $("card-body").removeClass("text-big");
        $("body").removeClass("modal-open");
        $("#modal-wrapper").removeClass("modal--open");
    }

    function resetModalContent() {
        $(".card-header-text").html("");
        $(".card-header-wrapper").removeClass('card-header--bg-blue');
        $("#card-body").html("");
        $(".card-footer").show();
    }

    $(".modal-close-btn").click(function () {
        closeModal();
    });

    $("#my_file").click(function () {
        // $("#my_file").change(function (e) {
        // $('input[type=file]').change(function (e) {
        // $('#customfileupload').html($(this).val());
        alert('Uploading file...');
    });

})(jQuery);

function nextStep() {
    const oFormElements = document.getElementById("clientForm").elements;
    let isReq = false;
    let mailContent = "";
    let strQuery = "";
    for (var i = 0; i < oFormElements.length; i++) {
        const element = oFormElements[i];
        if (element.type !== "button") {
            if (element.value == "" && element.required) {
                try {
                    showElement('req_' + element.name);
                } catch {

                }
                isReq = true;
            }
            // console.log(element);
            // element.style.border = "solid red 1px";
            mailContent += ("<div><strong>" + element.name + "<strong>: " + element.value + "</div>");
            strQuery += element.name + "=" + element.value + "&";

            // console.log(element.name + ": " + element.value + "  " + element.required);
        };
    };
    // console.log("Query Str: " + strQuery);
    if (!isReq) {
        // processForm(strQuery, mailContent);
        // hideElement("step-1");
        // showElement("step-2");
        let xmlhttp = new XMLHttpRequest();
        // console.log('Enters 1');
        xmlhttp.onreadystatechange = function () {
            console.log('Enters 2');
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
                document.getElementsByClassName("card-header-text")[0].innerHTML = "Thank you!";
                console.log("Server Response:: " + this.responseText);
                console.log("-- End Server Response --");
                hideElement("step-1");
                showElement("step-2");
            }
        };
        xmlhttp.open("GET", "/api/client/?" + strQuery, true);
        xmlhttp.send();
    }
};

function showElement(el) {
    let element = document.getElementById(el);
    element.style['visibility'] = 'visible';
    element.style['display'] = 'block';
}
function hideElement(el) {
    let element = document.getElementById(el);
    element.style['display'] = 'none';
}

function openFileBrowser() {
    document.getElementById("my_file").click();
}

function uploadManager() {
    alert("Uploading File");
}

function processForm(strQuery, mailContent) {

}