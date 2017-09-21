<template>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Agenda</div>
        <div class="panel-body">
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
            <table>
                <tr>
                    <th>Tijd</th>
                    <th>Afspraak</th>
                    <th>pauze</th>
                    <th>Stoel</th>
                    <th>Opmerking</th>
                </tr>
                <tr v-for="timeblock in responseAPI">
                    <td>
                        {{timeblock.time}}
                    </td>
                    <td>
                        <div id="appointment">
                            <div v-for="(appointdata, index) in timeblock.appointment">
                                {{index}} : {{appointdata}}
                            </div>
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
       ID: '1',
       date: '',
       option: 'employee',
       responseAPI: ''
       }
     },
     watch: {
       date: function() {
           this.getAgendaData()
         }
    },
    created: function() {
            //Assign todays date to 'date' attribute
            var dateToday = new Date().toJSON().slice(0,10)

            this.date = dateToday
            //Get date from SimplexCalendar.vue
            bus.$on('date-changed', function (date) {
              this.showDate(Vue.util.extend({}, date))
            }.bind(this))
         },
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
   }

 </script>
