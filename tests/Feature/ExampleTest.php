<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_registro(){
        Artisan::call('migrate');

        //el formulario carga correctamente

        $carga = $this->get(route('login'));

        $carga->assertStatus(200)->assertSee('login');

        //Validar Registro Incorrecto

        $envioDatosMal = $this->post(route('login'),["email "=>"pruebadefallo", "password" => "12345"]);
   
        $envioDatosMal->assertStatus(302)->assertRedirect(route('login'));
        
        //Validar Registro Correcto
        $envioDatosBien = $this->post(route('register'),["name"=>"Barron","email" => "registrocorrecto@gmail.com", "password" => "RegistrOk1723", "password_confirmation" => "RegistrOk1723"]);
  
        $envioDatosBien->assertStatus(302)->assertRedirect(route('home'));

        $this->assertDatabaseHas('users',["name"=>"Barron","email" => "registrocorrecto@gmail.com"]);
    }

    public function test_division(){
        Artisan::call('migrate');

        //el formulario carga correctamente

        $carga = $this->get(route('nueva.division')); // Cambiar 'division' a 'nueva.division'

        $carga->assertStatus(200)->assertSee('division');
    
        //Validar Registro Incorrecto
    
        $envioDatosMal = $this->post(route('division.guardar'), ["codigo "=>"codigomalo", "nombre" => "12345"]); // Cambiar 'division' a 'division.guardar'
       
        $envioDatosMal->assertStatus(302)->assertRedirect(route('nueva.division')); // Cambiar 'division' a 'nueva.division'
        
        //Validar Registro Correcto
        $envioDatosBien = $this->post(route('division.guardar'), ["codigo"=>"11","nombre" => "IDS"]); // Cambiar 'division' a 'division.guardar'
      
        $envioDatosBien->assertStatus(302)->assertRedirect(route('divisiones.lista')); // Cambiar 'division' a 'divisiones'
    
        $this->assertDatabaseHas('division', ["codigo"=>"11","nombre" => "IDS"]);
    }

    
    public function test_puestos()
    {
        Artisan::call('migrate');
    
        // Desactivar el middleware de autenticación para la ruta 'nuevo.puesto'
        $this->withoutMiddleware([\App\Http\Middleware\Authenticate::class]);
    
        // Acceder a la página de nuevo.puesto
        $carga = $this->get(route('nuevo.puesto'));
    
        // Verificar que la página se cargue correctamente (código de estado 200)
        $carga->assertStatus(200)->assertSee('puesto');
    
        // Intento de creación de puesto con datos correctos
        $envioDatosBien = $this->post(route('puesto.guardar'), ["codigo"=>"99","nombre" => "Suplente"]);
      
        $envioDatosBien->assertStatus(302)->assertRedirect(route('puestos.lista')); 
    
        // Restaurar el middleware de autenticación para futuras pruebas
        $this->withMiddleware([\App\Http\Middleware\Authenticate::class]);
    }
    

}