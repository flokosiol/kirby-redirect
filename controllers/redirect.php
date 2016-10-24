<?php

return function($site, $pages, $page) {

  if ($page->redirect()->isNotEmpty() && ($p = page($this->redirect()->value()))) {
    // if 'redirect to page' is set (and exists), go for it
    $redirect = $p->redirect()->url();
  }
  elseif (!$page->external()->empty()) {
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
