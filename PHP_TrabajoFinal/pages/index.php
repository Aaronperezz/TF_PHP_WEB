<?php include '../includes/header.php'; ?>
  <main class="pt-5 bg-gradient-blue">
      <div class="container">
        <section class="row text-white align-items-lg-center mb-5">
          <article class="col-12 col-lg-5">
            <h2>¿Necesitas un increíble sitio web?</h2>
            <p class="fs-5">
              Un sitio hermoso, moderno, responsivo y personalizado para tu
              compañia, negocio, marca, servicio o producto.
            </p>
            <a class="btn btn-success btn-lg fw-bold" href="#servicios"
              >¡Sí, empecemos!</a
            >
          </article>
          <article class="col-12 col-lg-7">
            <img
              class="img-fluid"
              src="../img/header-image.png"
              alt="¿Necesitas un increíble sitio web?"
            />
          </article>
          <article class="col-12 col-lg-5 order-lg-1">
            <h2>Sitios web responsivos</h2>
            <p class="fs-5">
              Es importante proporcionar a tus visitantes una experiencia web
              óptima en dispositivos móviles. El diseño web responsivo significa
              que tu sitio se adapta instantáneamente al dispositivo que el
              visitante utiliza. ¡Mi trabajo es hacer, que la visita de tus
              usuarios sea lo más agradable e intuitiva para ellos!
            </p>
          </article>
          <article class="col-12 col-lg-7">
            <img
              class="img-fluid"
              src="../img/header-image-2.png"
              alt="Sitios web responsivos"
            />
          </article>
        </section>
        <!-- seccion de noticias  -->

        <section class="border border-primary p-3 mt-5" id="news-section">
    <h2 class="text-center mb-4">Últimas noticias TECH</h2>
    <div id="news-container">
        <?php 
        $include_only_content = true;
        include 'noticias.php'; ?>
    </div>
