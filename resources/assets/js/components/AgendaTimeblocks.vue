<template>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Agenda</div>
        <div class="panel-body timeblocks-table">
            <!-- <label>Date</label>
            <input type="date" placeholder="Date" v-model="date"><br>
            <label>ID</label>
            <input type="text" placeholder="ID" v-model="ID"><br>
            <label>option</label>
            <select v-model="option">
            <option name="chair">chair</option>
            <option name="employee">employee</option>
         </select> -->
            <table>
                <tr>
                    <th>Tijd</th>
                    <th>Afspraak</th>
                    <th>pauze</th>
                    <th>Stoel</th>
                    <th>Opmerking</th>
                </tr>
                <tr v-for="timeblock in responseAPI">
                    <td @dragover.prevent @drop="dropAppoint" id="appointment" >
                        {{timeblock.time}}
                    </td>
                    <td>
                        <div v-if="timeblock.appointment">
                                <agenda-appointment :appointmentdata="timeblock.appointment "></agenda-appointment>
                        </div>
                    </td>
                    <td>
                        {{timeblock.break}}
                    </td>
                    <td>
                        {{timeblock.scheduled}}
                    </td>
                    <td>
                        {{timeblock.text}}
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
</template>

<style>

.timeblocks-table {
    overflow-y: scroll;
    height: 400px;
}

table {
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
}

th {
    height: 50px;
    width: 150px;
    text-align: center;
}
</style>

<script>

import bus from './event-bus.js'

export default {
     data: function () {
       return {
       date: '',
       ID: '',
       option: 'employee',
       responseAPI: '',
       dragPatient: '',
       dropPoint: [],
       newAppointm: ''
       }
     },
     watch: {
       date: function() {
           this.getAgendaData()
         }
    },
    created: function() {
            //Assign todays date to 'date' attribute
            var dateToday = '2017-09-26'//new Date().toJSON().slice(0,10)

            this.date = dateToday
            //Get date from SimplexCalendar.vue
            bus.$on('date-changed', function (date) {
              this.showDate(Vue.util.extend({}, date))
            }.bind(this))

            bus.$on('drag-patient', function (patient) {
            this.assignDragPatient(patient)
            }.bind(this))
         },
     props: ['agendaid'],
     methods: {
        showDate: function(date) {
        var dateInput  = [date.year, date.month, date.date]
        var dateNew    = []

        for (var i = 0 ; i < dateInput.length ;  i++) {
          if (dateInput[i].length < 2) {
            dateNew.push(0 + dateInput[i])
          } else {
            dateNew.push(dateInput[i])
          }
        }
        dateNew = dateNew.join("-")
        this.date = dateNew
        },
        assignDragPatient: function(patient) {
            this.dragPatient = JSON.parse(patient)
        },
       getAgendaData: _.debounce(function() {
         var app = this
         app.responseAPI = "Searching..."
         axios.get('/AgendaTimeBlocksAPI', {
                  params: {
                  chair:  this.agendaid,
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
       }, 500),
       dropAppoint: function(e) {
          this.newAppointm = ''
          var app = this

          var time = e.path[0].innerHTML
          time     = time.trim()
          time     = time + ':00'

          var appointmPar = {}

          appointmPar['time']      = time
          appointmPar['date']      = this.date
          appointmPar['agendaID']  = this.agendaid
          appointmPar['patientID'] = this.dragPatient.id
          appointmPar['duration']  = 30

          this.newAppointm = appointmPar

          axios.post('/postAppointm', {
              time:      appointmPar['time'],
              date:      appointmPar['date'],
              agendaID:  appointmPar['agendaID'],
              patientID: appointmPar['patientID'],
              duration:  appointmPar['duration']
            })
            .then(function (response) {
              app.getAgendaData()
            })
            .catch(function (error) {
              console.log(error);
            })

       }
     }
   }

 </script>
