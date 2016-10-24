<?php

return function($site, $pages, $page) {

  if ($page->redirect()->isNotEmpty() && ($p = page($page->redirect()->value()))) {
    // if 'redirect to page' is set (and exists), go for it
    $redirect = $p->url();
  }
  elseif ($page->external()->isNotEmpty()) {
    // if 'external url' is set, go for it
    $redirect = $page->external()->value();
  }
  elseif ($page->children()->visible()->count()) {
    // else if page has visible children, redirect to the first one
    $redirect = $page->children()->visible()->first()->url();
  }
  else {
    // fallback: redirect to homepage
    $redirect = $site->homePage()->url();
  }

  return array(
    'redirect' => $redirect,
  );
};
