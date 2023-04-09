<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .abass{
            border:1px solid red
        }
    </style>
</head>
<body>
    <div style="height:100vh;display:flex;justify-content: center;align-items: center;">     
           <table border="1">
           <tr><td>{{$username}}</td></tr>
           <tr><td><tr><td><a href="{{route('dashboard')}}">Dashboard</a></td></tr></td></tr>
           <tr><td> <a href="{{route('register')}}">Logout</a></td></tr>
           </table>
     
    </div>
</body>
</html>