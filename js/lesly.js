// Branchement de l'événement CLICK sur le bouton
document.getElementById('calc').addEventListener('click', function () {
    // Teste si le navigateur est compatible avec la géolocalisation
    if (navigator.geolocation) {
        // Demande la localisation au GPS
        document.getElementById('myRoute').innerHTML = '';
        navigator.geolocation.getCurrentPosition(success, failure);
    } else {
        alert('Géolocalisation non supportée sur ce navigateur');
    }
}, false);

// Fonction de rappel (Callback Function) appelée si succès géolocalisation
// https://developers.google.com/maps/documentation/javascript/tutorial
function success(pos) {
    // Récupère les adresses de départ et d'arrivée
    let start = document.getElementById('start').value;
    let end = document.getElementById('end').value;
    let point = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);

    // Définit les options d'affichage de la carte
    let options = {
        center: point,
        zoom: 16,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.TERRAIN // HYBRID, SATELLITE ou ROADMAP
    };

    // Affiche la carte 
    let myMap = new google.maps.Map(document.getElementById('myMap'), options);

    // Définit le trajet
    let travel = {
        origin: start ? start : point,
        destination: end,
        travelMode: google.maps.DirectionsTravelMode.DRIVING // BICYCLING, TRANSIT ou WALKING
    }

    // Affiche l'itinéraire à suivre
    let service = new google.maps.DirectionsService();
    let display = new google.maps.DirectionsRenderer();
    display.setMap(myMap);
    display.setPanel(document.getElementById('myRoute'));
    service.route(travel, function (result, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            display.setDirections(result);
        } else {
            document.getElementById('myRoute').textContent = 'Aucun trajet disponible !';
        }
    });
}

// Fonction de rappel (Callback Function) appelée si échec géolocalisation
function failure(err) {
    // Selon le dode erreur, renvoie le message correspondant
    switch (err.code) {
        case err.PERMISSION_DENIED:
            alert('Permission refusée');
            break;
        case err.POSITION_UNAVAILABLE:
            alert('Emplacement non trouvé');
            break;
        case err.TIMEOUT:
            alert('Délai dépassé');
            break;
        case err.UNKNOWN_ERROR:
            alert('Erreur inconnue');
            break;
        default:
            alert('Erreur non définie');
    }
}