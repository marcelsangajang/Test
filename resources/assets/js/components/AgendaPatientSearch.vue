<template>
  <div class="container">
              <div class="panel panel-default">
                  <div class="panel-heading">Patientlijst widget</div>
                  <div class="panel-body">

                    <label>Zoek:</label>
                    <input type="text" placeholder="Zoek..." v-model="text">
                    <input type="text" placeholder="naam..." id="showName" v-if="showName" v-model="inputName"><br>
                    <span><pre>{{filtered}}</pre></span>

                    <!-- Respons API -->
                    <span><pre>{{responseAPI}}</pre></span>



                  </div>
              </div>
  </div>
</template>

<script>
export default {
     data: function () {
       return {
         text: '',
         responseAPI: '',
         filtered: [],
         filteredBackup: [],
         inputName: '',
         showName: false
     }
       },
     beforeMount: function () {
       this.getpatients()
     },
     watch: {
       text: function() {

         this.filtered = ''
         this.filterName()

         var input = this.text
         this.showName = false
         this.inputName = ''

         if (input.length == 8 && isFinite(input)) {
          this.filterBirthdate();
         }
        },
      inputName: function() {
        this.filterBirthdateName()
      }
    },
     methods: {
       getpatients: _.debounce(function() {
         var app = this
         app.responseAPI = "Laden..."
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
       }, 500),
       filterBirthdate: function() {
         var json = this.responseAPI
         var input = this.text
         var patients = []

          for(var i = 0; i < json.length; i++) {
             var patient = json[i]
             var birthdateAr = patient.date_of_birth.split("-");
             var birthdate = birthdateAr[2] + birthdateAr[1] + birthdateAr[0]

             if (birthdate == input) {
              patients.push(patient);
             }

             if (patients) {
              if (patients.length > 1) {
              this.showName = true
              }
              this.filtered       = patients
              this.filteredBackup = patients
             }
         }
       },
       filterBirthdateName: function() {
        var patientList  = this.filtered
        var patientsNext = []
        var inputName    = this.inputName

         for(var i = 0; i < patientList.length; i++) {
            var patient = patientList[i]
            var name    = patient.first_name

            if (name == inputName) {
             patientsNext.push(patient)
            } else {
              this.filtered = this.filteredBackup
            }

            if (patientsNext != '') {
             this.filtered = patientsNext
            }
        }
       },
       filterName: function() {
        var patientList  = this.responseAPI

         for(var i = 0; i < patientList.length; i++) {
            var patient  = patientList[i]
            var firstName     = patient.first_name
            var lastName      = patient.last_name
            var input    = this.text
            var patients = []

            if (firstName == input | lastName == input ) {
             patients.push(patient)
            }

            if (patients != '') {
             this.filtered = patients
            }
        }
       }
     }
   }
 </script>
