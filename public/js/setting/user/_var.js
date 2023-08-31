export const token = $('meta[name="csrf-token"]').attr("content");

export const tt = $('#tt');
export const ss = $('#ss');
export const dg = $('#dg');
export const ff = $('#ff');

export const id = $('#id');
export const name = $('#name');
export const email = $('#email');
export const password = $('#password');
export const active = $('#active');

export const btnAdd = $('#btnAdd');
export const btnSave = $('#btnSave');
export const btnEdit = $('#btnEdit');
export const btnCopy = $('#btnCopy');
export const btnRemove = $('#btnRemove');

export const formLoadData = (row, _state = 'EDIT') => {
    tt.tabs({selected: 1});

    ff.form('load', RESTMODULE + '/' + row.id);
    ff.form({
        onLoadSuccess: function (data) {
            btnAdd.linkbutton({disabled: false});
            btnSave.linkbutton({disabled: false});
            btnEdit.linkbutton({disabled: true});
            btnCopy.linkbutton({disabled: true});
            btnRemove.linkbutton({disabled: false});

            if (_state == 'COPY') {
                id.textbox('setValue', '');

                btnRemove.linkbutton({disabled: true});
            }

            name.textbox({disabled: false});
            email.textbox({disabled: false});
            password.passwordbox({disabled: false});
            active.switchbutton({disabled: false});
        },
        onLoadError: function (xhr) {
            const {responseJSON, responseText, status, statusText} = xhr;

            alertMessage(responseJSON, responseText, status, statusText);
        }
    });
}
