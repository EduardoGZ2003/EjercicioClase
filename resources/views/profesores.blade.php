@extends('adminlte::page')
@section('title','Profesores')
<style>
    .btn-neon{
    position: relative;
    display: inline-block;
    padding: 15px 30px;
    color:white;
    background-color: black;
    letter-spacing: 4px;
    text-decoration: none;
    font-size: 10px;
    overflow: hidden;
    transition: 0.2s;
    border-radius: 10px;
    }
    .btn-neon:hover{
        background: #a20202;
        box-shadow: 0 0 2.5px #bb0b0b, 0 0 10px #bb0b0b, 0 0 20px #bb0b0b;
        transition-delay: 1s;
    }
    .btn-neon span{
        position: absolute;
        display: block;
    }
    #span1{
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent,white);
        
    }
    .btn-neon:hover #span1{
        left: 100%;
        transition: 1s;
    }
    #span3{
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent,white);
    }
    .btn-neon:hover #span3{
        right: 100%;
        transition: 1s;
        transition-delay: 0.5s;
    }
    #span2{
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg,transparent,white);
    }
    .btn-neon:hover #span2{
        top: 100%;
        transition: 1s;
        transition-delay: 0.25s;
    }
    #span4{
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg,transparent,white);
    }
    .btn-neon:hover #span4{
        bottom: 100%;
        transition: 1s;
        transition-delay: 0.75s;
    }


    .btn-neon2{
    position: relative;
    display: inline-block;
    padding: 15px 30px;
    color:white;
    background-color: black;
    letter-spacing: 4px;
    text-decoration: none;
    font-size: 10px;
    overflow: hidden;
    transition: 0.2s;
    border-radius: 10px;
    }
    .btn-neon2:hover{
        background: forestgreen;
        box-shadow: 0 0 2.5px forestgreen, 0 0 10px forestgreen, 0 0 20px forestgreen;
        transition-delay: 1s;
    }
    .btn-neon2 span{
        position: absolute;
        display: block;
    }
    #span1{
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent,white);
        
    }
    .btn-neon2:hover #span1{
        left: 100%;
        transition: 1s;
    }
    #span3{
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent,white);
    }
    .btn-neon2:hover #span3{
        right: 100%;
        transition: 1s;
        transition-delay: 0.5s;
    }
    #span2{
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg,transparent,white);
    }
    .btn-neon2:hover #span2{
        top: 100%;
        transition: 1s;
        transition-delay: 0.25s;
    }
    #span4{
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg,transparent,white);
    }
    .btn-neon2:hover #span4{
        bottom: 100%;
        transition: 1s;
        transition-delay: 0.75s;
    }
</style>
@section('content')

<br>

    <div>
                <h3 class="text-center">Profesores</h3>
            </div>

        </div>
        <div class="box-body">
            <table id="table-data" class="table table-bordered">
            <thead>
                    <tr>
                        <th style="text-align: center">Número</th>
                        <th style="text-align: center">Nombre</th>
                        <th style="text-align: center">División</th>
                        <th style="text-align: center">Puesto</th>
                        <th style="text-align: center">Usuario</th>
                        <th style="width:22%; height:22%; text-align:center" colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($profesores as $profesor)
                <tr>
                    <td>{{$profesor['numero']}}</td>
                    <td>{{$profesor['nombre']}}</td>
                    <td>{{$profesor->division->nombre}}</td>
                    <td>{{$profesor->nombre_puesto}}</td>
                    <td>{{$profesor->nombre_usuario}}</td>
                    
                    <td>
                          
                          <a href="{{route('nuevo.profesor',['id' => $profesor['id']])}}" >
                          <button class="btn-neon2" type="submit">
                                <span id="span1"></span>
                                <span id="span2"></span>
                                <span id="span3"></span>
                                <span id="span4"></span>
                                
                                Editar</button>
                                  <!--<span class=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPdJREFUSEvVldERgkAMRLOdYCfSiVaiVqKdSClnJdFlgImR4wLCB/fDMBz7ktzOHmTjhY31ZTWAqt5F5AXgaov+AqjqUUS4sSp0VgNo+j2d+Kl7v1mIBzxFhJCp5cVZDP+zRQ0QD1Aq41NC5GxUtQKQ+HSQM4BHq2WFVDUM6MbCbtmRhbD6VnwxwM089ZCxrmd34MR7zQTg8DcgI07dYeYeEu4gKk6rWwuHAHPE6SbrwiIgKs7RjLkwAmit69bozNcCZA90DUBWfPGIIpFhQu8nCYpnsDtAJK5LTTUA6lzYMR0vgTshB2Hw0QjDZRTK/VLJU9/3D3gDazjBGbL5ohcAAAAASUVORK5CYII="/> Editar </span>-->
                              </a>

                      </td>
                      <td>
                                <a>
                                <form class="formulario-borrar" action="{{route('profesor.borrar',['id' => $profesor['id']])}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-neon" type="submit">
                                        <span id="span1"></span>
                                        <span id="span2"></span>
                                        <span id="span3"></span>
                                        <span id="span4"></span>
                                        Eliminar</button>

                                        <!--<span class=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAJRJREFUSEvtlcENgCAMRfs301GcRJ1MRnGTag8kSoBaAh6UHhvyX/uBFtQ40FifVAAzD0S0JQpZASy5IrMARVx0dyKaALgU5AZgZq5hGc62vM67gBrVhxrROyi16mpN1CKf/BbAtx12FcsXWdQB6jPtFv3AIssAtHw02WCyySzhAIxPp6mIzwZIcrOpO9nSQuxsc8ABQHeaGbkbfj0AAAAASUVORK5CYII="/> Eliminar</span>-->
                                    </button>
                                
                                </form>
                                </a>
                            
                        </td>    
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    @endsection

    @section('js')
    <script>
        $('#table-data').DataTable({
            "scrollX": true
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.formulario-borrar').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: "¿Estás seguro de eliminar el registro?",
        text: "No se podrá recuperar después.",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Sí, deseo eliminar el registro!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "¡Eliminado!",
                text: "El registro fue eliminado correctamente.",
                icon: "success"
            });
            this.submit();
        }
        else{
            Swal.fire({
                title: "¡No eliminado!",
                text: "Se canceló de forma correcta.",
                icon: "error"
            });
        }
    });
});
</script>

    @stop