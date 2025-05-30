# 🃏 MagiKTCG - Tienda Online de Cartas Coleccionables

## 📌 Descripción  
**MagiKTCG** es una tienda online especializada en la venta de cartas y productos coleccionables. El proyecto busca ofrecer una plataforma fácil de usar donde los usuarios puedan navegar por el catálogo, buscar colecciones específicas y realizar compras de manera segura. 🛒🎴

## 🎯 Objetivos
- 🌟 Desarrollar un e-commerce funcional para la venta de cartas coleccionables.
- 🎨 Implementar una interfaz intuitiva y responsive pensando en el uso de cualquier visitante.
- 🔐 Crear un sistema de autenticación de usuarios (registro, login, recuperación de contraseña).
- 🗂️ Integrar una base de datos con PHP y MySQL para la gestión de productos y usuarios.
- 🔍 Ofrecer un sistema de filtrado y búsqueda avanzada para los productos.

## 🖥️ Tecnologías Utilizadas
### **Front-End**
- 📝 **HTML5**
- 🎨 **SCSS**
- ⚙️ **JavaScript** (sin frameworks)

### **Back-End**
- 🖥️ **PHP**
- 💾 **MySQL**

### **Herramientas adicionales**
- ⚙️ **Git y GitHub** para control de versiones.
- 🌐 **FontAwesome** para iconos.
- 📨 **Fetch API** para manejo de peticiones asíncronas.
- 💳 Implementación de pagos con  **Paypal** y **Tarjeta de Credito**.

### **Recordatorio**
El trabajo trata sobre **Pokémon** porque es mi pasión y quería combinarlo con algo de mi día a día e infancia, pero igualmente estará hecho para ser una plantilla para cualquier temática. Cambiando fotos y nombres, puede pasar a ser sobre compra y venta de colecciones de **Fútbol**, **WWE**, **Lorcana**, **Dragon Ball**, **One Piece**... ¡O por qué no, de TODO a la vez! 🎉😀

# 🛠️ Esquema E/R - Entidades y relaciones

## 📌 Entidades
- **👤 Usuarios** (id, nombre, email, contraseña, dirección, teléfono)
- **📦 Productos** (id, nombre, descripción, precio, stock, idioma, imagen_url, categoria_id)
- **📂 Categorias** (id, nombre)
- **🛒 Carrito** (id, usuario_id, producto_id, cantidad)
- **📑 Pedidos** (id, usuario_id, fecha, total, estado, metodo_pago_id)
- **📄 Detalles_Pedido** (id, pedido_id, producto_id, cantidad, precio_unitario)
- **💳 Métodos de Pago** (id, nombre, detalles)

## 🔗 Relaciones
- 👤 **Usuarios** ➝ 📑 **Pedidos** **(1:N)** ~ Un usuario puede hacer varios pedidos
- 📑 **Pedidos** ➝ 📄 **Detalles_Pedido** **(1:N)** ~ Un pedido tiene varios productos
- 📦 **Productos** ➝ 📄 **Detalles_Pedido** **(1:N)** ~ Un producto puede estar en varios pedidos
- 👤 **Usuarios** ➝ 🛒 **Carrito** **(1:N)** ~ Un usuario puede tener varios productos en su carrito
- 📦 **Productos** ➝ 🛒 **Carrito** **(1:N)** ~ Un producto puede estar en varios carritos
- 📂 **Categorías** ➝ 📦 **Productos** **(1:N)** ~ Una categoría puede tener varios productos
- 📑 **Pedidos** ➝ 💳 **Métodos de Pago** **(N:1)** ~ Un pedido usa un único método de pago

# 📋 Diagrama de Clases
![uml drawio](https://github.com/user-attachments/assets/a6256997-a842-4acb-88df-b90e3fc20634)

```plantuml
class Usuario {
  - id: int
  - nombre: string
  - email: string
  - contraseña: string
  - dirección: string
  - teléfono: string
}

class Producto {
  - id: int
  - nombre: string
  - descripción: string
  - precio: float
  - stock: int
  - idioma: string
  - imagen_url: string
}

class Categoria {
  - id: int
  - nombre: string
}

class Pedido {
  - id: int
  - usuario_id: int
  - fecha: datetime
  - total: float
  - estado: string
  - metodo_pago_id: int
}

class DetallePedido {
  - id: int
  - pedido_id: int
  - producto_id: int
  - cantidad: int
  - precio_unitario: float
}

class MetodoPago {
  - id: int
  - nombre: string
  - detalles: string
}

class Carrito {
  - id: int
  - usuario_id: int
  - producto_id: int
  - cantidad: int
}

Usuario --> Pedido : realiza
Pedido --> DetallePedido : contiene
Producto --> DetallePedido : aparece_en
Usuario --> Carrito : añade
Producto --> Carrito : está_en
Categoria --> Producto : clasifica
Pedido --> MetodoPago : usa
```

# 🚀 Casos de Uso
- 🔐 **Registrar usuario**
- 🔑 **Iniciar sesión**
- 🛒 **Añadir productos al carrito**
- ⚙️ **Gestionar productos en el carrito**
- 📦 **Realizar pedido**
- 💳 **Procesar pago**
- 🛍️ **Administrar catálogo de productos**
- 📜 **Ver historial de pedidos**
- 🏦 **Gestionar métodos de pago**



    <!--COnsulta SQL Para crear la base de datos y la tabla contacto
    CREATE DATABASE magiktcg;
    USE magiktcg;
    
    CREATE TABLE contacto (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        comentario TEXT NOT NULL,
        fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );-->

<!-- -- Crea la tabla productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    idioma ENUM('english', 'japanese', 'korean', 'spanish') NOT NULL,
    imagen VARCHAR(255) NOT NULL
);

-- Ejemplo de inserciones para cada idioma y sobre
INSERT INTO productos (nombre, precio, idioma, imagen) VALUES
('Brilliant Stars', 5.00, 'english', 'english/brilliant_stars.png'),
('Cosmic Eclipse', 5.00, 'english', 'english/cosmic_eclipse.png'),
('Evolving Skies', 5.00, 'english', 'english/evolving_skies.png'),
('Obsidian Flames', 5.00, 'english', 'english/obsidian_flames.png'),

('Incandescent Arcana', 5.00, 'japanese', 'japanese/incandescent_arcana.png'),
('Paradigm Trigger', 5.00, 'japanese', 'japanese/paradigm_trigger.png'),
('Shiny Treasure EX', 5.00, 'japanese', 'japanese/shiny_treasure_ex.png'),
('VSTAR Universe', 5.00, 'japanese', 'japanese/vstar_universe.png'),

('Dark Phantasma', 5.00, 'korean', 'korean/dark_phantasma.png'),
('Fusion Arts', 5.00, 'korean', 'korean/fusion_arts.png'),
('Lost Abyss', 5.00, 'korean', 'korean/lost_abyss.png'),
('Silver Tempest', 5.00, 'korean', 'korean/silver_tempest.png'),

('Brilliant Stars', 5.00, 'spanish', 'spanish/brilliant_stars.png'),
('Cosmic Eclipse', 5.00, 'spanish', 'spanish/cosmic_eclipse.png'),
('Evolving Skies', 5.00, 'spanish', 'spanish/evolving_skies.png'),
('Obsidian Flames', 5.00, 'spanish', 'spanish/obsidian_flames.png'); -->
