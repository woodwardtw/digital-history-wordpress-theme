var lat = randomIntFromInterval(0,60);
var long = randomIntFromInterval(-40,60);

var mymap = L.map('header-image').setView([lat, long], 6);



L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidHd3b29kd2FyZCIsImEiOiJoamhEM2ZrIn0.VRCAedsVTQ-qdtPz8ue-5w', {
	minZoom: 7,
	maxZoom: 7,
	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
		'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="http://mapbox.com">Mapbox</a>',
	id: 'mapbox.streets'
}).addTo(mymap);

var div = L.DomUtil.get('header-image');
if (!L.Browser.touch) {
    L.DomEvent.disableClickPropagation(div);
    L.DomEvent.on(div, 'mousewheel', L.DomEvent.stopPropagation);
} else {
    L.DomEvent.on(div, 'click', L.DomEvent.stopPropagation);
}

function randomIntFromInterval(min,max)
                {
                    return Math.floor(Math.random()*(max-min+1)+min);
                }

