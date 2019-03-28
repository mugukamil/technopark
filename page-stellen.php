<?php
/**
 * Template Name: Stellenagebote Page
 * The template for displaying simple pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div class="parallax">
        <div class="content">


          <div class="sidebar__bg"></div>
          <?php get_template_part('template-parts/header/header'); ?>

          <div class="content__bg"><img src="<?php echo get_template_directory_uri() ?>/assets/img/technopark-bg5.jpg" alt=""></div>
          <div class="container">
            <div class="row">
              <div class="content__links"></div>
              <aside class="sidebar content__sidebar">
                <div class="sidebar__in">
                  <div class="content__news news sidebar__content">
                    <?php
                    wp_nav_menu( array(
                      'theme_location' => 'sidebar',
                      'sub_menu' => true,
                      'menu_class' => 'sidebar-menu'
                    ) );
                    ?>

                    <ul class="sidebar__icons">
                      <li class="sidebar__icon sidebar__icon--active"><a href=""><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-map.png" alt="" width="24"></a></li>
                      <li class="sidebar__icon"><a href=""><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-home.png" alt="" width="24"></a></li>
                      <li class="sidebar__icon"><a href=""><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-document.png" alt="" width="24"></a></li>
                      <li class="sidebar__icon"><a href=""></a></li>
                    </ul>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>

        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.02 14.02"><title>Asset 1</title><g id="82e42a77-e530-4c66-a561-1e989194f733" data-name="Layer 2"><g id="9acc505e-c2f2-44b1-9899-ab33eb44bd30" data-name="Layer 1"><polyline points="101.02 2 51.51 11.98 2 2" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="4"/></g></g></svg>

      </div>



<div class="section1">
  <div class="content">

          <?php get_template_part('template-parts/header/header'); ?>
        <div class="container">
          <div class="row">
            <div class="page-content">
              <article class="article">
                <h1 class="article__title">stellen-<br>angebote</h1>
                <div class="article__content">
                  <div class="article__text">
                    <p>Der Technopark Raaba baut auf ein Team von engagierten und motivierten Mitarbeitern. Ein angenehmes Arbeitsklima, angeregter Wissensaustausch mit Kollegen und faire Konditionen liegen dem Technopark Raaba als Arbeitgeber am Herzen.</p>
                    <p>Zur Verstärkung unseres Teams suchen wir ab sofort:</p>
                  </div>
                </div>
              </article>
              <article class="jobs">
                <div class="jobs__muster"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 665.02 568.62" width="662">
                    <g data-name="Layer 2"><text transform="rotate(-37.8 822.661 147.031)" font-size="158.36" fill="#1f3a8b" font-family="Cinzel-Bold,Cinzel" font-weight="700" opacity=".44" data-name="Layer 1">
                        <tspan letter-spacing="-.02em">M</tspan>
                        <tspan x="148.38" y="0">UST</tspan>
                        <tspan x="475.39" y="0" letter-spacing="0">E</tspan>
                        <tspan x="574.68" y="0" letter-spacing="0">R</tspan>
                      </text></g>
                  </svg></div>
                <header class="jobs__header">
                  <p class="jobs__title">Bauingenieur</p>
                  <p class="jobs__subtitle">Technopark Raaba</p>
                </header>
                <div class="job">
                  <p class="job__title">Ihr Aufgabengebiet</p>
                  <ul>
                    <li>Statische Berechnungen von Hoch-, Tief- und Brückenbau</li>
                    <li>Koordination mit Architekten, Bauherren und fachplanende Firmen</li>
                    <li>Außendiensttätigkeiten bei Baubesprechungen, Bewehrungsabnahmen usw.</li>
                  </ul>
                </div>
                <div class="job">
                  <p class="job__title">Ihr Profil</p>
                  <ul>
                    <li>Abgeschlossenes Bauingenieurstudium</li>
                    <li>Gerne auch jene die vor kurzem ihr Bauingenieurstudium abgeschlossen haben und sich in unser Team einarbeiten wollen</li>
                    <li>Teamfähigkeit</li>
                    <li>Interesse an Tragwerken und an der Realisierung komplexer Bauwerke</li>
                  </ul>
                </div>
                <div class="job">
                  <p class="job__title">Wir bieten</p>
                  <ul>
                    <li>Realisierung von interessanten Projekten namhafter Architekten & Bauherren</li>
                    <li>Gute Entwicklungs- und Weiterbildungsmöglichkeiten</li>
                    <li>Flexible Arbeitszeiten</li>
                    <li>Gutes Betriebsklima</li>
                    <li>Attraktives qualifikationsbezogenes Gehalt zwischen 2800 € und 3800 €</li>
                    <li>Sollte ein Wohnungswechsel notwendig sein, unterstützen wir sie gerne</li>
                  </ul>
                </div>
                <div class="jobs__address job">
                  <div class="jobs__row">
                    <div class="jobs__col">
                      <p class="job__title">Standort</p>
                      <p class="jobs__text">Graz, Steiermark</p>
                      <p class="jobs__text">Dr. Auner Straße 22/3</p>
                      <p class="jobs__text">A-8074 Raaba</p>
                    </div>
                    <div class="jobs__col">
                      <div class="jobs__btn"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.56 20.67" width="25">
                            <g data-name="Layer 2">
                              <path d="M4.94 10.25l6.34 4.07 6.34-4.07a.88.88 0 0 0-.95-1.48l-4.51 2.9V.88a.88.88 0 1 0-1.76 0v10.79l-4.51-2.9A.89.89 0 0 0 4.67 9a.87.87 0 0 0 .27 1.21m17.62 4.29v4.09a2.08 2.08 0 0 1-2.08 2.08H2.08A2.08 2.08 0 0 1 0 18.59V14.5a.88.88 0 1 1 1.76 0v4.09a.32.32 0 0 0 .32.32h18.4a.32.32 0 0 0 .32-.32V14.5a.88.88 0 1 1 1.76 0" fill="#1f3a8b" data-name="Layer 1"></path>
                            </g>
                          </svg></button><span>Stellenangebot download</span></div>
                      <div class="jobs__btn"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.44 22.33" width="25">
                            <defs>
                              <style></style>
                            </defs>
                            <g id="Layer_2" data-name="Layer 2">
                              <path id="Layer_1-2" d="M475.36 721.34h9.2v-5.13h-9.2zm-1.6.8v-6.73a.8.8 0 0 1 .8-.8h10.8a.8.8 0 0 1 .8.8v6.73a.8.8 0 0 1-.8.8h-10.8a.8.8 0 0 1-.8-.8m10.8 11.51h-9.2v1.69h9.2zm-9.2-1.76h9.2v-1.69h-9.2zm10.8-2.49v6.74a.8.8 0 0 1-.8.8h-10.8a.8.8 0 0 1-.8-.8v-6.74a.8.8 0 0 1 .8-.8h10.8a.8.8 0 0 1 .8.8m6.52-9.43v11.6a2.08 2.08 0 0 1-2.08 2.08h-1.82a.88.88 0 0 1 0-1.76h1.82a.32.32 0 0 0 .32-.32v-4.92H469v4.92a.32.32 0 0 0 .32.32h1.82a.88.88 0 0 1 0 1.76h-1.82a2.08 2.08 0 0 1-2.08-2.08V720a2.08 2.08 0 0 1 2.08-2.08h1.82a.88.88 0 0 1 0 1.76h-1.82a.32.32 0 0 0-.32.32v4.92h21.92V720a.32.32 0 0 0-.32-.32h-1.82a.88.88 0 0 1 0-1.76h1.82a2.08 2.08 0 0 1 2.08 2.08" transform="translate(-467.24 -714.61)" fill="#1f3a8b" data-name="Layer 1"></path>
                            </g>
                          </svg></button><span>Stellenangebot ausdrucken</span></div>
                    </div>
                  </div>
                </div>
                <div class="jobs__text">
                  <p>Sollten wir Ihr Interesse geweckt haben bei uns mitzuarbeiten, melden Sie sich bitte bezüglich eines Vorstellungsgespräches unter der angeführten Adresse bzw. Telefonnummer, oder per E-Mail.</p>
                  <p>Wir freuen uns auf Ihre Bewerbung!</p>
                </div>
                <div class="jobs__address job">
                  <p class="job__title">Kontakt</p>
                  <p class="jobs__text">Max Mustermann</p>
                  <p class="jobs__text">Telefon: +43 316 29 10 24</p>
                  <p class="jobs__text">Fax: +43 316 29 10 24-15</p>
                  <p class="jobs__text"><a href="">office@wohnpark-raaba.at</a></p>
                </div>
              </article>
              <div class="positions">
                <div class="positions__table">
                  <p class="positions__title">offene Stellen intern</p>
                  <table>
                    <tr>
                      <td>Projektmanager</td>
                      <td>Technopark Raaba</td>
                      <td>Vollzeit</td>
                    </tr>
                    <tr>
                      <td>Bauingenieur</td>
                      <td>Technopark Raaba</td>
                      <td>Teilzeit, 20-30 Stunden</td>
                    </tr>
                  </table>
                </div>
                <div class="positions__table">
                  <p class="positions__title">offene Stellen intern</p>
                  <table>
                    <tr>
                      <td>Bürokauffrau</td>
                      <td>Raiffeisenbank Raaba</td>
                      <td>Teilzeit, 20 Stunden</td>
                    </tr>
                    <tr>
                      <td>Einzelhandelskauffrau</td>
                      <td>Rewe Group</td>
                      <td>Teilzeit, 20-30 Stunden</td>
                    </tr>
                    <tr>
                      <td>Kassiererin</td>
                      <td>Rewe Group</td>
                      <td>Vollzeit</td>
                    </tr>
                    <tr>
                      <td>Bürokauffrau</td>
                      <td>Raiffeisenbank Raaba</td>
                      <td>Teilzeit, 20 Stunden</td>
                    </tr>
                    <tr>
                      <td>Einzelhandelskauffrau</td>
                      <td>Rewe Group</td>
                      <td>Teilzeit, 20-30 Stunden</td>
                    </tr>
                    <tr>
                      <td>Kassiererin</td>
                      <td>Rewe Group</td>
                      <td>Vollzeit</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>





<?php get_footer();
