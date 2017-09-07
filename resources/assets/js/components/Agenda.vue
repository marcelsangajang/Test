<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Agenda</div>

                    <div class="panel-body">
                      <table>
                        <tr v-for="plan in plans" is="plan" :x="plan">
                        </tr>
                      </table>
                    </div>
                    <template id="template_plan">
                      <td>{{ x.status }}</td>
                      <td>{{ x.time }}</td>
                    </template>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data: function () {
          return {
            plans: [
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:00"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:07"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:14"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:21"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:28"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:30"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:37"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:44"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:51"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "09:58"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:00"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:07"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:14"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:21"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:28"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:30"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:37"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:44"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:51"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "10:58"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:00"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:07"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:14"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:21"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:28"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:30"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:37"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:44"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:51"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "11:58"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:00"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:07"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:14"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:21"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:28"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:30"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:37"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:44"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:51"
  },
  {
    "status": "Ingeroosterd: Tandarts Toine",
    "time": "12:58"
  },
  {
    "status": "open",
    "time": "13:00"
  },
  {
    "status": "open",
    "time": "13:07"
  },
  {
    "status": "open",
    "time": "13:14"
  },
  {
    "status": "open",
    "time": "13:21"
  },
  {
    "status": "open",
    "time": "13:28"
  },
  {
    "status": "open",
    "time": "13:30"
  },
  {
    "status": "open",
    "time": "13:37"
  },
  {
    "status": "open",
    "time": "13:44"
  },
  {
    "status": "open",
    "time": "13:51"
  },
  {
    "status": "open",
    "time": "13:58"
  },
  {
    "status": "open",
    "time": "14:00"
  },
  {
    "status": "open",
    "time": "14:07"
  },
  {
    "status": "open",
    "time": "14:14"
  },
  {
    "status": "open",
    "time": "14:21"
  },
  {
    "status": "open",
    "time": "14:28"
  },
  {
    "status": "open",
    "time": "14:30"
  },
  {
    "status": "open",
    "time": "14:37"
  },
  {
    "status": "open",
    "time": "14:44"
  },
  {
    "status": "open",
    "time": "14:51"
  },
  {
    "status": "open",
    "time": "14:58"
  },
  {
    "status": "open",
    "time": "15:00"
  },
  {
    "status": "open",
    "time": "15:07"
  },
  {
    "status": "open",
    "time": "15:14"
  },
  {
    "status": "open",
    "time": "15:21"
  },
  {
    "status": "open",
    "time": "15:28"
  },
  {
    "status": "open",
    "time": "15:30"
  },
  {
    "status": "open",
    "time": "15:37"
  },
  {
    "status": "open",
    "time": "15:44"
  },
  {
    "status": "open",
    "time": "15:51"
  },
  {
    "status": "open",
    "time": "15:58"
  },
  {
    "status": "open",
    "time": "16:00"
  },
  {
    "status": "open",
    "time": "16:07"
  },
  {
    "status": "open",
    "time": "16:14"
  },
  {
    "status": "open",
    "time": "16:21"
  },
  {
    "status": "open",
    "time": "16:28"
  },
  {
    "status": "open",
    "time": "16:30"
  },
  {
    "status": "open",
    "time": "16:37"
  },
  {
    "status": "open",
    "time": "16:44"
  },
  {
    "status": "open",
    "time": "16:51"
  },
  {
    "status": "open",
    "time": "16:58"
  },
  {
    "status": "Einde werktijd",
    "time": "17:00"
  }
]
          }
      },
      mounted() {
          console.log('Component mounted.')
      }
    }
</script>
