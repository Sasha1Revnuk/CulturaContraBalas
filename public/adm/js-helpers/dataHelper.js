export function deleteItem(translates, url, redirectUrl, dataTableSelector = '#models')
{
    Swal.fire({
        title: translates[lang]['areYouSure'],
        text: translates[lang]['youWannaDeleteItem'],
        icon: 'question',
        showCancelButton: true,
        confirmButtonText:  translates[lang]['yesDelete'],
        cancelButtonText: translates[lang]['cancelDelete'],
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'DELETE',
                url: url,
                headers: authHeaders,
            }).then(() => {
                if($(dataTableSelector).length) {
                    $('#models').DataTable().ajax.reload()
                } else {
                    window.location.replace(redirectUrl);
                }
            })

        }
    })
}

export function getDatatable(columns, url, data, sortable= false, dataTableSelector = '#models')
{
    return $(dataTableSelector).DataTable({
        processing: true,
        autoWidth: false,
        serverSide: true,
        lengthMenu: [10, 25, 50, 100, 250,500,1000, 2000, 5000],
        searching: false,
        ordering: false,
        responsive: true,
        columns: columns,
        order: [[0, 'asc']],
        rowReorder: sortable ?
            {
                selector: 'tr td.order',
                update: false,
            } : null,
        ajax: {
            url: url,
            type: "GET",
            headers: authHeaders,
            data: data
        },
    });
}

export function rowReorder(blocks, url, dataTableSelector = '#models')
{
    blocks.on('row-reorder', function (e, diff, edit) {
        let ids = [];
        let ranges = [];
        for (var i = 0, ien = diff.length; i < ien; i++) {
            var rowData = blocks.row(diff[i].node).data();
            ids.push(rowData[1]);
            ranges.push(rowData[0]);
        }
        $.ajax({
            type: 'POST',
            url: url,
            headers: authHeaders,
            data: {
                'ids': ids,
                'ranges': ranges
            }
        }).then(()=>{
            $(dataTableSelector).DataTable().ajax.reload();
        })
    });

}