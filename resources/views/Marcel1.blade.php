@extends('layouts.app')

@section('content')
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

<div id="app" class="wrapper">  
  <calendar :events="events" :editable="true"></calendar>
</div>

</body>
</html>
<script>
Vue.component('calendar', {
  template: '<div ref="calendar"></div>',
  
  props: {
    events: {
      type: Array, 
      required: true
    },
    
    editable: {
      type: Boolean,
      required: false,
      default: false
    },
    
    droppable: {
      type: Boolean,
      required: false,
      default: false
    },
  },
  
  data () {
    return {
      cal: null
    }
  },
  
  mounted () {
      var self = this;
      self.cal = $(self.$refs.calendar);
    
    var args = {
      firstDay: 1,
      lang: 'ro',
      header: {
        left:   'prev,next today',
        center: 'title',
        right:  'month,agendaWeek,agendaDay'
      },
      height: "auto",
      allDaySlot: false,
      slotEventOverlap: false,
      timeFormat: 'HH:mm',
      
      events: self.events,
      
      dayClick: function(date)
      {
            self.$emit('day::clicked', date);
            self.cal.fullCalendar('gotoDate', date.start);
            self.cal.fullCalendar('changeView', 'agendaDay');
      },

      eventClick: function(event)
      {
            self.$emit('event::clicked', event);
      }
    }
    
    if (self.editable)
    {
      args.editable = true;
      args.eventResize = function(event)
      {
        self.$emit('event::resized', event);
      }
      
      args.eventDrop = function(event)
      {
        self.$emit('event::dropped', event);
      }
    }
    
    if (self.droppable)
    {
      args.droppable = true;
      args.eventReceive = function(event)
      {
        self.$emit('event::received', event);
      }
    }
    
    self.cal.fullCalendar(args);
    
  }
  
})

let vm = new Vue({
  el: '#app',
  
  data () {
     return {
        events: [
           {
              title: 'Event1',
              start: '2015-10-10 12:30:00',
              end: '2015-10-10 16:30:00'
           },
           {
              title: 'Event2',
              start: '2015-10-07 17:30:00',
              end: '2015-10-07 21:30:00'
           }
        ],
        editable: false
     }
  },
  
  events: {
    'day::clicked': function(date) {
      console.log(date);
    }
  }
})

</script>



@endsection