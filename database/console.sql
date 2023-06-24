create database menagerie;
use farmaciaintranet;

# Creación de tablas

CREATE TABLE empleados
(
    id_empleado        INT          NOT NULL AUTO_INCREMENT, # ID del empleado
    nombre             VARCHAR(100) NOT NULL,                # Nombre del empleado
    apellido           VARCHAR(100) NOT NULL,                # Apellido del empleado
    cargo              VARCHAR(100),                         # Cargo del empleado
    fecha_contratacion DATE,                                 # Fecha de contratación del empleado
    salario            DECIMAL(10, 2),                       # Salario del empleado
    PRIMARY KEY (id_empleado)
);

CREATE TABLE usuarios
(
    id_usuario         INT          NOT NULL AUTO_INCREMENT, # ID del usuario
    nombre_usuario     VARCHAR(100) NOT NULL,                # Nombre de usuario
    contrasena         VARCHAR(255) NOT NULL,                # Contraseña del usuario
    id_rol             INT          NOT NULL,                # ID del rol del usuario
    correo_electronico VARCHAR(100) NOT NULL,                # Correo electrónico del usuario
    token_recuperacion VARCHAR(255),                         # Token de recuperación de contraseña
    PRIMARY KEY (id_usuario)
);

CREATE TABLE productos
(
    id_producto         INT          NOT NULL AUTO_INCREMENT, # ID del producto
    nombre              VARCHAR(100) NOT NULL,                # Nombre del producto
    descripcion         VARCHAR(255),                         # Descripción del producto
    precio              DECIMAL(10, 2),                       # Precio del producto
    cantidad_inventario INT          NOT NULL,                # Cantidad en inventario del producto
    id_categoria        INT          NOT NULL,                # ID de la categoría del producto
    disponible_web      TINYINT(1)   NOT NULL,                # Indicador de disponibilidad en la página web
    PRIMARY KEY (id_producto)
);

CREATE TABLE categorias
(
    id_categoria INT          NOT NULL AUTO_INCREMENT, # ID de la categoría
    nombre       VARCHAR(100) NOT NULL,                # Nombre de la categoría
    descripcion  VARCHAR(255),                         # Descripción de la categoría
    PRIMARY KEY (id_categoria)
);

CREATE TABLE pedidos
(
    id_pedido    INT  NOT NULL AUTO_INCREMENT, # ID del pedido
    fecha        DATE NOT NULL,                # Fecha del pedido
    id_proveedor INT  NOT NULL,                # ID del proveedor asociado al pedido
    PRIMARY KEY (id_pedido)
);

CREATE TABLE detalle_pedido
(
    id_detalle      INT            NOT NULL AUTO_INCREMENT, # ID del detalle de pedido
    id_pedido       INT            NOT NULL,                # ID del pedido asociado
    id_producto     INT            NOT NULL,                # ID del producto asociado
    cantidad        INT            NOT NULL,                # Cantidad del producto en el pedido
    precio_unitario DECIMAL(10, 2) NOT NULL,                # Precio unitario del producto en el pedido
    PRIMARY KEY (id_detalle)
);

CREATE TABLE proveedores
(
    id_proveedor       INT          NOT NULL AUTO_INCREMENT, # ID del proveedor
    nombre             VARCHAR(100) NOT NULL,                # Nombre del proveedor
    direccion          VARCHAR(255),                         # Dirección del proveedor
    correo_electronico VARCHAR(100),                         # Correo electrónico del proveedor
    telefono           VARCHAR(20),                          # Teléfono del proveedor
    PRIMARY KEY (id_proveedor)
);

CREATE TABLE calendario
(
    id_evento   INT  NOT NULL AUTO_INCREMENT, # ID del evento en el calendario
    fecha       DATE NOT NULL,                # Fecha del evento
    descripcion VARCHAR(255),                 # Descripción del evento
    id_usuario  INT  NOT NULL,                # ID del usuario asociado al evento
    PRIMARY KEY (id_evento)
);

