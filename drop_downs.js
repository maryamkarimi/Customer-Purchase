window.onload = function() {
        prepareListener();
}

function prepareListener() {

	// gets the drop down list from part 2 (show customers). when changed, calls refresh()
        var order_by_droppy;
        order_by_droppy = document.getElementById("select_order_by");
        order_by_droppy_value = order_by_droppy.value;
        order_by_droppy.addEventListener("change",refresh);

	// gets the drop down list from update_customer_phone part. when changed, calls refresh()
        var select_customer_droppy;
        select_customer_droppy = document.getElementById("update_customer_phone");
        select_customer_droppy_value = select_customer_droppy.value;
        select_customer_droppy.addEventListener("change",refresh);
}


// submits the form
function refresh(){
        this.form.submit();
}

// sets the new phone label and textbox, and submit button visible.
function set_visible(){
        var new_phone_label;
        new_phone_label = document.getElementById("new_phone_label");

        var new_phone_textbox;
        new_phone_textbox = document.getElementById("new_phone_textbox");

        var update_customer_phone_submit;
        update_customer_phone_submit = document.getElementById("update_customer_phone_submit");

        new_phone_label.style.display = "inline";
        update_customer_phone_submit.style.display = "inline";
        new_phone_textbox.style.display = "inline";
        this.form.submit();
}


