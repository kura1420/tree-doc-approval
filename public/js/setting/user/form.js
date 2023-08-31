import * as _ from "/js/setting/user/_var.js";

_.name.textbox({
    label: "Name",
    required: true,
    disabled: true,
});

_.email.textbox({
    label: "Email",
    required: true,
    disabled: true,
    validType: "email",
});

_.password.passwordbox({
    label: "Password",
    disabled: true,
});

_.active.switchbutton({
    label: "Active",
    disabled: true,
    value: 1,
    checked: false,
});
