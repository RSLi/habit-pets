function post_json(path, json) {
    method = "post";
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "udata");
    hiddenField.setAttribute("value", json);

    form.appendChild(hiddenField);

    document.body.appendChild(form);
    form.submit();
}
