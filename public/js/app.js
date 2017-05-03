var sMDE;

//initialisation des composants pour materialize
$(".button-collapse").sideNav();
$('.modal').modal();

//on blanchie la barre de navigation au scroll
var backgroundNav = function () {
    let nav_barre = document.getElementById('nav_barre');

    if(window.pageYOffset > 0){
        nav_barre.setAttribute('class', nav_barre.className.replace('nav-white','nav-black'));
    }else{
        nav_barre.setAttribute('class', nav_barre.className.replace('nav-black','nav-white'));
    }
};

//changement de la couleur du fond de la nav bar au scroll
window.addEventListener('scroll', backgroundNav);


//INITIALISATION ET STYLE DES DROP DOWN DU MENU
$('.nav-dropdown').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: false, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: true, // Displays dropdown below the button
        alignment: 'left', // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
    }
);


//FONCTION D'OUVERUTRE DES MODALES PERMETTANTS L'ÉDITION DU CONTENUE DES TABLES
function openModal(route, data) {

    let loadModal = document.getElementById('load-modal'),
        contentModal = document.getElementById('modal-content');

    //on montre le loader et cache le contenu
    loadModal.style.display = 'block';
    contentModal.style.display = 'none';

    //on change les ' par des " pour pouvoir parser en JSON
    data = JSON.parse(data.replace(/[']/g,'"'));

    //requête ajax
    axios.post(route, data).then(function (response) {

        contentModal.innerHTML = response.data;

        //création des simpleMDE s'il y en a
        //simpleMdeCreator();
        
        //on cache le loader et on montre le contenu
        loadModal.style.display = 'none';
        contentModal.style.display = 'block';
    });
}

window.onload = function () {
  let btnModal = document.getElementsByClassName('btnModal');

  for(let i = 0 ; i < btnModal.length ; i++){

      let route = btnModal[i].getAttribute('data-route'),
          data = btnModal[i].getAttribute('data-modal');

      btnModal[i].addEventListener('click', function() {openModal(route, data);});
  }
};

//fonction d'initialisation des simpleMDE
function simpleMdeCreator() {
    // let smde = document.getElementById('simplemde_id');
    //
    // if(typeof smde != "undefined"){
    //     sMDE = new SimpleMDE(
    //         {
    //             element : smde
    //         }
    //     );
    // }
}

function submitData(route, callback) {
    let inputData = document.getElementsByClassName('input-data'),
        data = {};

    //créer un talbeau JSON des données à passer en paramètre
    for(let i in inputData){
        console.log(inputData[i]);
        data[inputData[i].name] = inputData[i].value;
    }

    //lance la fonction post
    axios.post(route,data).then(function (response) {
        callback();
    });
    console.log(data);
}

function refresh() {
    window.location.reload();
}