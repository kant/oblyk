@inject('Helpers','App\Lib\HelpersTemplates')

<div class="row">
    <div class="col s12">
        <div class="card-panel blue-card-panel">

            <h2 class="loved-king-font titre-profile-boite-vue">Mes albums</h2>

            <div class="blue-border-zone row">
                @foreach($user->albums as $album)
                    <div class="blue-border-div col s12">
                        <div class="col-echantillon-album">
                            @php($nPhoto = 0)
                            @foreach($album->photos as $photo)
                                @php($nPhoto++)
                                @if($nPhoto <= 3)
                                    <img class="z-depth-2" src="/storage/photos/crags/100/{{$photo->slug_label}}" alt="">
                                @endif
                            @endforeach
                        </div>
                        <div class="col-information-album">
                            <p class="no-margin">
                                <strong class="text-cursor" onclick="openAlbum('{{route('vuePhotosUser',['profile_id'=>$album->user_id,'album_id'=>$album->id])}}')">{{$album->label}}</strong><br>
                                {{$album->description}}<br>
                                <span class="grey-text">{{count($album->photos)}} photos</span>
                            </p>
                            <p class="info-user grey-text">
                                @if(Auth::check())
                                    <i {!! $Helpers::tooltip('Signaler un problème') !!} {!! $Helpers::modal(route('problemModal'), ["id"=>$album->id, "model"=>"Album"]) !!} class="material-icons tiny-btn right tooltipped btnModal">flag</i>
                                    @if($album->user_id == Auth::id())
                                        <i {!! $Helpers::tooltip('Modifier cet album') !!} {!! $Helpers::modal(route('albumModal'), ["album_id"=>$album->id, "title"=>"Modifier un album", "method"=>"PUT", "callback"=>"reloadCurrentVue"]) !!} class="material-icons tiny-btn right tooltipped btnModal">edit</i>
                                        <i {!! $Helpers::tooltip('Supprimer cet album') !!} {!! $Helpers::modal(route('deleteModal'), ["route"=>"/albums/" . $album->id ]) !!} class="material-icons tiny-btn right tooltipped btnModal">delete</i>
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>