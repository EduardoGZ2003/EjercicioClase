@extends('adminlte::auth.login')
<style>
    .facebook-button {
    background-color: #3b5998;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    }
    </style>
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