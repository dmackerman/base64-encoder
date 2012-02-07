<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>base64 encoder</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header>
    <h1>base64 encoder</h1>
    <p>Drag an image into the dropzone to return a base64 encoded string</p>
  </header>
  <div role="main">
    <article>
      <div id="holder"></div> 
      <div id="base64string"></div>
      <p id="status">File API &amp; FileReader API are not supported by your browser.</p>
    </article>
  </div>
  <footer>
    <p>Created by Dave Ackerman. <a href="http:/www.moduscreate.com">Modus Create</a></p>
  </footer>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>

  <script>
      var holder = document.getElementById('holder'),
          string = document.getElementById('base64string'),
          state = document.getElementById('status');
      if (typeof window.FileReader === 'undefined') {
          state.className = 'fail';
      } else {
          state.className = 'success';
          state.innerHTML = 'File API &amp; FileReader Available';
      }
      holder.ondragover = function () {
          this.className = 'hover';
          return false;
      };
      holder.ondragend = function () {
          this.className = '';
          return false;
      };
      holder.ondrop = function (e) {
          this.className = '';
          e.preventDefault();
          var file = e.dataTransfer.files[0],
              reader = new FileReader();
          reader.onload = function (event) {
              holder.style.background = 'url(' + event.target.result + ') no-repeat center';
              $('#base64string').html(event.target.result);
          };
          reader.readAsDataURL(file);
          return false;
      };
  </script>


</body>
</html>
