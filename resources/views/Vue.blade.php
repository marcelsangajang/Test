@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Agenda</div>
                <div class="panel-body">

                  <div id="app-4">
                    <ol>
                      <li v-for="todo in todos">
                        @{{ todo.text }}
                      </li>
                    </ol>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

var app4 = new Vue({
  el: '#app-4',
  data: {
    todos: [
      { text: 'Learn JavaScript' },
      { text: 'Learn Vue' },
      { text: 'Build something awesome' }
    ]
  }
})

 </script>
@endsection
