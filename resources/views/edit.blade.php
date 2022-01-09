<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TodooList</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <h1 class="text-center">Todo List แก้ไขข้อมูล</h1>
    <div class="text-center">
        <form action="{{url('/todo/update/'.$todo->id)}}" method="post">
            @csrf
            @error('todo_name')
            <div>
                <span class="text-danger">{{$message}}</span><br>
            </div>
            @enderror
            <input type="text" class="form-control" name="todo_name" value="{{$todo->todo_name}}">
            <input type="submit" value="แก้ไข">
            <button type="button" onclick="history.back()">กลับ</button>
        </form>
        
    </div>
</body>

</html>