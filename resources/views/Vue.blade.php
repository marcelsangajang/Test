<html>
<!--<script src="https://unpkg.com/vue"></script>-->
<head>

<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

</head>

<body>
    
<h1> Testing Vue </h1>




<div id="app">
<input type="text" v-model="message">
  @{{ message }}
</div>

<div id="app-2">
  <span v-bind:title="message">
    Hover your mouse over me for a few seconds
    to see my dynamically bound title!
  </span>
</div>

<div id="app-3">
<input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
<label for="jack">Jack</label>
<input type="checkbox" id="john" value="John" v-model="checkedNames">
<label for="john">John</label>
<input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
<label for="mike">Mike</label>
<br>
<span>Checked names: @{{ checkedNames }}</span>
</div>


</body>

<script>

	var app = new Vue({
	  	el: '#app',
	  	data: {
	    	message: 'Hello Vue!'
		  	}
		})

	var app2 = new Vue({
		el: '#app-2',
		data: {
		    message: 'You loaded this page on ' + new Date().toLocaleString()
		}
	})

	var app3 = new Vue({
  		el: '#app-3',
  		data: {
    			checkedNames: []
  		},
  		forms: {
	        userRegistrationForm: {
	            name: '',
	            email: '',
	            password: '',
	            password_confirmation: ''
	        }
	    }
	})

	/**Vue.component('user-registration-form', {
		template: '<form>@{{forms}}</form>',
	    forms: {
	        userRegistrationForm: {
	            name: '',
	            email: '',
	            password: '',
	            password_confirmation: ''
	        }
	    }
	});

	// register
	Vue.component('my-component', {
	  template: '<div>A custom component!</div>'
	});

	
	// create a root instance
	new Vue({
	  el: '#example'
	});**/







</script>
</html>