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
                                    <p v-for="(value, index) in timeblock.appointment">
                                    {{index}}-{{value}}
                                    </p>
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
                      <span><pre>{{responseAPI}}</pre></span>

                    </div>
                </div>
            </div>
    </div>
</template>

<style>

table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

th {
    height: 50px;
    width: 100px;
}


</style>

<script>
export default {
     data: function () {
       return {
       ID: '1',
       date: '2017-05-10',
       option: '',
       responseAPI: ''
       }
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
   }

 </script>
