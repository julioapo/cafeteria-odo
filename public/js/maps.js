function initMap() {
  const myLatLng = {
    lat: -34.892692,
    lng: -56.150621
  };
  const map = new google.maps.Map(document.getElementById("ourmaps"), {
    zoom: 16,
    center: myLatLng,
    /* fullscreenControl: true,
    zoomControl: true,
    streetViewControl: false */
  });
  const image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Cafeteria Instituto Higiene!",
    icon: image
  });
}