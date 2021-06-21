<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Article</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-165VQ2M8FT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-165VQ2M8FT');
</script>
<script src="https://kit.fontawesome.com/47e2cff383.js" crossorigin="anonymous"></script>
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- ui style -->
<link href="/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="/css/responsive.css" rel="stylesheet" />
<!-- jQuery -->
<script src="/js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap -->
<script src="/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<!-- custom javascript -->
<script src="/js/script.js" type="text/javascript"></script>

</head>
<body style="background-color:#f8f8f8">
    <div id="app">
       

           <nav-bar></nav-bar>
           <view-article :id="{{ $id }}"></view-article>
         
         
        <foo-ter></foo-ter>
    </div>
    <script src=" {{ asset('js/app.js') }}"></script>
   
</body>
</html>

