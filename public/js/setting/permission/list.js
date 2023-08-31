import * as _ from "/js/setting/permission/_var.js";

_.ss.searchbox({
    prompt: 'Search...',
    searcher: function (value) {
        _.dg.datagrid({
            queryParams: {
                search: value,
            },
        });
    }
});

_.dg.datagrid({
    url: RESTMODULE,
    border: false,
    fit: true,
    fitColumns: true,
    pagination: true,
    rownumbers: true,
    remoteSort: true,
    singleSelect: true,
    toolbar: '#tb',
    onDblClickRow: function (index, row) {
        _.formLoadData(row);
    },
    columns:[[
        // define field on list datagrid
        { field:'name', title:'Name', sortable: true, },
        { field:'guard_name', title:'Guard Name', sortable: true, },
    ]],
    loader: function (param, success, error) {
        const {url, method, pageNumber, pageSize, sortOrder, sortName} = $(this).datagrid('options');

        let params = {
            url: url,
            type: method,
            data: {
                page: pageNumber,
                size: pageSize,
                order: sortOrder,
                by: sortName,
                search: _.ss.searchbox('getValue'),
            },
            dataType: 'json',
        };

        submit(
            params,
            (res) => {
                if (res.success) {
                    success({
                        total: res.total,
                        rows: res.data
                    });
                } else {
                    error(res);
                }
            }
        );
    },
    onBeforeLoad: function (param) {
        
    },
    onLoadSuccess: function (data) {

    },
    onLoadError: function (xhr) {
        const {responseJSON, responseText, status, statusText} = xhr;

        alertMessage(responseJSON, responseText, status, statusText);
    },
});