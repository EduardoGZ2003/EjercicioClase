@extends('adminlte::auth.register')

<!-- Link de aviso de privacidad -->
<div class="classes_content">
    <a href="{{route('privacidad')}}" class="link">Aviso de privacidad</a>
</div>

<!-- Botón de inicio de sesión con Facebook -->
<a href="{{route('auth.redirect')}}" class="facebook-button">
    <i class="fab fa-facebook"></i>
</a>

<!-- Cargar script de Font Awesome (si no se ha cargado desde CDN) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>