<html>
    <!--https://monterail.github.io/vue-multiselect/ -->
<head>
  <script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
  <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
  <script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>
</head>

<body>
    
<h1> Create Employee </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

<div id="createEmployeeForm">
    <form>
        <label>First name</label><input v-model="firstName" placeholder="First name" type="text"><br>
        <label>Last name</label><input v-model="lastName" placeholder="Last name" type=text""><br>
        <label>Date of birth</label><input v-model="dateOfBirth" type="date"><br>
        <label>Zipcode</label><input v-model="zipcode" placeholder="Zipcode" type="text"><br>
        <label>House number</label><input v-model="houseNumber" placeholder="House number" type="number"><br>
        <label>Address</label><input v-model="address" placeholder="Address" type="text"><br>
        <label>City</label><input v-model="city" placeholder="City" type="text"><br>
        <label>Email</label><input v-model="email" placeholder="Email" type="email"><br>
        <label>Phone number 1</label><input v-model="phoneNumber1" placeholder="Phone number 1" type="number"><br>
        <label>Phone number 2</label><input v-model="phoneNumber2" placeholder="Phone number 2" type="number"><br>
        <label>Description intern</label><input v-model="descriptionIntern" placeholder="Description intern" type="text"><br>
        <label>Type</label><input v-model="type" placeholder="Type" type="text"><br>      
    </form>
    <button v-on:click="createEmployee()">Create employee</button>
</div>
-----------------------------------------------------------------------------------------------
<h1>Create Employee Period</h1>

<div id="createEmployeePeriodForm">

    <!-- (static) Period information-->
    <label>Employee id</label><input v-model="employeeID" type="number"><br>
    <label>Description</label><input v-model="description" type="text"><br>
    <label>Start date</label><input v-model="startDate" type="date"><br>
    <label>End date</label><input v-model="endDate" type="date"><br>
    <label>Interval</label><input v-model="interval" type="number"><br>
    <label>Number of Lines per interval</label><input v-model="intervalLines" type="number"><br>
<!--
    <table border="1">
            <tr>
                <td v-for="day in weekdays">@{{day}}</td>
            </tr>
                <td v-for="day in weekdays">Work hours: <input v-model="startTime" type="time">-<input v-model="endTime" type="time"></td>
            <tr>
                <td>
                    
                </td>
            </tr>
    </table>
    -->
    

    <!-- Add weekday -->
    Create new Weekday
    <select v-model="weekday">
        <option v-for="(day, index) in weekdays"> @{{day}}</option>
    </select>
    <input v-model="startTime" type="time">-<input v-model="endTime" type="time">
    <button v-on:click="addWeekday()">+</button>

    <!-- Print Employee availability array-->
    <div v-for="(day, index) in employeeAvailability">

        
        <div>
            <!-- Start and End times for each day -->
       
            <p><b>@{{day.weekday}}</b></p> 

            <input type="checkbox" v-model="day.repeat"> Repeat 
            <div v-if="day.repeat">
                Repeat start date: <input type="date" v-model="day.repeatDate">
                <br>
                Repeat every
                <select v-model="day.repeatInterval">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                weeks
            </div>
            <br>

            <!-- Working hours, delete dat button-->
            Working hours: <input v-model="day.startTime"> - <input v-model="day.endTime"> 
            <button v-on:click="deleteWeekday(index)">-</button>

            <!-- Break times when adding new break -->
            <div>
                Create new break: <input v-model="startTimeBreak" type="time">-<input v-model="endTimeBreak" type="time">
                <button v-on:click="addBreak(index)">+</button>
            </div>
            

            <!-- Break times for each day-->
            <div v-for="(b, index2) in day.breaks">
                Break @{{index2 + 1}}: <input v-model="b.startTime"> - <input v-model="b.endTime"> <button v-on:click="deleteBreak(index, index2)">-</button> 
            </div>
            <br>
        </div>    
    </div>
    <br>
    <!--<my-component :temp="employeeAvailability"></my-component>-->
    <button v-on:click="createEmployeePeriod()">Create period</button>

</div>

</body>

<script>

var app2 = new Vue({
    el: '#createEmployeePeriodForm',

    data: {
        employeeID: '',
        description: '',
        interval: '',
        intervalLines: '',
        startDate: '',
        endDate: '',

        startTimeBreak: '12:00',
        endTimeBreak: '13:00',
        startTime: '09:00',
        endTime: '17:00',
        startBreak: '12:00',
        endBreak: '13:00',
        weekday: '',
        weekdays: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],

        //Contains arrays of each weekday
        employeeAvailability: []
 
    },
    created: function() {
        var i;
        for(i = 0; i < 5; i++) {
            this.weekday = this.weekdays[i];
            this.addWeekday();
            this.addBreak(i);
        }
        this.weekday = this.weekdays[0];
    },

    //Ajax call to create Period for an employee
    methods: {
        createEmployeePeriod: function() {
            axios.post('/EmployeePeriodPost', {
                employeeID: this.employeeID,
                description: this.description,
                interval: this.interval,
                intervalLines: this.intervalLines,
                startDate: this.startDate,
                endDate: this.endDate,
                employeeAvailability: this.employeeAvailability
              })
              .then(function (response) {
                console.log(response);
                alert('Employee Period created');
              })
              .catch(function (error) {
                console.log(error);
              });
        },

        //Create weekday and add to array
        addWeekday: function() {
            this.employeeAvailability.push({
                weekday: this.weekday,
                startTime: this.startTime,
                endTime: this.endTime,
                breaks: [],
                repeat: false,
                repeatInterval: 0,
                repeatDate: ''
            })
        },

        deleteWeekday: function(index) {
            this.employeeAvailability.splice(index, 1);
        },

        //Create break for given weekday
        addBreak: function(index) {        
            this.employeeAvailability[index].breaks.push({  
                startTime: this.startTimeBreak,
                endTime: this.endTimeBreak
            })
        },
        //Delete given break for given weekday
        deleteBreak: function(weekdayIndex, breakIndex) {
            this.employeeAvailability[weekdayIndex].breaks.splice(breakIndex, 1)
        }
    }
})

 var app1 = new Vue({
    el: '#createEmployeeForm',

    data: {
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
    
</script>

</html>