CREATE TABLE ventas
(
    id_venta         INT            NOT NULL AUTO_INCREMENT, # ID de la venta
    fecha            DATE           NOT NULL,                # Fecha de la venta
    id_producto      INT            NOT NULL,                # ID del producto vendido
    id_cliente       INT            NOT NULL,                # ID del cliente asociado a la venta
    id_empleado      INT            NOT NULL,                # ID del empleado que realizó la venta
    cantidad_vendida INT            NOT NULL,                # Cantidad vendida del producto
    precio_unitario  DECIMAL(10, 2) NOT NULL,                # Precio unitario del producto en la venta
    PRIMARY KEY (id_venta)
);

CREATE TABLE clientes
(
    id_cliente         INT          NOT NULL AUTO_INCREMENT, # ID del cliente
    nombre             VARCHAR(100) NOT NULL,                # Nombre del cliente
    apellido           VARCHAR(100) NOT NULL,                # Apellido del cliente
    direccion          VARCHAR(255),                         # Dirección del cliente
    correo_electronico VARCHAR(100),                         # Correo electrónico del cliente
    telefono           VARCHAR(20),                          # Teléfono del cliente
    PRIMARY KEY (id_cliente)
);

CREATE TABLE roles
(
    id_rol      INT          NOT NULL AUTO_INCREMENT, # ID del rol
    nombre      VARCHAR(100) NOT NULL,                # Nombre del rol
    descripcion VARCHAR(255),                         # Descripción del rol
    PRIMARY KEY (id_rol)
);


# Asignación de claves foráneas

ALTER TABLE usuarios
    ADD FOREIGN KEY (id_rol) REFERENCES roles (id_rol);

ALTER TABLE productos
    ADD FOREIGN KEY (id_categoria) REFERENCES categorias (id_categoria);

ALTER TABLE pedidos
    ADD FOREIGN KEY (id_proveedor) REFERENCES proveedores (id_proveedor);

ALTER TABLE detalle_pedido
    ADD FOREIGN KEY (id_pedido) REFERENCES pedidos (id_pedido),
    ADD FOREIGN KEY (id_producto) REFERENCES productos (id_producto);

ALTER TABLE calendario
    ADD FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario);

ALTER TABLE ventas
    ADD FOREIGN KEY (id_producto) REFERENCES productos (id_producto),
    ADD FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente),
    ADD FOREIGN KEY (id_empleado) REFERENCES empleados (id_empleado);



# agregando 5 datos a las tablas#######################################################

# Registros para la tabla "empleados"
INSERT INTO empleados (nombre, apellido, cargo, fecha_contratacion, salario)
VALUES ('Juan', 'Pérez', 'Vendedor', '2021-01-15', 2000.00),
       ('María', 'López', 'Farmacéutico', '2020-03-10', 2500.00),
       ('Pedro', 'González', 'Cajero', '2019-07-20', 1800.00),
       ('Ana', 'Martínez', 'Gerente', '2018-05-01', 3000.00),
       ('Carlos', 'Ramírez', 'Almacenero', '2022-02-05', 1900.00);

# Registros para la tabla "roles"
INSERT INTO roles (nombre, descripcion)
VALUES
    ('Administrador', 'Rol con permisos de administración'),
    ('Vendedor', 'Rol con permisos de venta'),
    ('Farmacéutico', 'Rol con permisos relacionados a medicamentos'),
    ('Cajero', 'Rol con permisos de caja'),
    ('Almacenero', 'Rol con permisos de gestión de inventario');


# Registros para la tabla "usuarios"
INSERT INTO usuarios (nombre_usuario, contrasena, id_rol, correo_electronico, token_recuperacion)
VALUES ('juanz', '123456', 1, 'juan.perez@gmail.com', NULL),
       ('marial', '123456', 2, 'maria.lopez@gmail.com', NULL),
       ('pedrog', '123456', 3, 'pedro.gonzalez@gmail.com', NULL),
       ('anam', '123456', 4, 'ana.martinez@gmail.com', NULL),
       ('carlosr', '123456', 5, 'carlos.ramirez@gmail.com', NULL);

