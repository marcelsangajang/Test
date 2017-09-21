<template>
  <div>
    <calendar
      v-on:dateChanged="changed"
      v-on:SwitchPreviousMonth="pre"
      v-on:SwitchNextMonth="next"
      v-bind:debug="false"
    />
  </div>
</template>
<script>
import calendar from 'vuejs-calendar'
import bus from './event-bus.js'
export default {
  components: {
    calendar
  },
  methods: {
    pre (from, to){
//      console.group('pre month')
//        console.log('from',from)
//        console.log('to',to)
      console.groupEnd()
    },
    next (from, to) {
//      console.group('next month')
//        console.log('from',from)
//        console.log('to',to)
//      console.groupEnd()
    },
    changed (to){
//        console.log('changed to',to)
        bus.$emit('date-changed', to);
    }
  }
}
</script>
