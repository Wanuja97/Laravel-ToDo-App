<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>ToDo App</title>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>
            <div class="row">
                <div class="col-md-12">

                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                    @endforeach

                    <form action="/saveTask" method="post">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="task" placeholder="Enter your task here">
                        <br>
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                    </form>
                    <table class="table table-dark">
                        <th>ID</th>
                        <th>Task</th>
                        <th>Completed</th>
                        <th>Action</th>
                        <th>Delete/Update</th>
                        @foreach($mydata as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->task}}</td>
                            <td>
                                @if($task->iscompleted)
                                    <button class="btn btn-success">Completed</button>
                                @else
                                    <button class="btn btn-danger">Not Completed</button>
                                @endif
                            </td>
                            <td>
                                @if($task->iscompleted == 0)
                                    <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark as Completed</a>
                                @else
                                    <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark as Not Completed</a>

                                @endif
                            </td>
                            <td>
                                <a href="/taskdelete/{{$task->id}}" class="btn btn-warning">Delete</a>
                                <a href="/taskupdate/{{$task->id}}" class="btn btn-success">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>