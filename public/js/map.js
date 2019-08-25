function initMap() {
	var amesbury = { lat: 42.8557284, lng: -70.964707 };

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 13,
		center: amesbury
	});

	var marker = new google.maps.Marker({
		position: amesbury,
		map: map
	});
}
