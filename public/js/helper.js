function alertMessage (responseJSON, responseText, status, statusText) {
    if (status >= 100 && status <= 103) {
        
    } else if (status >= 200 && status <= 226) {
        $.messager.alert(statusText, responseText, 'info');
    } else if (status >= 300 && status <= 308) {

    } else if (status >= 400 && status <= 451) {
        let message = xhrMessage(responseJSON, status);

        $.messager.alert(statusText, message, 'warning');
    } else if (status >= 500 && status <= 511) {
        let message = xhrMessage(responseJSON, status);

        $.messager.alert(statusText, message, 'error');
    } else {
        $.messager.alert('Untitled', 'Status code not found');
    }
}

function xhrMessage (lists, status) {
    const messages = [];

    if (status == 422) {
        let errors = lists.errors;

        $.each(errors, function (key, value) { 
            if (typeof value === 'object') {
                messages.push(value[0]);
            } else {
                messages.push(value);
            }
        });
    } else {
        $.each(lists, function (key, value) { 
            if (key !== 'trace') {
                messages.push(`${key}: ${value}`);
            }
        });   
    }

    return messages.join("<br />");
}

function submit (params, callback) { 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    const { type, url, data, dataType } = params;
    
    $.messager.progress();

    $.ajax({
        type,
        url,
        data,
        dataType,
        success: function (response) {
            $.messager.progress('close');

            response.success = true;
            callback(response);
        },
        error: function (xhr) {
            $.messager.progress('close');

            xhr.success = false;
            callback(xhr);
        }
    });
}

function loadPage (url, text) {
    const tabs = $('#_tb').tabs('tabs');
    const tabIsExists = $('#_tb').tabs('exists', text);

    if (tabs.length == 10) {
        $.messager.alert('Info','Tabs cannot be more than 10');
    }

    if (tabIsExists) {
        $('#_tb').tabs('select', text);
    }

    if (! tabIsExists && tabs.length <= 10) {
        const iframe = `<iframe src="${PAGE}/${url}" frameborder="0" style="width:100%;height:99%;"></iframe>`;

        $('#_tb').tabs('add', {
            title: text,
            content: iframe,
            closable: true,
            fit: true,
            border: false,
        });
    }
}

function currencyFormat (value) {
    return new Intl.NumberFormat('id-ID').format(value);
}

function reloadTree () {
    $("#_tt").tree('reload');
}