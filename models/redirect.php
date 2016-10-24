<?php

class RedirectPage extends Page {

  public function url() {
    if ($this->isExternal()) {
      return $this->external()->value();
    }
    return parent::url();
  }

  public function isExternal() {
    if ($this->redirect()->isEmpty() || (!page($this->redirect()->value()))) {
      return $this->external()->isNotEmpty();
    }

    return false;
  }

}
