<?php

require_once 'API/ControllerApiProductos.php';
require_once 'API/ControllerApiComentarios.php';
require_once 'ruterclass.php';

$ruter = new Router();

$ruter->addRoute('productos','GET','ControllerApiProductos','viewProductos');
$ruter->addRoute('productos/:ID','GET','ControllerApiProductos','viewUnProducto');
$ruter->addRoute('productos/:ID','DELETE','ControllerApiProductos','deleteProducto');
$ruter->addRoute('productos','POST','ControllerApiProductos','agregarProducto');
$ruter->addRoute('productos','POST','ControllerApiProductos','agregarProductoConImagen');
$ruter->addRoute('productos/:ID','PUT','ControllerApiProductos','modificarProducto');

$ruter->addRoute('comentarios','GET','ControllerApiComentarios','viewComentarios');
$ruter->addRoute('comentarios/:ID','GET','ControllerApiComentarios','viewComentario');
$ruter->addRoute('comentariosDeProducto/:ID','GET','ControllerApiComentarios','viewComentariosDeUnProducto');
$ruter->addRoute('comentarios/:ID','DELETE','ControllerApiComentarios','deleteComentario');
$ruter->addRoute('comentarios','POST','ControllerApiComentarios','agregarComentario');

$ruter->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);