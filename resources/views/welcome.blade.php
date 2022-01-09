<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TodooList</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <h1 class="text-center">Todo List</h1>
    <div class="text-center">
        <form action="{{route('addTodo')}}" method="post">
            @csrf
            @error('todo_name')
            <div>
                <span class="text-danger">{{$message}}</span><br>
            </div>
            @enderror
            <input type="text" class="form-control" name="todo_name">
            <input type="submit" value="บันทึก">
        </form>
    </div>

    <div class="content mt-2">
        @if(session("success"))
        <div class="alert-success">{{session('success')}}</div>
        @endif
        @if(session("danger"))
        <div class="alert-danger">{{session('danger')}}</div>
        @endif
        <table>
            @foreach($todos as $row)
            <tr>
                <td width="70%">
                    @if($row->todo_status == 0)
                    {{$row->todo_name}}
                    @else
                    <del>{{$row->todo_name}}</del>
                    @endif
                </td>
                <td width="10%"><a href="{{url('todo/edit/'.$row->id)}}">edit</a></td>
                <td width="10%">
                    <a href="{{url('todo/status/'.$row->id)}}">
                    @if($row->todo_status == 0)
                    Completed
                    @else
                    UnCompleted
                    @endif
                    </a>
                </td>
                <td width="10%"><a href="{{url('todo/deleted/'.$row->id)}}" onclick="return confirm('คุณต้องการลบหรือไม่?')">Deleted</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>