# Registros para la tabla "productos"
INSERT INTO productos (nombre, descripcion, precio, cantidad_inventario, id_categoria, disponible_web)
VALUES ('Paracetamol', 'Analgésico y antipirético', 10.00, 100, 1, 1),
       ('Amoxicilina', 'Antibiótico de amplio espectro', 15.50, 50, 1, 1),
       ('Ibuprofeno', 'Antiinflamatorio no esteroideo', 8.75, 80, 1, 1),
       ('Loratadina', 'Antihistamínico', 7.20, 120, 1, 1),
       ('Omeprazol', 'Inhibidor de la bomba de protones', 12.30, 60, 1, 1);

# Registros para la tabla "categorias"
INSERT INTO categorias (nombre, descripcion)
VALUES ('Medicamentos', 'Productos farmacéuticos'),
       ('Cuidado Personal', 'Productos de higiene y cuidado personal'),
       ('Suplementos', 'Suplementos nutricionales'),
       ('Salud y Bienestar', 'Productos para el cuidado de la salud'),
       ('Hogar y Limpieza', 'Productos para el hogar y limpieza');

# Registros para la tabla "pedidos"
INSERT INTO pedidos (fecha, id_proveedor)
VALUES ('2023-06-10', 1),
       ('2023-06-15', 2),
       ('2023-06-18', 3),
       ('2023-06-20', 4),
       ('2023-06-23', 5);

# Registros para la tabla "detalle_pedido"
INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario)
VALUES (6, 11, 50, 8.50),
       (7, 12, 30, 12.00),
       (8, 13, 20, 7.80),
       (9, 14, 10, 5.50),
       (10, 15, 40, 10.80);

# Registros para la tabla "proveedores"
INSERT INTO proveedores (nombre, direccion, correo_electronico, telefono)
VALUES ('Proveedor A', 'Calle Principal 123', 'proveedorA@example.com', '555-1234'),
       ('Proveedor B', 'Avenida Central 456', 'proveedorB@example.com', '555-5678'),
       ('Proveedor C', 'Boulevard Norte 789', 'proveedorC@example.com', '555-9012'),
       ('Proveedor D', 'Calle Sur 987', 'proveedorD@example.com', '555-3456'),
       ('Proveedor E', 'Avenida Oeste 654', 'proveedorE@example.com', '555-7890');

# Registros para la tabla "calendario"
INSERT INTO calendario (fecha, descripcion, id_usuario)
VALUES ('2023-06-12', 'Reunión de equipo', 11),
       ('2023-06-16', 'Capacitación en ventas', 12),
       ('2023-06-20', 'Entrega de pedidos', 13),
       ('2023-06-22', 'Reunión de gerencia', 14),
       ('2023-06-25', 'Promoción especial', 15);

# Registros para la tabla "ventas"
INSERT INTO ventas (fecha, id_producto, id_cliente, id_empleado, cantidad_vendida, precio_unitario)
VALUES ('2023-06-12', 11, 1, 1, 3, 10.00),
       ('2023-06-14', 12, 2, 2, 2, 15.50),
       ('2023-06-16', 13, 3, 3, 1, 8.75),
       ('2023-06-18', 14, 4, 4, 4, 7.20),
       ('2023-06-20', 15, 5, 5, 2, 12.30);

# Registros para la tabla "clientes"
INSERT INTO clientes (nombre, apellido, direccion, correo_electronico, telefono)
VALUES ('Cliente A', 'Apellido A', 'Direccion 456', 'clienteA@gmail.com', '999-999-999'),
       ('Cliente B', 'Apellido B', 'Direccion 789', 'clienteB@gmail.com', '999-999-999'),
       ('Cliente C', 'Apellido C', 'Direccion 123', 'clienteC@gmail.com', '999-999-999'),
       ('Cliente D', 'Apellido D', 'Direccion 456', 'clienteD@gmail.com', '999-999-999'),
       ('Cliente E', 'Apellido E', 'Direccion 789', 'clienteE@gmail.com', '999-999-999');
