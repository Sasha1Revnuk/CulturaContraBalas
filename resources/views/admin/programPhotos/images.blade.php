<div class="row">
    @foreach($programImages as $image)
        <div class="col-md-3">
            <x-admin.card :withHeader="false" :withFooter="false"
                          class="p-0 border {{$image['ifUsed'] ? 'border-danger' : ''  }} shadow-none ">
                <x-slot name="body" class="p-1">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <a href="{{url($image['path'])}}" target="_blank" class="d-flex justify-content-center">
                                <img class="img-thumbnail" id="img-{{$image['id']}}" src="{{url($image['thumbnail'])}}"
                                     data-holder-rendered="true">
                            </a>
                        </div>
                        <div class="col-md-12">
                            <div class="btn-group d-flex justify-content-center" role="group">
                                <x-admin.button
                                    type="button"
                                    class="btn-success me-1 downloadProgramPhoto"
                                    :customAttributes="[
                                                    'data-image' => $image['id']
                                                ]">
                                    <i class="mdi mdi-download d-block"></i>
                                </x-admin.button>
                                <x-admin.button
                                    type="button"
                                    class="btn-warning me-1 copyPathProgramPhoto"
                                    :customAttributes="[
                                                    'data-image' => url($image['path'])
                                                ]">
                                    <i class="mdi mdi-content-copy d-block"></i>
                                </x-admin.button>
                                <x-admin.button
                                    type="button"
                                    class="btn-danger deleteProgramPhoto"
                                    :customAttributes="[
                                        'data-image' => $image['id']
                                    ]">
                                    <i class="bx bx-trash d-block"></i>
                                </x-admin.button>
                            </div>
                        </div>
                    </div>


                </x-slot>
            </x-admin.card>


        </div>

    @endforeach
</div>
<div class="row">
    <div class="col-md-12">
        {!! $links !!}
    </div>
</div>
