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
              $('#base64string').html(event.target.result).fadeIn('fast').focus().select();;
          };
          reader.readAsDataURL(file);
          return false;
      };
</script>




