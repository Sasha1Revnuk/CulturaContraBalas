import translates from '/adm/lang/admin.json';

const sweetAlertHelper = require('/adm/js-helpers/sweetAlertHelper.js')

$(document).ready(function () {

    $('body').on('click', '.programPhotosShow', function () {
        fetchData()
    })

    $('body').on('click', '.paginationProgramImage li.page-item a.page-link', function (e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        fetchData(page);
    })

    $('body').on('click', '.downloadProgramPhoto', function () {

        window.open(`${language}/admin-menu/program-photos/download/${$(this).attr('data-image')}`, '_blank');

    })

    $('body').on('click', '.copyPathProgramPhoto', function () {
        $(this).html(`<div class="spinner-border text-white m-1" style="width: 10px !important; height: 10px !important;" role="status">
                                                <span class="sr-only">...</span>
                                            </div>`)
        let imgUrl = $(this).attr('data-image');
        navigator.clipboard.writeText(imgUrl);
        let button = $(this);
        setTimeout(function () {
            button.html(`<i class="mdi mdi-content-copy d-block"></i>`)

        }, 500)
    })

    $('body').on('click', '.deleteProgramPhoto', function () {
        let imageId = $(this).attr('data-image');
        sweetAlertHelper.callCenterQuestionSweetAlert(translates[lang]['areYouSure'], '', translates[lang]['yesDelete'], translates[lang]['cancelDelete'], function () {
            $.ajax({
                type: 'DELETE',
                url: `${language}/admin-menu/api/program-photos/delete/${imageId}`,
                headers: authHeaders,
            }).then((result) => {
                fetchData()
            })
        }, function () {

        })
    })
});

function fetchData(page = 1) {
    $.ajax({
        type: 'GET',
        url: `${language}/admin-menu/api/program-photos/index?page=${page}`,
        headers: authHeaders,
    }).then((result) => {
        $('.programPhotoContainer').html(result)
        if ($('#programPhotos').is(':visible') == false) {
            $('#programPhotos').modal('show')

        }
    })
}
