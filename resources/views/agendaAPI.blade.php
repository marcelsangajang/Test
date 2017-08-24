<html>

<head>
  <script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
  <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
  <script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>
</head>


<body>

<div id="app">
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

<script>
   var app = new Vue({
     el: '#app',
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

</body>



</html>
