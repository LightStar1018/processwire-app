<?php namespace ProcessWire;

session()->redirect($page->parent->url . "#" . $page->name);
