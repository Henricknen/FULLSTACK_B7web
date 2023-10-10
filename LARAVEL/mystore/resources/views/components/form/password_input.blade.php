<div class = "password-input-area">
    <input name = "{{$name}}" type = "password" id="{{$id}}" class="@error($name) is_invalid @enderror" placeholder = "{{$placeholder}}" />
    <img src = "/assets/icons/eyeIcon.png" alt = "Ícone mostrar/ocultar senha" onclick="togglePasswordVisibility('{{$id}}')" />
  </div>

  <script>
    if(typeof togglePasswordVisibility != 'function') {
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            if(input.type == 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }
    }
  </script>