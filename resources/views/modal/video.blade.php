@inject('Inputs','App\Lib\InputTemplates')

{!! $Inputs::popupTitle(['title'=>$dataModal['title']]) !!}

<form class="submit-form" data-route="{{ $dataModal['route'] }}" onsubmit="submitData(this, {{ $dataModal['callback'] }}); return false">

    {!! $Inputs::popupError() !!}

    <div class="row">
        {!! $Inputs::text(['name'=>'iframe', 'value'=>$dataModal['iframe'], 'label'=>trans('modals/video.url'), 'type'=>'text']) !!}
        {!! $Inputs::mdText(['name'=>'description', 'value'=>$dataModal['description'], 'label'=>trans('modals/globalLabel.description')]) !!}
        {!! $Inputs::Submit(['label'=>trans('modals/globalLabel.submit')]) !!}
    </div>

    {!! $Inputs::Hidden(['name'=>'_method','value'=>$dataModal['method']]) !!}
    {!! $Inputs::Hidden(['name'=>'id','value'=>$dataModal['id']]) !!}
    {!! $Inputs::Hidden(['name'=>'viewable_type','value'=>$dataModal['viewable_type']]) !!}
    {!! $Inputs::Hidden(['name'=>'viewable_id','value'=>$dataModal['viewable_id']]) !!}
</form>
