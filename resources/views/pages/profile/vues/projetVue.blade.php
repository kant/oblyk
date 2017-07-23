@inject('Helpers','App\Lib\HelpersTemplates')

<div class="row">
    <div class="col s12">
        <div class="card-panel blue-card-panel">
            <h2 class="loved-king-font titre-profile-boite-vue">Mes projets</h2>

            <div class="blue-border-zone tickliste-zone">
                @foreach($crags as $key => $crag)

                    <div class="blue-border-div">

                        <div class="row">
                            @if($crag[0]->route->crag->bandeau == '/img/default-crag-bandeau.jpg')
                                <img class="img-tick-list circle left" src="/img/default-crag-bandeau.jpg" height="40" width="40">
                            @else
                                <img class="img-tick-list circle left" src="/storage/photos/crags/50/{{$crag[0]->route->crag->bandeau}}">
                            @endif
                            <p class="no-margin">
                                <strong><a href="{{route('cragPage',['crag_id'=>$crag[0]->route->crag->id,'crag_label'=>str_slug($crag[0]->route->crag->label)])}}">{{$crag[0]->route->crag->label}}</a><br></strong>
                                <span class="grey-text">{{$crag[0]->route->crag->region}}, {{$crag[0]->route->crag->city}} , ({{$crag[0]->route->crag->code_country}})</span>
                            </p>
                        </div>

                        <div class="liste-tick-ticklist">
                            @foreach($crag as $cross)
                                <p class="no-margin">
                                    <span class="text-cursor button-open-route" onclick="loadRoute({{$cross->route->id}})">
                                        <img src="/img/climb-{{$cross->route->climb_id}}.png" height="10">
                                        <strong>
                                            @if(count($cross->route->routeSections) == 1)
                                                <span class="color-grade-{{$cross->route->routeSections[0]->grade_val}}">{{$cross->route->routeSections[0]->grade}}{{$cross->route->routeSections[0]->sub_grade}}</span>
                                            @else
                                                {{count($cross->route->routeSections)}}L.
                                            @endif
                                        </strong>
                                        {{$cross->route->label}}
                                    </span>
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>