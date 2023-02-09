<script>
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(savePosition);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  function savePosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    // Send the location data to the server
    sendDataToServer(latitude, longitude);
  }

  function sendDataToServer(latitude, longitude) {
    // Create an XMLHttpRequest object to send the data to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_location.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Send the data
    xhr.send("latitude=" + latitude + "&longitude=" + longitude);
  }
</script>

<button onclick="getLocation()">Get Location</button>

<!-- In this example, the getLocation function is triggered when the user clicks the "Get Location" button. The getCurrentPosition method retrieves the user's current location and passes it to the savePosition function. The savePosition function then sends the location data to the server using an XMLHttpRequest (also known as XHR).
