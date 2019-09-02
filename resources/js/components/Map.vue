<template>
    <div>
       <div class="col-md-12">
                  <input type="text" class="form-control input-lg" placeholder="Enter Place Name" v-model="place">
                </div>
                 <div class="col-md-6"><h3> Latitude : {{ latitude }}</h3></div>
                <div class="col-md-6"><h3> Longitude : {{ longitude }}</h3></div>
                <div class="col-md-12"  v-bind:class="{ 'not-visible' : active }" >

                     <iframe frameborder="0" style="width: 100%; height: 350px; border:0" v-bind:src="'https://maps.googleapis.com/maps/api/js?key=AIzaSyBqpYHZfS-tEdNHj97GXsOuw2EdlOAqsDc&q='+ place" allowfullscreen></iframe>
                </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
    place: '',
    latitude: '',
    longitude: '',
    active : true
        }
    },

    watch: {
    place: function() {
      this.latitude = '';
      this.longitude = '';
      this.active = true;
      if (this.place.length >= 3) {
        this.active = false;
        this.lookupCoordinates();
      }
    }
  },
  methods: {
    lookupCoordinates: _.debounce(function() {
      var app = this;
      app.latitude = "Searching...";
      app.longitude = "Searching...";
      axios.get('https://maps.googleapis.com/maps/api/geocode/json?address=' + app.place)
            .then(function (response) {
              app.latitude = response.data.results[0].geometry.location.lat;
              app.longitude = response.data.results[0].geometry.location.lng;
            })
            .catch(function (error) {
              app.latitude = "Invalid place";
              app.longitude = "Invalid place";
            })
    }, 500)
  }
}
</script>