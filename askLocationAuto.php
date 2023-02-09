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

  // Automatically get the location when the page loads
  window.onload = getLocation;
</script>
<!-- Just edited the last line, everything else is same
