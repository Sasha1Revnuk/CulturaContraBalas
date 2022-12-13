import translates from '/adm/lang/admin.json';

const dataHelper = require('/adm/js-helpers/dataHelper.js')

$(document).ready(function () {
    if ($('#models').length) {
        let columns = [
            {name: "sort", width: "1%", className: "table-text-align-center", visible:false},
            {name: "id", className: "table-text-align-center", width: "5%"},
            {name: "sorting", className: "table-text-align-center order", width: "5%"},
            {name: "name"},
            {name: "text"},
            {name: "actions", className: "table-text-align-center", width: "10%"},
        ];
        let url = `${language}/admin-menu/api/stories`;
        let data = {};
        let blocks = dataHelper.getDatatable(columns, url, data, true)
        dataHelper.rowReorder(blocks, `${language}/admin-menu/api/stories/sorting`)
    }


    $('body').on('click', '.delete', function (e) {
        e.preventDefault()
        dataHelper.deleteItem(translates, `${language}/admin-menu/api/stories/delete/${$(this).attr('data-model')}`, null)
    })
});
