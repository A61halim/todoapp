@extends('layouts.app')

@section('content')
<div class="formCon">
<form action="/create" method="get">
    <input type="text" id="fname" name="task" placeholder="Task..">
    <input type="text" id="lname" name="taskDescription" placeholder="Task discription..">
    <input type="submit" value="Submit">
  </form>
  <table id="customers">
  <tr>
    <th>Numero</th>
    <th>Task</th>
    <th>Task discription</th>
    <th>Status</th>
    <th>Action</th>
    
  </tr>
  <?php $id = 1; ?>
  @foreach($tasks as $task)
  <tr>
    <td> {{ $id }} </td>
    <td> {{ $task->task }} </td>
    <td> {{ $task->task_discription }} </td>
    <td> {{ $task->status }} </td>
    <td>
    <?php $tid = $task->id; ?>
      <a href="/delete/{{$tid}}" class="btn btn-danger btn-sm"> Delete</a>
      <a href="/finish/{{$tid}}" class="btn btn-success btn-sm"> Finished</a>
    </td>
  </tr>
  <?php $id++; ?>
  @endforeach
</table>
</div>
@endsection
