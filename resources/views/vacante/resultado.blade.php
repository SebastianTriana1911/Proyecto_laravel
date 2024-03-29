<!-- VISTA PARA VER TODAS LAS VACANTES QUE TIENE UNA EMPRESA -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/vacante/index.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Resultado busqueda</title>
</head>

<body>
    <main class="page">

        <header class="header">

            <section class="contenedor-logo">
                <span>S</span><span class="s-amarilla">S</span>
            </section>

            <section class="titulo">
                <span>Selection</span>
                <section class="system">System</section>
            </section>

        </header>

        <!---------------------------------------------------------------->

        <nav class="nav">
            <section class="contenedor-nav">
                <article class="contador-vacantes">
                    <h1 class="titulo">Resultados encontrados {{ $contador }}</h1>
                </article>

                <article class="titulo-principal">
                    <article class="contenedor">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <h1 class="titulo">Lista de vacantes relacionadas a tu busqueda</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-input">
                    <form class="buscar" action="{{ route('vacante.buscar', ['id' => $empresa->id]) }}" method="POST">
                        @csrf
                        <input class="input" name="busqueda" type="text" placeholder="Buscar Vacantes"
                            value="{{ $busqueda }}" />
                        <button class="boton">
                            <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                        </button>
                    </form>
                </article>
            </section>
        </nav>

        <!---------------------------------------------------------------->

        <section class="contenedor-content">

            <article class="contenedor-vacante">

                <article class="vacantes">
                    @foreach ($resultado as $resul)
                        <article class="informacion-vacante">


                            <article class="grid-1">
                                <article class="contenedor-codigo">
                                    <h1 class="titulo">{{ $resul->codigo }}</h1>
                                </article>
                            </article>

                            <article class="grid-2">

                                <article class="contenedor-cargo">
                                    <h1 class="titulo">{{ $resul->cargo->cargo }}</h1>
                                </article>

                                <article class="info">
                                    <article class="contenedor-salario">
                                        <h1 class="titulo">$ {{ $resul->salario }}</h1>
                                    </article>

                                    <article class="contenedor-experiencia">
                                        <h1 class="titulo">Experiencia {{ $resul->meses_experiencia }} meses
                                        </h1>
                                    </article>

                                    <article class="contenedor-contrato">
                                        <h1 class="titulo">{{ $resul->tipo_contrato }}</h1>
                                    </article>

                                    <article class="contenedor-lugar">
                                        <h1>{{ $resul->municipio->nombre }}</h1>
                                        <h1>{{ $resul->municipio->departamento->pais->nombre }}</h1>
                                    </article>

                                    <article class="contenedor-num-vac">
                                        <h1 class="titulo"> Num vacantes {{ $resul->num_vacante }}</h1>
                                    </article>

                                    <article class="contenedor-postulados">
                                        @php
                                            $contadorPostulaciones = 0;
                                            foreach ($resul->postulacion as $postulacion) {
                                                $contadorPostulaciones = $contadorPostulaciones + 1;
                                            }
                                        @endphp
                                        <h1 class="titulo"> Postulados {{ $contadorPostulaciones }}</h1>
                                    </article>

                                </article>
                            </article>


                            <article class="contenedor-botones">
                                <a href="{{ route('vacante.show', ['id' => $resul->id, 'empresa' => $empresa->id]) }}"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('vacante.edit', ['id' => $resul->id, 'empresa' => $empresa->id]) }}"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <a
                                    href="{{ route('eduvacante.create', ['vacante' => $resul->id, 'empresa' => $empresa->id]) }}"><i
                                        class="fa-solid fa-plus"></i></a>
                                <form action="{{ route('vacante.destroy', ['id' => $resul->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="boton">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </article>


                        </article>
                    @endforeach
                </article>

                <article class="contenedor-volver">
                    <a class="a" href="{{ route('vacante.index', ['id' => $empresa->id]) }}">Volver</a>
                </article>
            </article>
        </section>

        <!--------------------------------------------------------------------------------------------------------------------------------------------->

        <footer class="footer">
            <section class="contenedor-footer">

                <article class="contenedor-imagen">
                    <img class="logo-png" src="{{ asset('imagenes/Logo-negro.png') }}" alt="Logo" />
                </article>

                <section class="informacion">

                    <article class="sebas">
                        <h3 class="titulo-sebas">Sebastian Triana</h3>
                        <span>3214860900</span>

                        <section class="apps">
                            <a href= "https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href= "https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href= "https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href= "https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="william">
                        <h3>William Lozano</h3>
                        <span>3153504473</span>

                        <section class="apps">
                            <a href= "https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href= "https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href= "https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href= "https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="peter">
                        <h3>Peter Bustamante</h3>
                        <span>3044479143</span>

                        <section class="apps">
                            <a href= "https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href= "https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href= "https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href= "https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="capera">
                        <h3>Diego Capera</h3>
                        <span>3005301839</span>

                        <section class="apps">
                            <a href= "https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href= "https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href= "https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href= "https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                </section>
            </section>
        </footer>
    </main>
</body>

</html>