</section>

        <!--    seccion 3ra de clientes satisfechos -->

        <div class="container">
          <section class="row g-0">
            <article class="col-12 text-center pt-5">
              <h1 class="text-white">Clientes & Colaboraciones</h1>
              <p class="fs-5 text-white">
                Aquí hay una selección de clientes felices y hermosos proyectos.
              </p>
            </article>

            <!-- Cliente 1 -->
            <article class="col-12">
              <div class="card text-bg-dark border-0 rounded-0">
                <img
                  src="../img/clients-1.jpg"
                  class="card-img"
                  alt="Andy Pandharikar"
                />
                <div
                  class="card-img-overlay bg-second-alpha-color d-flex flex-column justify-content-md-center"
                >
                  <h5 class="card-title">Andy Pandharikar</h5>
                  <p class="card-text">
                    <small>CEO/Co-fundador, Commerce AI</small><br />
                    <a
                      class="text-success"
                      href="#"
                      data-bs-toggle="modal"
                      data-bs-target="#cliente-1"
                      >Ver Proyecto</a
                    >
                  </p>
                  <p class="card-text"></p>
                  <blockquote class="d-none d-md-block">
                    No estábamos satisfechos con ninguna de nuestras opciones
                    anteriores. Pero Alpha Digital Media tuvo lo que teníamos en
                    mente.
                  </blockquote>
                  <!--  </p>  -->
                </div>
              </div>
            </article>

            <!-- Modal Cliente 1 -->
            <div
              class="modal fade"
              id="cliente-1"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">
                      <a href="https://www.commerce.ai/" target="_blank"
                        >Commerce AI</a
                      >
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <p>
                      Posicioné una nueva marca comercial (en línea) y diseñé un
                      sitio web adaptado y hecho a medida.
                    </p>
                    <img
                      src="../img/proyecto-1.jpg"
                      alt="Commerce AI"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- Cliente 2 -->
            <article class="col-12 col-sm-6 col-lg-4">
              <div class="card text-bg-dark border-0 rounded-0">
                <img src="../img/clients-2.jpg" class="card-img" alt="Zeb Couch" />
                <div
                  class="card-img-overlay bg-second-alpha-color d-flex flex-column justify-content-md-center"
                >
                  <h5 class="card-title">Zeb Couch</h5>
                  <p class="card-text">
                    <small>Dueño de Zeb Couch</small><br />
                    <a
                      class="text-success"
                      href="#"
                      data-bs-toggle="modal"
                      data-bs-target="#cliente-2"
                      >Ver Proyecto</a
                    >
                  </p>
                  <p class="card-text"></p>
                  <blockquote class="d-none d-md-block">
                    He trabajado con Alpha Digital Media en varios proyectos
                    ahora y seguiré trabajando siempre que pueda.
                  </blockquote>
                  <!--- </p> -->
                </div>
              </div>
            </article>

            <!-- Modal Cliente 2 -->
            <div
              class="modal fade"
              id="cliente-2"
              tabindex="-1"
              aria-labelledby="exampleModalLabel2"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel2">
                      <a
                        href="https://www.newenglandwalkers.com/"
                        target="_blank"
                        >Walkers</a
                      >
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <p>
                      Proyecto relacionado con el diseño de una tienda web
                      personalizada para su padre. El resultado fue un sitio
                      creativo con una tienda en línea.
                    </p>
                    <img
                      src="../img/proyecto-3.jpg"
                      alt="Walkers"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- Cliente 3 -->
            <article class="col-12 col-sm-6 col-lg-4">
              <div class="card text-bg-dark border-0 rounded-0">
                <img
                  src="../img/clients-3.jpg"
                  class="card-img"
                  alt="Lori Knisely"
                />
                <div
                  class="card-img-overlay bg-second-alpha-color d-flex flex-column justify-content-md-center"
                >
                  <h5 class="card-title">Lori Knisely</h5>
                  <p class="card-text">
                    <small>Co-dueña & Diseñadora de Hey Textile</small><br />
                    <a
                      class="text-success"
                      href="#"
                      data-bs-toggle="modal"
                      data-bs-target="#cliente-3"
                      >Ver Proyecto</a
                    >
                  </p>
                  <p class="card-text"></p>
                  <blockquote class="d-none d-md-block">
                    El equipo de Alpha Digital Media son los mejores.
                  </blockquote>
                  <!--  </p> -->
                </div>
              </div>
            </article>

            <!-- Modal Cliente 3 -->
            <div
              class="modal fade"
              id="cliente-3"
              tabindex="-1"
              aria-labelledby="exampleModalLabel3"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel3">
                      <a href="https://www.heytextile.com/" target="_blank"
                        >Hey Textile</a
                      >
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <p>
                      Un proyecto divertido y creativo, donde trabajamos juntos
                      para crear un sitio web único que refleja las ideas del
                      cliente.
                    </p>
                    <img
                      src="../img/proyecto_2.jpg"
                      alt="Hey Textile"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- Cliente 4 -->
            <article class="col-12 col-sm-6 col-lg-4">
              <div class="card text-bg-dark border-0 rounded-0">
                <img src="../img/clients-4.jpg" class="card-img" alt="Tom Allan" />
                <div
                  class="card-img-overlay bg-second-alpha-color d-flex flex-column justify-content-md-center"
                >
                  <h5 class="card-title">Tom Allan</h5>
                  <p class="card-text">
                    <small>Co-fundador & Director, Basis Networks</small><br />
                    <a
                      class="text-success"
                      href="#"
                      data-bs-toggle="modal"
                      data-bs-target="#cliente-4"
                      >Ver Proyecto</a
                    >
                  </p>
                  <p class="card-text"></p>
                  <blockquote class="d-none d-md-block">
                    Definitivamente continuaremos usando los servicios de Alpha
                    Digital Media para nuestros proyectos futuros.
                  </blockquote>
                  <!--  </p> -->
                </div>
              </div>
            </article>

            <!-- Modal Cliente 4 -->
            <div
              class="modal fade"
              id="cliente-4"
              tabindex="-1"
              aria-labelledby="exampleModalLabel4"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel4">
                      <a
                        href="https://www.basisnetworks.com.au/"
                        target="_blank"
                        >Basis Networks</a
                      >
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <p>
                      Rediseño completo de su sitio web y adaptación para que
                      sea responsivo. El resultado es un sitio web moderno del
                      que ambos estamos orgullosos.
                    </p>
                    <img
                      src="../img/proyecto_6.jpg"
                      alt="Basis Networks"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- Cliente 5 -->
            <article class="col-12 col-sm-6 col-lg-4">
              <div class="card text-bg-dark border-0 rounded-0">
                <img src="../img/clients-5.jpg" class="card-img" alt="Jin Choeh" />
                <div
                  class="card-img-overlay bg-second-alpha-color d-flex flex-column justify-content-md-center"
                >
                  <h5 class="card-title">Jin Choeh</h5>
                  <p class="card-text">
                    <small>Co-founder & CEO Swingvy</small><br />
                    <a
                      class="text-success"
                      href="#"
                      data-bs-toggle="modal"
                      data-bs-target="#cliente-5"
                      >Ver Proyecto</a
                    >
                  </p>
                  <p class="card-text"></p>
                  <blockquote class="d-none d-md-block">
                    Alpha Digital Media cumplio con lo establecido.
                  </blockquote>
                  <!--  </p> -->
                </div>
              </div>
            </article>

            <!-- Modal Cliente 5 -->
            <div
              class="modal fade"
              id="cliente-5"
              tabindex="-1"
              aria-labelledby="exampleModalLabel5"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel5">
                      <a href="https://www.swingvy.com/" target="_blank"
                        >Swingvy</a
                      >
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <p>
                      Proyectos web continuos con Shale Capital Group desde
                      2014. Varios rediseños y marcas han demostrado la calidad
                      y compromiso del equipo.
                    </p>
                    <img
                      src="../img/proyecto_7.jpg"
                      alt="Swingvy"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- Cliente 6 -->
            <article class="col-12 col-sm-6 col-lg-4">
              <div class="card text-bg-dark border-0 rounded-0">
                <img
                  src="../img/clients-7.jpg"
                  class="card-img"
                  alt="Sietse Kingma"
                />
                <div
                  class="card-img-overlay bg-second-alpha-color d-flex flex-column justify-content-md-center"
                >
                  <h5 class="card-title">Sietse Kingma</h5>
                  <p class="card-text">
                    <small>Co-fundador Bambuu BV</small><br />
                    <a
                      class="text-success"
                      href="#"
                      data-bs-toggle="modal"
                      data-bs-target="#cliente-7"
                      >Ver Proyecto</a
                    >
                  </p>
                  <p class="card-text"></p>
                  <blockquote class="d-none d-md-block">
                    Alpha Digital Media crea sitios impresionantes, estrategias
                    increíbles y mucho más.
                  </blockquote>
                  <!--  </p> -->
                </div>
              </div>
            </article>

            <!-- Modal Cliente 6 -->
            <div
              class="modal fade"
              id="cliente-7"
              tabindex="-1"
              aria-labelledby="exampleModalLabel6"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel6">
                      <a href="https://www.bambuu.nl/" target="_blank"
                        >Bambuu</a
                      >
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <p>
                      Proyectos continuos con Bambuu BV desde 2014, siempre
                      buscando ofrecer calidad en cada nuevo desafío. Un cliente
                      de largo recorrido.
                    </p>
                    <img
                      src="../img/proyecto-5.jpg"
                      alt="Bambuu"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <!--  seccion 4ta tarjetas +info -->
        <section id="servicios" class="row align-items-lg-center min-vh-100">
          <article class="col-12 col-md-6 col-lg-3 d-flex">
            <div class="card mx-auto mb-3" style="width: 18rem">
              <img
                src="../img/icon-sites.png"
                class="card-img-top bg-third-color"
                alt="Nuevo sitio web"
              />
              <div class="card-body">
                <h5 class="card-title">Nuevo sitio web</h5>
                <p class="card-text">
                  ¿Necesitas un sitio web? calcula tu presupuesto segun tus
                  nececidades.
                </p>
                <a href="#" class="text-third">
                  Más detalles
                  <i class="bi bi-chevron-right"></i>
                </a>
              </div>
            </div>
          </article>
          <article class="col-12 col-md-6 col-lg-3 d-flex">
            <div class="card mx-auto mb-3" style="width: 18rem">
              <img
                src="../img/icon-clients.png"
                class="card-img-top bg-third-color"
                alt="Clientes"
              />
              <div class="card-body">
                <h5 class="card-title">Galeria</h5>
                <p class="card-text">
                  Conoce algunos de nuestros proyectos realizados.
                </p>
                <a href="#" class="text-third">
                  Más detalles
                  <i class="bi bi-chevron-right"></i>
                </a>
              </div>
            </div>
          </article>
          <article class="col-12 col-md-6 col-lg-3 d-flex">
            <div class="card mx-auto mb-3" style="width: 18rem">
              <img
                src="../img/icon-workflow.png"
                class="card-img-top bg-third-color"
                alt="Flujo de Trabajo"
              />
              <div class="card-body">
                <h5 class="card-title">¿Interesado?</h5>
                <p class="card-text">
                  Visita nuestras instalaciones, vamos a conocernos y
                  escucharte.
                </p>
                <a href="#" class="text-third">
                  Más detalles
                  <i class="bi bi-chevron-right"></i>
                </a>
              </div>
            </div>
          </article>
          <article class="col-12 col-md-6 col-lg-3 d-flex">
            <div class="card mx-auto mb-3" style="width: 18rem">
              <img
                src="../img/icon-sites.png"
                class="card-img-top bg-third-color"
                alt="¿Interesado?"
              />
              <div class="card-body">
                <h5 class="card-title">Proximamente</h5>
                <p class="card-text">nueva seccion.</p>
                <a href="#" class="text-third">
                  Más detalles
                  <i class="bi bi-chevron-right"></i>
                </a>
              </div>
            </div>
          </article>
        </section>
      </div>
    </main>
<?php include '../includes/footer.php'; ?>