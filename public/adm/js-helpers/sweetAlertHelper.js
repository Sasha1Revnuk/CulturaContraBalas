export function callCenterInfoSweetAlert(title, type, text = '') {
    Swal.fire({
        title,
        icon: type,
        text,
        position: 'center',

    })
}

export function callCenterQuestionSweetAlert(title, text, confirmButtonText, cancelButtonText, callBackSuccess, callBackFalse) {
    Swal.fire({
        title,
        text,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText,
        cancelButtonText,
    }).then((result) => {
        if (result.value) {
            if (callBackSuccess) {
                callBackSuccess()
            }
        } else {
            if (callBackSuccess) {
                callBackFalse()
            }
        }
    })
}
