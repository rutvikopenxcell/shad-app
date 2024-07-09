@extends('layouts.app')

@section('content')
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .invalid-feedback {
        display: block !important;
    }

    body {
        font-family: Arial, sans-serif;
        /* display: flex; */
        background: linear-gradient(to right, #ff7e5f, #03c03c);
    }

    .login-container {
        margin: auto;
        background: linear-gradient(to right, #43cea2, #185a9d);
        padding: 2rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 50%;
    }

    .profile-img {
        margin-bottom: 1.5rem;
        height: 120px !important;
    }

    .input-group {
        margin-bottom: 1rem;
    }

    .input-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #000000;
        font-family: Arial, Helvetica, sans-serif;
    }

    .input-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        width: 100%;
        padding: 0.75rem;
        border: none;
        background-color: #007bff;
        color: white;
        font-size: 1rem;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    #map {
        height: 100%;
    }

    .error-message {
        color: red;
        text-align: center;
        margin-top: 1rem;
        display: none;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .login-container {
            padding: 1.5rem;
        }
    }
</style>
<br><br><br><br>
<div class="login-container">


    <form method="POST" action="{{ route('profile-update') }}" id="loginForm">
        @csrf
        <div id="map"></div>
        <div id="infowindow-content">
            <span id="place-name" class="title"></span><br />
            <span id="place-id"></span><br />
            <span id="place-address"></span>
        </div>
        <div style="text-align: center;">
            <img class="profile-img" src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" height="120px" alt="hjh">
        </div>
        <div class="input-group">
            <label for="username">Name</label>
            <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{$auth_user->name}}" required autocomplete="email" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group">
            <label for="password">First Name</label>
            <input id="first_name" type="text" class="@error('first_name') is-invalid @enderror" name="first_name" required autocomplete="current-password">
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group">
            <label for="password">Address</label>
            <input id="pac-input" type="text" class="@error('address') is-invalid @enderror" name="address" required>
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit">Update</button>
        <p id="errorMessage" class="error-message"></p>
    </form>
</div>
<br>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClVfKA37qhmxi8l_RR4wq6JuUGlpRYpBw&callback=initMap&libraries=places&v=weekly" defer></script>

<script>
  // This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13,
  });
  const input = document.getElementById("pac-input");
  // Specify just the place data fields that you need.
  const autocomplete = new google.maps.places.Autocomplete(input, {
    fields: ["place_id", "geometry", "name", "formatted_address"],
  });

  autocomplete.bindTo("bounds", map);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  const infowindow = new google.maps.InfoWindow();
  const infowindowContent = document.getElementById("infowindow-content");

  infowindow.setContent(infowindowContent);

  const geocoder = new google.maps.Geocoder();
  const marker = new google.maps.Marker({ map: map });

  marker.addListener("click", () => {
    infowindow.open(map, marker);
  });
  autocomplete.addListener("place_changed", () => {
    infowindow.close();

    const place = autocomplete.getPlace();

    if (!place.place_id) {
      return;
    }

    geocoder
      .geocode({ placeId: place.place_id })
      .then(({ results }) => {
        console.log('result',results)
        map.setZoom(11);
        map.setCenter(results[0].geometry.location);
        // Set the position of the marker using the place ID and location.
        // @ts-ignore TODO This should be in @typings/googlemaps.
        marker.setPlace({
          placeId: place.place_id,
          location: results[0].geometry.location,
        });
        marker.setVisible(true);
        infowindowContent.children["place-name"].textContent = place.name;
        infowindowContent.children["place-id"].textContent = place.place_id;
        infowindowContent.children["place-address"].textContent =
          results[0].formatted_address;
        infowindow.open(map, marker);
      })
      .catch((e) => window.alert("Geocoder failed due to: " + e));
  });
}

window.initMap = initMap;
</script>
@endsection