<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/candidatoEducacion/edit.css') }}">
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Actualizar educacion</title>
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

        <!--------------------------------------------------------------------------------------------------------------------------------------------->

        <section class="contenedor-content">

            <article class="content">
                <article class="contenedor-titulo">
                    <article class="contenedor">
                        <i class="fa-solid fa-rotate-right"></i>
                        <h1>Actualizacion de datos sobre la educacion</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-padre-formulario">
                    <form class="contenedor-formulario"
                        action="{{ route('educacionCandidato.update', ['id' => $candidatoEducacion->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <article class="contenedor-nivel">
                            <h1>Nivel de estudio</h1>
                            <select class="nivel" name="nivel_estudio">
                                <option value="Bachiller" {{ 'Bachiller' == old('nivel_estudio') ? 'selected' : '' }}>
                                    Bachiller</option>
                                <option value="Tecnico" {{ 'Tecnico' == old('nivel_estudio') ? 'selected' : '' }}>
                                    Tecnico
                                </option>
                                <option value="Tecnologo" {{ 'Tecnologo' == old('nivel_estudio') ? 'selected' : '' }}>
                                    Tecnologo</option>
                                <option value="Pregrado" {{ 'Pregrado' == old('nivel_estudio') ? 'selected' : '' }}>
                                    Pregrado
                                </option>
                                <option value="Posgrado" {{ 'Posgrado' == old('nivel_estudio') ? 'selected' : '' }}>
                                    Posgrado
                                </option>
                                <option value="Especializacion"
                                    {{ 'Especializacion' == old('nivel_estudio') ? 'selected' : '' }}>Especializacion
                                </option>
                                <option value="Doctorado" {{ 'Doctorado' == old('nivel_estudio') ? 'selected' : '' }}>
                                    Doctorado</option>
                            </select>
                        </article>

                        <article class="contenedor-institucion">
                            <h1>Institucion egresado</h1>
                            <input class="institucion" type="text" name="institucion"
                                value="{{ old('institucion', $candidatoEducacion->institucion) }}">
                            @error('institucion')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-titulado">
                            <h1>Titulado</h1>
                            <input class="titulado" type="text" name="titulado"
                                value="{{ old('titulado', $candidatoEducacion->titulado) }}">
                            @error('titulado')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-documento">
                            <h1 class="titulo">Diploma</h1>
                            <article class="texto">
                                <i class="fa-solid fa-download" style="color: #000000;"></i>
                                <label for="input">Archivo</label>
                                <input id="input" class="label-input" type="file" name="documento"
                                    value="{{ old('documento', $candidatoEducacion->documento) }}">
                            </article>
                            @error('documento')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-inicio">
                            <h1>Año de inicio</h1>
                            <input class="fecha-inicio" type="date" name="año_inicio"
                                value="{{ old('año_inicio', $candidatoEducacion->año_inicio) }}">
                            @error('año_inicio')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-fin">
                            <h1>Año de finalizacion</h1>
                            <input class="fecha-fin" type="date" name="año_finalizacion"
                                value="{{ old('año_finalizacion', $candidatoEducacion->año_finalizacion) }}">
                            @error('año_finalizacion')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-boton">
                            <a href="{{ route('educacionCandidato.index', ['id' => $candidato->id]) }}">Volver</a>
                            <input class="enviar" type="submit" value="Actualizar">
                        </article>

                    </form>
                </article>
            </article>

            <section class="content-2">
                <article class="contenedor-titulo-2">
                    <article class="contenedor-contenido-2">
                        <i class="fa-solid fa-down-long"></i>
                        <h1>Visualizacion de la actualizacion</h1>
                    </article>
                    <h1 class="linea-2"></h1>
                </article>

                <article class="contenedor-informacion">
                    <article class="informacion">
                        <article class="nivel">
                            <h1>Nivel de estudio</h1>
                            <p>{{ $candidatoEducacion->nivel_estudio }}</p>
                        </article>

                        <article class="institucion">
                            <h1>Institucion egresado</h1>
                            <p>{{ $candidatoEducacion->institucion }}</p>
                        </article>

                        <article class="titulado">
                            <h1>Titulado</h1>
                            <p>{{ $candidatoEducacion->titulado }}</p>
                        </article>

                        <article class="documento">
                            <h1>Documento</h1>
                            @php
                                $ruta = $candidatoEducacion->documento;
                            @endphp
                            <a class="documento-a" href="{{ asset('storage/' . $ruta) }}" target="_blank">Documento</a>
                        </article>

                        <article class="año_inicio">
                            <h1>Año de inicio</h1>
                            <p>{{ $candidatoEducacion->año_inicio }}</p>
                        </article>

                        <article class="año_finalizacion">
                            <h1>Año de finalizacion</h1>
                            <p>{{ $candidatoEducacion->año_finalizacion }}</p>
                        </article>
                    </article>
                </article>
            </section>
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
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="william">
                        <h3>William Lozano</h3>
                        <span>3153504473</span>

                        <section class="apps">
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="peter">
                        <h3>Peter Bustamante</h3>
                        <span>3044479143</span>

                        <section class="apps">
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="capera">
                        <h3>Diego Capera</h3>
                        <span>3005301839</span>

                        <section class="apps">
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
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
