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
      
        <form  id="form" method="post">
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

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script type="text/javascript">
$(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "{{route('datas2')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,   
   beforeSend : function()
   {

//     document.getElementById('btn').value='Updating'
//    document.getElementById('btn').disabled='disabled'
  
   },

   success: function(data)
      {
      	console.log(data);
//         var w=JSON.parse(data)

//         if(w.status==true){
//            swal("Awesome !", w.message, "success");
//            //document.getElementById('form')
//         //    document.getElementById('btn').value='Update Profile'
//         //     document.getElementById('btn').disabled=''
//       /*     setTimeout(()=>{
//               window.location="dashboard"
//            },2000)
// */
//         }else{
//             // document.getElementById('btn').value='Update Profile'
//             // document.getElementById('btn').disabled=''
//           swal("Incorrect!", w.message, "warning");
//         }
        


      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});

</script>
</body>
</html>