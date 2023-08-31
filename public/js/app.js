const REST_PROFILE = REST + "/profile";

// dev module
// let iframe = `<iframe src="${PAGE}/master/material" frameborder="0" style="width:100%;height:99%;"></iframe>`;
// $('#_tb').tabs('add', {
//     title: 'master - material',
//     content: iframe,
//     closable: true,
//     fit: true,
//     border: false,
// });

$("#_tt").tree({
    url: REST + "/menu",
    lines: true,
    loader: function (param, success, error) {
        const { url, method } = $(this).tree("options");

        let params = {
            url: url,
            type: method,
            data: param,
            dataType: "json",
        };

        submit(params, (res) => {
            if (res.success) {
                success(res.data);
            } else {
                error(res);
            }
        });
    },
    onLoadSuccess: function (node, data) {

    },
    onLoadError: function (arguments) {
        const { responseJSON, responseText, status, statusText } = xhr;

        alertMessage(responseJSON, responseText, status, statusText);
    },
    onDblClick: function (node) {
        const { id, text, page } = node;

        if (id !== undefined && text !== undefined && page !== undefined) {
            checkPage(id, text, page);
        }
    },
    onBeforeExpand: function (node) {
        
    },
    onContextMenu: function(e, node){
        e.preventDefault();

        // click right menu
        // if (node.child) {
        //     $(this).tree('select', node.target);
        
        //     $('#_mm').menu('show',{
        //         left: e.pageX,
        //         top: e.pageY
        //     });
        // }
    }
});

$("#_pg").propertygrid({
    url: REST_PROFILE,
    showHeader: false,
    fit: true,
    border: false,
    fitColumns: true,
    loader: function (param, success, error) {
        const { url, method } = $(this).datagrid("options");

        let params = {
            url: url,
            type: method,
            data: {},
            dataType: "json",
        };

        submit(params, (res) => {
            if (res.success) {
                success(res.data);
            } else {
                error(res);
            }
        });
    },
    onLoadSuccess: function (data) {},
    onLoadError: function (xhr) {
        const { responseJSON, responseText, status, statusText } = xhr;

        alertMessage(responseJSON, responseText, status, statusText);
    },
    toolbar: [
        {
            text: "Save",
            iconCls: "icon-save",
            handler: function () {
                let profiles = $("#_pg").propertygrid("getRows");

                var data = {};
                $.each(profiles, function (key, val) {
                    if (val.value !== null) {
                        let updateProfilesKey = val.name.toLowerCase();

                        Object.assign(data, { [updateProfilesKey]: val.value });
                    }
                });

                let params = {
                    url: REST_PROFILE + "/update",
                    type: "POST",
                    data: data,
                    dataType: "json",
                };

                submit(params, (res) => {
                    if (res.success) {
                        $("#_pg").propertygrid("reload");

                        $.messager.show({
                            title: "Info",
                            msg: res.message,
                            timeout: 5000,
                            showType: "slide",
                        });
                    } else {
                        const { responseJSON, responseText, status, statusText } = res;

                        alertMessage(responseJSON, responseText, status, statusText);
                    }
                });
            },
        },
        "-",
        {
            text: "Logout",
            iconCls: "icon-cancel",
            handler: function () {
                $.messager.confirm("Confirmation", "Do you want to logout?", function (r) {
                    if (r) {
                        $.ajax({
                            url: PAGE + "/logout",
                            type: "POST",
                            data: {},
                            dataType: "HTML",
                            success: function (response) {
                                window.location.reload();
                            },
                            error: function (xhr) {
                                $.messager.progress("close");

                                const { responseJSON, responseText, status, statusText } = xhr;

                                alertMessage(responseJSON, responseText, status, statusText);
                            },
                        });
                    }
                });
            },
        },
    ],
});
