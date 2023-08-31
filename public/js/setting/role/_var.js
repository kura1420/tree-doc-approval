export const token = $('meta[name="csrf-token"]').attr("content");

export const tt = $('#tt');
export const ss = $('#ss');
export const dg = $('#dg');
export const ff = $('#ff');

// define field
export const id = $('#id');
export const name = $('#name');
export const guard_name = $('#guard_name');

// button
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
            // console.log(data) // debug result from endpoint

            btnAdd.linkbutton({disabled: false});
            btnSave.linkbutton({disabled: false});
            btnEdit.linkbutton({disabled: true});
            btnCopy.linkbutton({disabled: true});
            btnRemove.linkbutton({disabled: false});

            if (_state == 'COPY') {
                id.textbox('setValue', '');
            } 

            // set field to edit data
            name.textbox({ disabled: false });
            guard_name.textbox({ disabled: false });
        },
        onLoadError: function (xhr) {
            const {responseJSON, responseText, status, statusText} = xhr;

            alertMessage(responseJSON, responseText, status, statusText);
        }
    });
}
