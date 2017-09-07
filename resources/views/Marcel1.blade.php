
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

<!-- Contains four container boxes for now -->
<div id="root" class="container">

  <!-- container 1
  <div class="container">
    <div v-if="!container1">
      <label>id:</label>
      <input type="number" v-model.number="container1">
      </div>

    <schedule v-if="container1" :id="container1"></schedule>
  </div>
-->


  <!-- container 3-->
  <div class="container">
    <buttonpanel></buttonpanel>
  </div>


  <!-- container 4-->
  <div class="container">
    
  </div>

</div>

</body>

<script>
Vue.component('buttonpanel', {
  template: '\
  <div>\
    <button v-for="buttonn in buttonnList">\
    @{{buttonn.text}}\
    </button>\
  </div>',

  data: function() {
    return {
      button1: {
        text: 'button1',
        action: 'func1'
      },
      button2: {
        text: 'button2',
        action: 'func2'
      },
      buttonnList: [this.button1, this.button2]
    }
  }
})
//Vue.component('container', {
//  template: '<div class="container"> @{{input}} </div>',

//  props: ['input']

//})

/*Vue.component('schedule', {
  template: '\
  <div>\
    Schedule:<br>\
    <button v-on:click="showId">show ID</button>\
  </div>\
  ',
  props: {
    id: {
      type: Number,
      default: 0
    }
  },
  mounted: function () {
    console.log("Component created")
  },
  methods: {
    showId: function() {
      console.log(this.id)
    }
    

  }
})*/

var vm = new Vue({
  el: '#root',

  data: {
    container1: null
  }
})



</script>

</html>
