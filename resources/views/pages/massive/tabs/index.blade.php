<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <h1 class="loved-king-font titre-1-massive">{{$massive->label}}</h1>

            <p>
                {{$massive->label}} regroupe {{$massive->crags_count}} sites d'escalade de {{implode(', ', $regions)}}.
            </p>

            @if(Auth::check())
                <div class="text-right ligne-btn">
                    <i {!! $Helpers::tooltip('Modifier les informations') !!} {!! $Helpers::modal(route('massiveModal'), ["massive_id"=>$massive->id, "title"=>"Modifier ce regroupement", "method" => "PUT"]) !!} class="material-icons tooltipped btnModal">edit</i>
                </div>
            @endif

            <h2 class="loved-king-font titre-2-massive">Description des grimpeurs</h2>

            <div class="blue-border-zone">
                @foreach ($massive->descriptions as $description)
                    <div class="blue-border-div">
                        <div class="markdownZone">{{ $description->description }}</div>
                        <p class="info-user grey-text">
                            par {{$description->user->name}} le {{$description->created_at->format('d M Y')}}

                            @if(Auth::check())
                                <i {!! $Helpers::tooltip('Signaler un problème') !!} {!! $Helpers::modal(route('problemModal'), ["id" => $description->id , "model"=> "Description"]) !!} class="material-icons tiny-btn right tooltipped btnModal">flag</i>
                                @if($description->user_id == Auth::id())
                                    <i {!! $Helpers::tooltip('Modifier cette déscription') !!} {!! $Helpers::modal(route('descriptionModal'), ["descriptive_id"=>$massive->id, "descriptive_type"=>"Massive", "description_id"=>$description->id, "title"=>"Modifier la description", "method" => "PUT"]) !!} class="material-icons tiny-btn right tooltipped btnModal">edit</i>
                                    <i {!! $Helpers::tooltip('Supprimer cette déscription') !!} {!! $Helpers::modal(route('deleteModal'), ["route" => "/descriptions/".$description->id]) !!} class="material-icons tiny-btn right tooltipped btnModal">delete</i>
                                @endif
                            @endif
                        </p>
                    </div>
                @endforeach

                @if(count($massive->descriptions) == 0)
                    <p class="grey-text text-center">Il n'y a aucune description postée par des grimpeurs</p>
                @endif

                {{--BOUTON POUR AJOUTER UNE DESCRIPTION--}}
                @if(Auth::check())
                    <div class="text-right">
                        <a {!! $Helpers::tooltip('Rédiger un déscription') !!} {!! $Helpers::modal(route('descriptionModal'), ["descriptive_id"=>$massive->id, "descriptive_type"=>"Massive", "description_id"=>"", "title"=>"Ajouter une description", "method"=>"POST"]) !!} id="description-btn-modal"  class="btn-floating btn waves-effect waves-light tooltipped btnModal"><i class="material-icons">mode_edit</i></a>
                    </div>
                @endif
            </div>

        </div>
    </div>



    <div class="col s12">
        <div class="card-panel">
            <div id="massive-map" class="massive-map">map</div>
        </div>
    </div>
</div>