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
        <form action="{{route('loginUser')}}" method="post">
            @csrf
            
           <table border="1">

        
           <tr><td> <input type="email" name="email" value="{{old('email')}}" required placeholder="email" class="@error('email') abass @enderror" /></td></tr>
           <tr><td> 
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
           </td></tr>
           <tr><td> <input type="password" name="password" value="{{old('password')}}"  required placeholder="password" /></td></tr>
           <tr><td> <button type="submit">Login</button></td></tr>
           <tr><td> <a href="{{route('register')}}">Register</a></td></tr>
           </table>
        </form>

    </div>
</body>
</html>