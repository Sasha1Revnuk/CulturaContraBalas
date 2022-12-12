import translates from '/adm/lang/admin.json';

const dataHelper = require('/adm/js-helpers/dataHelper.js')

$(document).ready(function () {
    if ($('#models').length) {
        let columns = [
            {name: "text", width: "90%"},
            {name: "actions", className: "table-text-align-center", width: "10%"},
        ];
        let url = `${language}/admin-menu/api/addresses`;
        let data = {};
        let blocks = dataHelper.getDatatable(columns, url, data, true)

    }


    $('body').on('click', '.delete', function (e) {
        e.preventDefault()
        dataHelper.deleteItem(translates, `${language}/admin-menu/api/addresses/delete/${$(this).attr('data-address')}`, $(this).attr('data-href'))
    })
});
