@extends('layouts.app')

@section('content')
<html>
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>

<!--<style>
$base: #555;
$primary: #222;
$accent: #B62B10;
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,100);
html { min-height: 100%; }
body {
  min-height: 100%;
  font-family: "Open Sans";
  font-size: 16px;
  font-weight: 300;
  line-height: 1.5;
  color: $base;
  background: linear-gradient(45deg, $accent 30%, $primary);
  background: #e0e0e0;
  padding: 4rem;
}
#app {
  background: rgba(255,255,255,.9);
  padding: 4rem;
//  box-shadow: 0 .5rem 1rem 0 rgba(0,0,0,.25);
//  border-radius: 10px;
}
.calendar {
  & > .title {
    font-size: 2.5rem;
    font-weight: 100;
    margin-bottom: 2rem;
    color: $primary;
    & > * { display: inline; }
  }
  .days {
    list-style: none;
    margin: 0 0 0 0;
    padding: 0;
    & > .day.outside { display: none; }
    & > .day.empty { display: none; }
    .events { 
      margin-bottom: 1rem;
      .event {
        box-sizing: border-box;
        line-height: 1;
        font-size: .75rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        background: rgba($accent,.05);;
        color: $accent;
        padding: .25rem .5rem;
        margin-bottom: 2px;

        cursor: pointer;
        transition: all .1s ease-in-out;
        &:hover, &:focus { background: rgba($accent,.1); }
        &:active { color: white; background: rgba($accent, 1); }

//        &.first { border-left: 1px solid rgba($accent, .5); }
//        &.last { border-right: 1px solid rgba($accent, .5); }
      }
    }
    .date {
      position: relative;
      font-size: 1.25rem;
      margin-bottom: 1rem;
      padding-bottom: .5rem;
      &:after {
        content: '';
        position: absolute;
        left: 0; right: 0; bottom: 0;
        height: 1px;
        background: currentColor;
        opacity: .5;
      }
      & > * { display: inline-block; }
      .weekday { font-weight: 400; color: $accent; text-transform: uppercase}

      .weekday:after, .day:after { content: ','}
      
    }
  }
}
@media (min-width : 1024px) {
  .calendar {
    border-bottom: 2px solid $accent;
    .days {
      position: relative;
      display: flex;
      justify-content: flex-start;
      align-items: stretch;
      flex-wrap: wrap;
      & > .day {
        position: relative;
        font-size: .75rem;
        margin-bottom: 0;
        padding: 0 0 15% 0;
        width: 100/7 * 1%;
        flex-shrink: 0;
        &:before {
          content: '';
          position: absolute;
          left: 0; right: .5rem; top: 0;
          height: 1px;
          background: currentColor;
          opacity: .5;
        }
        .date {
          position: absolute;
          top: 1rem;
          font-size: 1rem;
          line-height: 1rem;
          &:after { display: none; }
          .weekday, .month, .year { display: none; } 
          .day:after { content: '' }
        }
        
        
        &.outside {
          display: inline-block;
          //background: rgba(0,0,0,.125);
          &:before { opacity: .125; } 
          .date .day {
            opacity: .5
          }
        }
        &.empty {
          display: inline-block;
        }
        &:nth-child(n+1):nth-child(-n+7) {
          margin-top: 2rem;
          &:before { 
            opacity: 1; 
            height: 2px; 
            background: $accent;
          } 
          .date {
            width: 100%;
          }
          .date .weekday {
            display: block;
            position: absolute;
            top: -3rem;
            width: 100%;
            overflow: hidden;
            text-transform: uppercase;
            font-weight: 300;
            color: $accent;
            text-overflow: ellipsis;
            &:after { content: '' }
          }
        }
        

        
        .events {
          box-sizing: border-box;
          position: absolute;
          height: 100%;
          width: 100%;
          padding-top: 2.5rem;
          padding-right: .5rem;
          overflow: auto;
          .event {
            box-sizing: border-box;
            line-height: 1;
            font-size: .75rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            background: rgba($accent,.05);;
            color: $accent;
            padding: .25rem .5rem;
            margin-bottom: 2px;
            
            cursor: pointer;
            transition: all .1s ease-in-out;
            &:hover, &:focus { background: rgba($accent,.1); }
            &:active { color: white; background: rgba($accent, 1); }
            
            &.first { border-left: 1px solid rgba($accent, .5); }
            &.last { border-right: 1px solid rgba($accent, .5); }
          }
        } 
      }

    }
  }
}
</style>-->
</head>

w
<body>
<div id="app">
  <calendar></calendar>
