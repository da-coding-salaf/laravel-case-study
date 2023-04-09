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
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
             @endif
        <form action="{{route('datas')}}" method="post">
            @csrf
            
           <table border="1">

           <tr><td><input type="text" name="fullname" value="{{old('fullname')}}" required placeholder="fullname" /></td></tr>
           <tr><td> <input type="email" name="email" value="{{old('email')}}" required placeholder="email" class="@error('email') abass @enderror" /></td></tr>
           <tr><td> 
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
           </td></tr>
           <tr><td><input type="text" name="username" value="{{old('username')}}"  required placeholder="username" /></td></tr>
           <tr><td> <input type="password" name="password" value="{{old('password')}}"  required placeholder="password" /></td></tr>
           <tr><td> <button type="submit">Register</button></td></tr>
           <tr><td> <a href="{{route('login')}}">Login</a></td></tr>
           </table>
        </form>

    </div>
</body>
</html>