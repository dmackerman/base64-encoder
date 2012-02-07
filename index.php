<!doctype html>
<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>base64 encoder</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <header>
    <h1>base64 encoder</h1>
    <p>Drag an image into the dropzone to return a base64 encoded string</p>
  </header>
  <div role="main">
    <article>
      <div id="holder"></div> 
      <textarea id="base64string"></textarea>
      <p id="status">File API &amp; FileReader API are not supported by your browser. Sorry!</p>
    </article>
  </div>
  <footer>
    <p>Created by Dave Ackerman. <a href="http://www.moduscreate.com">Modus Create</a></p>
    <a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-solo.png" width="63" height="64" alt="HTML5 Powered" title="HTML5 Powered">
</a>    
  </footer>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<script>
      var holder = document.getElementById('holder'),
          string = document.getElementById('base64string'),
          state = document.getElementById('status');
      if (typeof window.FileReader === 'undefined') {
          state.className = 'fail';
      } else {
          state.className = 'success';
          state.innerHTML = 'File API &amp; FileReader Available. Drop away!';
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
              $('#base64string').html(event.target.result).fadeIn('fast').focus().select();;
          };
          reader.readAsDataURL(file);
          return false;
      };
</script>
</body>
</html>
