<?php

return function($site, $pages, $page) {

  if (!$page->redirect()->empty()) {
    // if 'redirect to page' is set, go for it
    $redirect = $page->redirect()->url();
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