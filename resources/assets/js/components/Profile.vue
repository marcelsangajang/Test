<template>
    <div id="app">
        <div class="example">
            <h3>Inline datepicker</h3>
            <datepicker :inline="true"></datepicker>
            <code>
                &lt;datepicker :inline="true"&gt;&lt;/datepicker&gt;
            </code>
        </div>

    </div>
</template>


<script>
import Datepicker from 'vuejs-datepicker'

var state = {
    date1: new Date()
}

export default {
    components: {
        Datepicker
    },
    data () {
        return {
            format: 'd MMMM yyyy',
            disabled: {},
            eventMsg: null,
            state: state,
            vModelExample: null
        }
    },
    methods: {
       disableTo (val) {
         console.log(val)
         if (typeof this.disabled.to === 'undefined') {
           this.disabled = {
             to: null,
             from: this.disabled.from
           };
         }
         this.disabled.to = val;
       },
       disableFrom (val) {
         if (typeof this.disabled.from === 'undefined') {
           this.disabled = {
             to: this.disabled.to,
             from: null
           };
         }
         this.disabled.from = val;
       }
    }
}
</script>

<style>
body {
    font-family: 'Helvetica Neue Light', Helvetica, sans-serif;
    padding: 1em 2em 2em;
}
input, select {
    padding: .75em .5em;
    font-size: 100%;
    border: 1px solid #ccc;
    width: 100%
}

select {
    height: 2.5em;
}

.example {
    background: #f2f2f2;
    border: 1px solid #ddd;
    padding: 0em 1em 1em;
    margin-bottom: 2em;
}

code,
pre {
    margin: 1em 0;
    padding: 1em;
    border: 1px solid #bbb;
    display: block;
    background: #ddd;
    border-radius: 3px;
}

.settings {
    margin: 2em 0;
    /*padding: 0 1.5em 1.5em;*/
    border-top : 1px solid #bbb;
    background: #eee;
}

h5 {
    font-size:100%;
    padding: 0;
}

.form-group {
    margin-bottom: 1em;
}

.form-group label {
    font-size: 80%;
    display: block;
}

</style>
