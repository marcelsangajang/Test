@extends('layouts.app')

@section('content')
<html>

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

<div id="root" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Parkeer panel</div>
                <div class="panel-body">

        
                      <parkingpanel v-bind:patient="patient"></parkingpanel>
                      <br>Testcomponent hieronder <br>
                      <testcomponent v-on:add-patient="addPatient"></testcomponent>
                </div>
            </div>
        </div>
    </div>
    @{{$data}}
</div>

<script>

Vue.component('parkingpanel', {
  template: '\
  <div>\
    <div>\
        <button v-on:click=addPatient(1)>Add Marcel</button>\
        <button v-on:click=addPatient(2)>Add Toine</button>\
    \
    </div>\
    \
    <div>\
      <br>\
      <div v-for="(patient, index) in parkingList">\
          @{{patient}}\
          <button v-on:click="createNextAppointment(patient.id)" title="Vervolg afspraak">V</button>\
          <button v-on:click="remove(index)" title="Verwijder uit parkeerpanel">X</button>\
      </div>\
    </div>\
  </div>\
  ',

   props: {
     patient: ''
   },

  data: function() {
    return {
      patient1: {
        id: '1',
        firstName: 'Marcel',
        lastName: 'Sang-Ajang'
      },
      patient2: {
        id: '2',
        name: 'Toine',
        lastName: 'Koene'
      },
      parkingList: []
    }
  },

   watch: {
     patient: function() {
       this.addPatient(this.patient);
     }
   },

      
  mounted(){// in component B's created hook
  
      this.$on('add-patient', function () {

          console.log('parkingpanel mounted function');
      });
      
    },

  methods: {
    addPatient: function(patient){
   
      this.parkingList.push(patient);


    },
    createNextAppointment: function(patientId){
      console.log(patientId);
    },
    remove: function(index){
      this.parkingList.splice(index, 1);
    }
  }


});                                                                                                                                                                                                                                                                                                                  

Vue.component('testcomponent', {
  template: '\
    <div>\
    <input type="number" v-model="patient1.id" placeholder="id">\
    <input type="text" v-model="patient1.firstName" placeholder="First name">\
    <input type="text" v-model="patient1.lastName" placeholder="Last name">\
    <button v-on:click=addPatient>Add patient</button>\
    </div>\
  ',

  data: function() {
    return {
      patient1: {
        firstName: '',
        lastName: '',
        id: '',
      }
    }
  },
  methods: {
    addPatient: function() {
      this.$emit('add-patient', this.patient1);
    }
  }
});

var vm = new Vue({
  el: '#root',

   data: {
     patient: {
      firstName: '',
      lastName: '',
      id: ''
     }
   },

  methods: {
    addPatient: function(patient) {
      console.log('this.patient = ' + this.patient.firstName);
      console.log('patient = ' + patient.firstName);

      this.patient = patient;
      // this.patient.firstName = patient.firstName;
      // this.patient.lastName = patient.lastName;
      // this.patient.id = patient.id;
      
      // this.patient.firstName = '';
      // this.patient.lastName = '';
      // this.patient.id = '';
      

    }
  }

});
</script>



</body>
</html>



@endsection