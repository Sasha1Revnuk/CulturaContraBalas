<div class="modal fade" id="loaderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="display: flex; align-items: center">
                <div class="spinner-border text-success m-1" role="status">
                    <span class="sr-only"></span>
                </div>
                <span id="loaderModalText" style="margin-left: 15px">{{isset($text) ? $text : ''}}</span>
            </div>

        </div>
    </div>
</div>