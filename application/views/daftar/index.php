<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css')?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
      
      <ul class="nav nav-tabs">
        <li class="active"><a href="#home">Default</a></li>
        <li><a href="#menu1" >Menu 1</a></li>
        <li><a href="#menu2">Menu 2</a></li>
        <li><a href="#menu3">Menu 3</a></li>
      </ul>
    <form action="demo.php" method="post">
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <h3>Data diri calon mahasiswa baru</h3>
          <label>username</label><br/>
          <input name="username" type="text" >
        </div>
        <div id="menu1" class="tab-pane fade">
          <h3>Menu 1</h3>
           <label>name</label><br/>
         <input name="name" type="text" >
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Menu 2</h3>
           <label>password</label><br/>
          <input name="password" type="password" >
        </div>
        <div id="menu3" class="tab-pane fade">
          <h3>Menu 3</h3>
           <label>email</label><br/>
          <input name="email" type="email" ><br/>
          <input name="submit" type="submit" >
        </div>
      </div>
    </form>
    </div>

    <script>
        const list = document.querySelectorAll(".nav-tabs li");
        const a = document.querySelectorAll(".nav-tabs a");

        $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var x = $(event.target).text();         
            var y = $(event.relatedTarget).text();  
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    });
    </script>
</body>
</html>