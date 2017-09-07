@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Agenda</div>
                <div class="panel-body">

                  <div id="app">
                  <label>Zoek:</label>
                  <input type="text" placeholder="Zoek..." v-model="text"><br>


                  <!-- Respons API -->
                  <span><pre>@{{responseAPI}}</pre></span>


                  </div>


                  <div id="test">
                    <Profile :inline="true"></Profile>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
   var app = new Vue({
     el: '#app',
     data: {
       text: '',
       responseAPI: ''
     },
     created: function () {
       this.getpatients()
     },
     watch: {
       text: function() {
         if (this.text.length > 4) {
           this.getpatients()
         }
       }
    },
     methods: {
       getpatients: _.debounce(function() {
         var app = this
         app.responseAPI = "Searching..."
         axios.get('/patientlistAPI', {
                  params: {
                  }
                })
               .then(function (response) {
                 app.responseAPI = response.data
               })
               .catch(function (error) {
                 app.responseAPI = "ERROR" + error
               })
       }, 500)
     }
   })



 </script> -->
@endsection
