import * as _ from "/js/setting/role/_var.js";

var tab;
var index;

_.tt.tabs({
    fit: true,
    border: false,
    tools: "#tab-tools",
    onSelect: function (title, index) {
        if (index === 0) {
            _.btnAdd.linkbutton({ disabled: false });
            _.btnSave.linkbutton({ disabled: true });
            _.btnEdit.linkbutton({ disabled: false });
            _.btnCopy.linkbutton({ disabled: false });
            _.btnRemove.linkbutton({ disabled: false });

            _.ff.form("clear");

            // set field if user move to list data
            _.name.textbox({ disabled: true });
            _.guard_name.textbox({ disabled: true });
            
        } else {
            _.btnAdd.linkbutton({ disabled: false });
            _.btnEdit.linkbutton({ disabled: true });
            _.btnCopy.linkbutton({ disabled: true });
            _.btnRemove.linkbutton({ disabled: true });
        }
    },
});

_.btnAdd.linkbutton({
    plain: true,
    iconCls: "icon-add",
    onClick: function () {
        tab = _.tt.tabs("getSelected");
        index = _.tt.tabs("getTabIndex", tab);

        if (index === 0) {
            _.tt.tabs({ selected: 1 });
        }

        _.btnAdd.linkbutton({ disabled: true });
        _.btnSave.linkbutton({ disabled: false });
        _.btnEdit.linkbutton({ disabled: true });
        _.btnCopy.linkbutton({ disabled: true });
        _.btnRemove.linkbutton({ disabled: true });

        _.id.textbox("clear");

        // set field to new data
        _.name.textbox({ disabled: false }).textbox('clear');
        _.guard_name.textbox({ disabled: false }).textbox('clear');
        
    },
});

_.btnSave.linkbutton({
    disabled: true,
    plain: true,
    iconCls: "icon-save",
    onClick: function () {
        _.ff.form("submit", {
            iframe: false,
            url: RESTMODULE + "/save",
            queryParams: {},
            onSubmit: function (param) {
                let isValid = _.ff.form("validate");

                // add param before post to endpoint
                // param.add_field = $('#add_field').textbox('getValue');

                if (!isValid) {
                    return false;
                }
            },
            success: function (res) {
                try {
                    const { data, message, success } = JSON.parse(res);

                    if (success) {
                        alertMessage(data, message, 200, "Info");

                        _.dg.datagrid("reload");

                        // back to listdata
                        _.tt.tabs({selected: 0});

                        // stay on form and ready to update
                        // _.id.textbox('setValue', data.id);

                    } else {
                        alertMessage(data, message, 422, "Warning");
                    }
                } catch (error) {
                    const { data, message, success } = JSON.parse(res);

                    $.messager.alert("Internal Server Error", message, "error");
                }
            },
        });
    },
});

_.btnEdit.linkbutton({
    plain: true,
    iconCls: "icon-edit",
    onClick: function () {
        let row = _.dg.datagrid("getSelected");

        if (row) {
            _.formLoadData(row);
        } else {
            $.messager.alert("Info", "Silahkan pilih salah satu baris");
        }
    },
});

_.btnCopy.linkbutton({
    plain: true,
    iconCls: "icon-copy",
    onClick: function () {
        let row = _.dg.datagrid("getSelected");

        if (row) {
            _.formLoadData(row, "COPY");
        } else {
            $.messager.alert("Info", "Silahkan pilih salah satu baris");
        }
    },
});

_.btnRemove.linkbutton({
    plain: true,
    iconCls: "icon-remove",
    onClick: function () {
        let row = _.dg.datagrid("getSelected");

        if (row) {
            $.messager.confirm("Confirmation", "Are you sure you want to delete this data?", function (r) {
                if (r) {
                    let id = row.id;

                    let params = {
                        url: RESTMODULE + "/" + id,
                        type: "DELETE",
                        data: { id },
                        dataType: "json",
                    };

                    submit(params, (res) => {
                        if (res.success) {
                            alertMessage(res.data, res.message, 200, "Info");

                            _.dg.datagrid("reload");

                            _.tt.tabs({ selected: 0 });
                        } else {
                            const { responseJSON, responseText, status, statusText } = res;

                            alertMessage(responseJSON, responseText, status, statusText);
                        }
                    });
                }
            });
        } else {
            $.messager.alert("Info", "Silahkan pilih salah satu baris");
        }
    },
});
