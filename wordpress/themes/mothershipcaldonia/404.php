<?php
/**
 * @package Mothership Caldonia
 */

get_header(); ?>

<main>
  <div class="content--aside">
    <article>
      <h2>Seite nicht gefunden</h2>
      <p>Die angeforderte Seite existiert nicht. Weiter zur <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Startseite</a>.</p>
    </article>
  </div>
</main>

<?php get_footer(); ?>
