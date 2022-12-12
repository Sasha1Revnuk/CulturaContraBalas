const sweetAlertHelper = require('/adm/js-helpers/sweetAlertHelper.js')

$(document).ready(function () {
    $('.input-phone').inputmask({"mask": "+38(999) 999-9999"});
    $('.input-email').inputmask({"alias": "email"});


    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        }
    });
    $('input[required]').prev('label').addClass('requiredInput');
    $('textarea[required]').prev('label').addClass('requiredInput');
    $('input[required]').closest('div').prev('label').addClass('requiredInput');
    $('input[name="changeMode"]').click(function () {
        $.ajax({
            type: 'POST',
            url: language + '/admin-menu/api/settings/set-mode',
            headers: authHeaders,
            data: {
                'mode': $(this).val()
            }
        }).then(function (result) {
            location.reload();
        })
    });
    if ($('body').data("sweetalert-type")) {
        sweetAlertHelper.callCenterInfoSweetAlert($('body').data("sweetalert-title"), $('body').data("sweetalert-type"), $('body').data("sweetalert-message"))
    }


    $.each($('.tinyMCE'), function (index, elem) {
        let tinyMCEImage = {}
        if (typeof $(elem).data('image') !== 'undefined') {
            tinyMCEImage = {
                images_upload_handler: function (blobInfo, success, failure) {
                    var xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '/admin-menu/upload-images');
                    var token = $('meta[name=csrf-token]').attr('content');
                    xhr.setRequestHeader("X-CSRF-Token", token);
                    xhr.onload = function () {
                        var json;
                        if (xhr.status != 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        success(json.location);
                    };
                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                },
                file_picker_callback: function (cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function () {
                        var file = this.files[0];
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var blobInfo = blobCache.create(id, file);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                    input.click();
                }
            }

        }
        tinymce.init({
            document_base_url: process.env.MIX_APP_URL,
            relative_urls: false,
            remove_script_host: false,
            selector: `#${$(elem).attr('id')}`,
            height: 300,
            plugins: [
                'advlist',
                'autolink',
                'lists',
                'link',
                'image',
                'charmap',
                'print',
                'preview',
                'anchor',
                'searchreplace',
                'visualblocks',
                'code',
                'fullscreen',
                'insertdatetime',
                'media',
                'table',
                'contextmenu',
                'paste',
                'imagetools'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
            ...tinyMCEImage
        });
    })


})
