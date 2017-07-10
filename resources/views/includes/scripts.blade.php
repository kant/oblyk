{{--Materialize--}}
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

{{--Ficher Js commun à toutes les pages--}}
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/js/popup.js"></script>
<script type="text/javascript" src="/js/route.js"></script>
<script type="text/javascript" src="/js/router.js"></script>
<script type="text/javascript" src="/js/global-search.js"></script>
<script type="text/javascript" src="/framework/axios/axios.min.js"></script>
<script src="/framework/marked/marked.min.js"></script>

<script type="text/javascript">
    {{--initialisation du paralax--}}
    $(document).ready(function(){

        $('.parallax').parallax();

        $(".button-open-global-search").sideNav({
            menuWidth: 400,
            edge: 'right',
            closeOnClick: false,
            draggable: false
        });
    });
</script>

{{--inclusion de script particulier à une page--}}
@yield('script')