</div>
<div id="calendar-template">
  <div class="calendar">
    <div class="title">
      <div class="month">
        @{{monthName}}
      </div>
      <div class="year">
        @{{year}}
      </div>
    </div>
    <ol class="days">
      <li class="day" v-for="day in days | orderBy 'unix' 1" v-bind:class="{ 'outside': day.outsideOfCurrentMonth, 'empty': day.events.length === 0 }">
        <div class="date">
          <span class="weekday">@{{day.weekday}}</span>
          <span class="month">@{{day.month}}</span>
          <span class="day">@{{day.number}}</span>
          <span class="year">@{{day.year}}</span>
        </div>
        <div class="events">
          <div v-for="event in day.events" class="event" v-bind:class="{'first': event.firstInRange, 'last': event.lastInRange }">@{{event.title}} </div>
        </div>
      </li>
    </ol>
  </div>
</div>
</body>
</html>
<script>
Vue.use(moment);

Vue.config.debug = true;

let randomIntRange = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;

var Events = {
  get(startDate, endDate) {
    return new Promise((resolve, reject) => {
      // TODO: Replace with actual API request
      // Generate some dummy events
      let events = []
      let start = moment(startDate)
      let end = moment(endDate)    
      let days = end.diff(start, 'days')
      for(let i = 0; i < days/4; i++) {
        let m = start.clone().add(randomIntRange(0, days), 'days')
        events.push({
          "id": i,
          "title": "Event " + i,
          "startDateTime":  m.add(randomIntRange(0, 24), 'hours').toISOString(),
          "endDateTime": m.add(randomIntRange(1, 3 * 24), 'hours').toISOString()
        })
      }
      resolve(events)
    })
  }
}

let Calendar = Vue.extend({
  template: '#calendar-template',
  props: {
    'month': { default: moment().month() + 1 },
    'year': { default: moment().year() }
  },
  data() {
    return {
      loading: true,
      days: []
    }
  },
  ready() {
    this.getEvents()
  },
  computed: {
    startDate() { 
      return moment().year(this.year).month(this.month - 1).startOf('month')
    },
    endDate() {
      return this.startDate.clone().add(this.startDate.daysInMonth() - 1,'days')
    },
    monthName() { 
      return moment().month(parseInt(this.month) - 1).format('MMMM')
    }
  },
  methods: {
    getEvents(){
      let self = this
      Events.get(self.startDate.toISOString(), self.endDate.toISOString()).then((events) => {
        // We have our events but we need to split up multi-day events into individual occurances
        let start = null
        let end = null
        let span = 1
        let seriesEvents = []
        for (event of events) {
            start = moment(event.startDateTime)
            end = moment(event.endDateTime)
            span = end.diff(start, 'days') + 1
            
            event.parentId = event.id
            if (span > 1) {
              event.firstInRange = true
              event.lastInRange = false

              for(let s = 1; s < span; s ++) {
                seriesEvents.push({
                  "id": 0,
                  "parentId": event.parentId,
                  "firstInRange": false,
                  "lastInRange": s === span-1,
                  "title": event.title,
                  "startDateTime":  start.clone().add(s, 'days').toISOString(),
                  "endDateTime": end.toISOString()
                })
              }
            } else {
                 event.firstInRange = true
                 event.lastInRange = true
            }
        }
        
        // Attempt to sort by time and event group bias
        // TODO: Remove or find a better solution
        events = events.concat(seriesEvents).sort(function(a, b){
            let keyA = new Date(a.unix),
                keyB = new Date(b.unix);
            let bias = a.id === 0 ? 1 : 0 
            
            if(keyA < keyB) return -1 + bias;
            if(keyA > keyB) return 1 + bias;
            return 0 + bias;
        })
                                
        self.updateDays(events)
        self.loading = false
      })
    },
    updateDays(events) {
      let m = () => moment().year(this.year).month(this.month - 1).startOf('month')
      let daysInMonth = m().daysInMonth();
      let previousMonthDays = m().date(1).day();
      let offset = 0 - previousMonthDays;
      let nextMonthDays = offset + (6 - m().date(daysInMonth).day());
      let total = daysInMonth + previousMonthDays + nextMonthDays;
      let days = [];
      
      for (let i = offset; i < total; i++) {
        var current = m().add(i, 'd');
        days.push({
          outsideOfCurrentMonth: (i < 0 || i > daysInMonth  - 1) ? true : false,
          date: current, 
          unix: current.valueOf(),
          weekday: current.format('dddd'),
          day: current.format('Do'),
          number: current.format('D'),
          month: current.format('MMMM'),
          year: current.format('YYYY'),
          events: events.filter((event) => {
            return current.isSame(event.startDateTime, 'day')
          })
        });
      }

      this.days = days;             
    }
  }
})

new Vue({
  el: '#app',
  components: {
    Calendar
  }
})
</script>

@endsection