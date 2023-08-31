$(document).ready(function () {
    const RESTMODULE = REST + '/document';

    $('.btnReject').click(function (e) { 
        e.preventDefault();

        let id = $(this).attr('id');

        let params = {
            url: RESTMODULE + "/" + id,
            type: "PUT",
            data: {
                __state: 'reject',
            },
            dataType: "json",
        };

        submit(params, (res) => {
            if (res.success) {
                alertMessage(res.data, res.message, 200, "Info");

                setInterval(() => {
                    window.location.reload();
                }, 1000);
            } else {
                const { responseJSON, responseText, status, statusText } = res;

                alertMessage(responseJSON, responseText, status, statusText);
            }
        });
    });

    $('.btnSendOtp').click(function (e) { 
        e.preventDefault();
        
        let id = $(this).attr('id');

        let params = {
            url: RESTMODULE + "/" + id,
            type: "PUT",
            data: {
                __state: 'request_otp',
            },
            dataType: "json",
        };

        submit(params, (res) => {
            if (res.success) {
                const { data, status, message } = res;

                $('#document_id').textbox('setValue', data.id);
                $('#otp').textbox('clear');

                $('#dlg1').dialog('open').dialog('center');
            } else {
                const { responseJSON, responseText, status, statusText } = res;

                alertMessage(responseJSON, responseText, status, statusText);
            }
        });
    });

    $('#btnAccept').click(function (e) { 
        e.preventDefault();

        let id = $('#document_id').textbox('getValue');

        let params = {
            url: RESTMODULE + "/" + id,
            type: "PUT",
            data: {
                __state: 'accept',
                otp: $('#otp').textbox('getValue'),
            },
            dataType: "json",
        };

        submit(params, (res) => {
            if (res.success) {
                alertMessage(res.data, res.message, 200, "Info");

                setInterval(() => {
                    window.location.reload();
                }, 1000);
            } else {
                const { responseJSON, responseText, status, statusText } = res;

                alertMessage(responseJSON, responseText, status, statusText);
            }
        });
    });
});