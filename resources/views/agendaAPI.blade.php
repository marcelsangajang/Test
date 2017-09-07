@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Agenda</div>
                <div class="panel-body">

                  <div id="agenda">
                  <label>Date</label>
                  <input type="date" placeholder="Date" v-model="date"><br>
                  <label>ID</label>
                  <input type="text" placeholder="ID" v-model="ID"><br>
                  <label>option</label>
                  <select v-model="option">
                    <option name="chair">chair</option>
                    <option name="employee">employee</option>
                  </select>

                  <!-- Respons API -->
                  <span><pre>@{{responseAPI}}</pre></span>
                  </div>

                  <div id="app">
                    <example></example>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
   var app = new Vue({
     el: '#agenda',
     data: {
       ID: '',
       date: '',
       option: '',
       responseAPI: ''
     },
     watch: {
       option: function() {
         if (this.option.length > 0 & this.ID != '' &  this.date != '') {
           this.getAgendaData()
         }
       }
    },
     methods: {
       getAgendaData: _.debounce(function() {
         var app = this
         app.responseAPI = "Searching..."
         axios.get('/AgendaTimeBlocksAPI', {
                  params: {
                  chair:  this.ID,
                  date:   this.date,
                  option: this.option
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



 </script>
@endsection
