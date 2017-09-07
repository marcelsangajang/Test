<html>
    <!--https://monterail.github.io/vue-multiselect/ -->
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
    
<h1> Create Employee </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

<div id="root">
<createEmployeeForm></createEmployeeForm>

</div>
<script>
 Vue.component('createEmployeeForm', {
    template: '<div></div>',

    data: function() {
        return {
            firstName: '',
            lastName: '',
            dateOfBirth: '',
            zipcode: '',
            houseNumber: '',
            address: '',
            city: '',
            email: '',
            phoneNumber1: '',
            phoneNumber2: '',
            descriptionIntern: '',
            type: ''
        }
    },

    methods: {
        //Ajax call to create employee
        createEmployee: function() {
            axios.post('/EmployeePost', {
                firstName: this.firstName,
                lastName: this.lastName,
                dateOfBirth: this.dateOfBirth,
                zipcode: this.zipcode,
                houseNumber: this.houseNumber,
                address: this.address,
                city: this.city,
                email: this.email,
                phoneNumber1: this.phoneNumber1,
                phoneNumber2: this.phoneNumber2,
                descriptionIntern: this.descriptionIntern,
                type: this.type
              })
              .then(function (response) {
                console.log(response);
                alert('Employee created');
              })
              .catch(function (error) {
                console.log(error);
              });
        }
    }
})

 new Vue({
    el: '#root'
 })
    
</script>

</html>