$(document).ready(function () {
    $(".input-mask").inputmask()
    $('.roleInput').change(function () {
        if ($(this).is(':checked')) {
            $(`.${$(this).val().replace(' ', '')}`).prop('checked', true)
        } else {
            $(`.${$(this).val().replace(' ', '')}`).prop('checked', false)

        }
    })
});
