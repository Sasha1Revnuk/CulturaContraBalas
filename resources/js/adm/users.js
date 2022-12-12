import translates from '/adm/lang/admin.json';

const dataHelper = require('/adm/js-helpers/dataHelper.js')

$(document).ready(function () {
    if ($('#models').length) {
        let columns = [
            {name: "id", width: "5%"},
            {name: "pip", width: "45%"},
            {name: "email", width: "10%"},
            {name: "phone", width: "10%"},
            {name: "roles", width: "10%"},
            {name: "permissions", width: "10%"},
            {name: "actions", className: "table-text-align-center", width: "10%"},
        ];
        let url = `${language}/admin-menu/api/users`;
        let data = {
            search: function to() {
                return $('#search').val();
            },
            role: function to() {
                return $('#roleSelect').val();
            },
            permission: function to() {
                return $('#permissionSelect').val();
            },
        };
        let blocks = dataHelper.getDatatable(columns, url, data, false)

        $('.keyup').keyup(function () {
            $('#models').DataTable().ajax.reload()
        })

        $('.change').change(function () {
            $('#models').DataTable().ajax.reload()
        })

    }


    $('body').on('click', '.delete', function (e) {
        e.preventDefault()
        dataHelper.deleteItem(translates, `${language}/admin-menu/api/users/delete/${$(this).attr('data-user')}`)
    })
});


