<?php
require_once './models/ModelCategoria.php';
require_once './models/ModelProducto.php';
require_once './models/ModelUsuario.php';
require_once './models/ModelImagen.php';
require_once './Helper/HelperSession.php';
require_once './views/view.php';

class ControllerProducto
{

    private $view;
    private $modelProducto;
    private $modelCategoria;
    private $modelUsuario;
    private $modelImagen;
    private $helper;

    function __construct()
    {
        $this->view = new View();
        $this->modelProducto = new ModelProducto();
        $this->modelCategoria = new ModelCategoria();
        $this->modelUsuario = new ModelUsuario();
        $this->modelImagen = new ModelImagen();
        $this->helper = new HelperSession();
    }
    function viewHome()
    {
        $sesion = $this->helper->sesion();
        $this->view->mostrarHome($sesion);
    }
    function viewProductos()
    {
        $productos = $this->modelProducto->getProductosConCategoria();
        $sesion = $this->helper->sesion();
        if (!empty($productos)) {
            $this->view->mostrarProducto($productos, "", $sesion);
        } else
            $this->view->mostrarProducto($productos, "No hay productos");
    }
    function viewProductosPorCategoria($params = null)
    {
        $sesion = $this->helper->sesion();
        $id_categoria = $params[":ID"];
        $productos = $this->modelProducto->getPorCategoria($id_categoria);
        if (!empty($productos))
            $this->view->mostrarProductoPorCategoria($productos, $sesion);
        else
            echo "Error al cargar los productos";
    }
    function viewUnProducto($params = null)
    {
        $id_producto = $params[":ID"];
        $producto = $this->modelProducto->getUnProduto($id_producto);
        $imagenes = $this->modelImagen->getImagenesDeUnProducto($id_producto);
        $sesion = $this->helper->sesion();
        if ($producto != false)
            $this->view->mostrarUnproducto($producto, "", $imagenes, $sesion);
        else
            $this->view->mostrarUnproducto($producto, "Producto no existente");
    }
    function viewContacto()
    {
        $sesion = $this->helper->sesion();
        $this->view->mostrarContacto($sesion);
    }
    function viewUsuario()
    {
        $this->helper->ChequearSesion();
        $sesion = $this->helper->sesionIniciada();
        $usuarios = $this->modelUsuario->getUsuarios();
        $categorias = $this->modelCategoria->getCategorias();
        $productos = $this->modelProducto->getProductosConCategoria();
        $this->view->mostrarUser($productos, $categorias, $usuarios, $sesion);
    }
    function viewAdministrador()
    {
        $this->helper->ChequearAdmi();
        $sesion = $this->helper->sesionIniciada();
        $usuarios = $this->modelUsuario->getUsuarios();
        $this->view->mostrarAdmi($usuarios, $sesion);
    }
    function viewEditar()
    {
        $this->helper->ChequearSesion();
        $sesion = $this->helper->sesionIniciada();
        $categorias = $this->modelCategoria->getCategorias();
        $productos = $this->modelProducto->getProductosConCategoria();
        $this->view->mostrarEditar($productos, $categorias, $sesion);
    }
    function datosDeProducto()
    {
        $this->helper->ChequearSesion();
        if (isset($_REQUEST['aroma'])) {
            $this->modelProducto->insertarProducto($_REQUEST['aroma'], $_REQUEST['precio'], $_REQUEST['id_categoria'], $_REQUEST['propiedad'], $_REQUEST['duracion']);
            if (empty($id_imagen))
                echo "Error al insertar las el producto";
        }
        $this->view->mostrarUserLocation();
    }
    function borrarProductoPorParametro($params = null)
    {
        $this->helper->ChequearSesion();
        $id_producto = $params[":ID"];
        $resultado = $this->modelProducto->borrarProducto($id_producto);
        if (!empty($resultado))
            $this->view->mostrarUserLocation();
        else
            echo "Error al borrar el producto";
    }
    function modificarProductos()
    {
        $this->helper->ChequearSesion();
        if (isset($_REQUEST['aroma'])) {
            $resultado = $this->modelProducto->modificarProducto($_REQUEST['id_producto'], $_REQUEST['aroma'], $_REQUEST['precio'], $_REQUEST['id_categoria'], $_REQUEST['propiedad'], $_REQUEST['duracion']);
            if (empty($resultado))
                echo "Error al modificar el producto";
        }
        $this->view->mostrarEditarLocation();
    }
}
