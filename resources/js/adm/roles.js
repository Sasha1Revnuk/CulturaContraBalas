import translates from '/adm/lang/admin.json';

const dataHelper = require('/adm/js-helpers/dataHelper.js')

$(document).ready(function () {
    if ($('#models').length) {
        let columns = [
            {name: "title", width: "90%"},
            {name: "actions", className: "table-text-align-center", width: "10%"},
        ];
        let url = `${language}/admin-menu/api/roles`;
        let data = {
            search: function to() {
                return $('#search').val();
            },
        };
        let blocks = dataHelper.getDatatable(columns, url, data, false)

        $('.keyup').keyup(function () {
            $('#models').DataTable().ajax.reload()
        })

    }


    $('body').on('click', '.delete', function (e) {
        e.preventDefault()
        dataHelper.deleteItem(translates, `${language}/admin-menu/api/roles/delete/${$(this).attr('data-role')}`, $(this).attr('data-href'))
    })
});

