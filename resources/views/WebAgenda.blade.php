@extends('layouts.app')

@section('content')
<html>
<!--drag en drop code:   
https://codepen.io/safx/pen/dasnt
http://sagalbot.github.io/vue-sortable/
-->
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
  <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
  <script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://cdn.rawgit.com/chrisvfritz/5f0a639590d6e648933416f90ba7ae4e/raw/974aa47f8f9c5361c5233bd56be37db8ed765a09/currency-validator.js"></script>
</head>

<body>

<div id="root">
  <parkingpanel></parkingpanel>
  <br>Input velden parkeerpanel (Tijdelijk om te testen) <br>
  <testcomponent></testcomponent>

  <br>
  <schedule></schedule>

</div>

<script>
var eventBus = new Vue();

Vue.component('schedule', {
  template:
  '\
    <div class="container">\
      <div class="row">\
        <div class="col-md-8 col-md-offset-2">\
          <div class="panel panel-default">\
            <div class="panel-heading">Rooster</div>\
              <div class="panel-body">\
                <br>\
                Tijd       Naam        Type\
                <div v-for="(entry, index) in schedule" style="border: 1px solid black" >\
                  @{{entry.time}} <a href="/Marcel1"> @{{entry.firstName}} @{{entry.lastName}} </a> @{{entry.type}}\
                </div>\
                \
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
  ',

  data: function() {
    return {
      ID: '',
      date: '',
      option: '',
      responseAPI: '',
      schedule: []
    }
  },
   
  created: function() {
    entry1 = {
      status: 1,
      time: '09:00:00',
      id: 1,
      firstName: 'Marcel',
      lastName: 'Sang-Ajang',
      type: 'controle'
    },
    entry2 = {
      status: 1,
      time: '09:05:00',
      id: 1,
      firstName: 'Marcel',
      lastName: 'Sang-Ajang',
      type: 'controle'
    },
    entry3 = {
      status: 1,
      time: '09:10:00',
      id: 1,
      firstName: 'Marcel',
      lastName: 'Sang-Ajang',
      type: 'controle'
    },
    entry4 = {
      status: 1,
      time: '09:15:00',
      id: 1,
      firstName: 'Marcel',
      lastName: 'Sang-Ajang',
      type: 'controle'
    },
    entry5 = {
      status: 1,
      time: '09:20:00',
      id: 1,
      firstName: 'Marcel',
      lastName: 'Sang-Ajang',
      type: 'controle'
    },
    entry6 = {
      status: 1,
      time: '09:25:00',
      id: 1,
      firstName: 'Marcel',
      lastName: 'Sang-Ajang',
      type: 'controle'
    },
    entry7 = {
      status: 1,
      time: '09:30:00',
      id: 1,
      firstName: 'Marcel',
      lastName: 'Sang-Ajang',
      type: 'controle'
    }
    this.schedule.push(entry1)
    this.schedule.push(entry2)
    this.schedule.push(entry3)
    this.schedule.push(entry4)
    this.schedule.push(entry5)
    this.schedule.push(entry6)
    this.schedule.push(entry7)
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

Vue.component('parkingpanel', {
  template: 
  '\
    <div class="container">\
      <div class="row">\
        <div class="col-md-8 col-md-offset-2">\
          <div class="panel panel-default">\
            <div class="panel-heading">Parkeer panel</div>\
              <div class="panel-body">\
              \
                <br>\
                ID Naam\
                <div v-for="(patient, index) in parkingList">\
                  @{{patient.id}} @{{patient.firstName}} @{{patient.lastName}}\
                  <button v-on:click="createNextAppointment(patient.id)" title="Vervolg afspraak">V</button>\
                  <button v-on:click="remove(index)" title="Verwijder uit parkeerpanel">X</button>\
                </div>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
  ',

  data: function() {
    return {
      parkingList: []
    }
  },
   
  created: function() {
      eventBus.$on('parkingpanel-addpatient', function (patient) {
          this.addPatient(Vue.util.extend({}, patient))
      }.bind(this))
      
    },

  methods: {
    addPatient: function(patient){
      this.parkingList.push(patient)
    },
    createNextAppointment: function(patientId){
      console.log(patientId)
    },
    remove: function(index){
      this.parkingList.splice(index, 1)
    }
  }
});

Vue.component('testcomponent', {
  template: '\
    <div>\
    <input type="number" v-model="patient.id" placeholder="id">\
    <input type="text" v-model="patient.firstName" placeholder="First name">\
    <input type="text" v-model="patient.lastName" placeholder="Last name">\
    <button v-on:click=addPatient>Add patient</button>\
    </div>\
  ',

  data: function() {
    return {
      patient: {
        firstName: '',
        lastName: '',
        id: '',
      }
    }
  },
  methods: {
    addPatient: function() {
      eventBus.$emit('parkingpanel-addpatient', this.patient);
      console.log('add patient in testcomponent:' + this.patient.firstName)
    }
  }
});

var vm = new Vue({
  el: '#root'
});

// This is the event hub we'll use in every
// component to communicate between them.

</script>



</body>
</html>



@endsection