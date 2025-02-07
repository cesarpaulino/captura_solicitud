-- Crear la base de datos
CREATE DATABASE soporte_tecnico_informatica;

-- Crear la tabla secretarias
CREATE TABLE secretarias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

-- Insertar los datos
INSERT INTO secretarias (nombre) VALUES
('Fabiola'),
('Chayo'),
('Tatiana'),
('Rosy');

-- Crear la tabla hardware
CREATE TABLE hardware (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

-- Insertar los datos
INSERT INTO hardware (nombre) VALUES
('Laptop'),
('PC'),
('Monitor'),
('Mouse'),
('Teclado'),
('Multifuncional'),
('Impresora'),
('Escaner'),
('USB'),
('Nobreak'),
('Otro');

 -- Crear la tabla ubicacion
CREATE TABLE ubicacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

-- Insertar los datos
INSERT INTO ubicacion (nombre) VALUES
('Primer piso ala oriente'),
('Segundpo piso ala poniente'),
('Primer piso ala sur'),
('Segundpo piso ala sur'),
('Planta baja'),
('Sotano'),
('Deportivo'),
('Aldama'); 

-- Crear la tabla tecnicos
CREATE TABLE tecnicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

-- Insertar los datos
INSERT INTO tecnicos (nombre) VALUES
('Ing. Cesar Paulino'),
('Josue Limon'),
('Juan Benitez'),
('Daniel'),
('Arturo Salas'),
('Mario Alberto');
               
-- Crear la tabla
CREATE TABLE direcciones_generales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

-- Insertar los datos
INSERT INTO direcciones_generales (nombre) VALUES
('Jefatura de Alcaldía'),
('Dirección General de Gobierno'),
('Dirección General Jurídica y de Servicios Legales'),
('Dirección General de Administración'),
('Dirección General de Obras y Desarrollo Urbano'),
('Dirección General de Servicios Urbanos'),
('Dirección General de Desarrollo y Bienestar'),
('Dirección General de los Derechos Culturales, Recreativos y Educativos'),
('Dirección General de Seguridad Ciudadana y Protección Civil');
-- Crear el índice en la columna 'nombre'
--CREATE INDEX idx_nombre ON direcciones_generales(nombre);

-- Crear la tabla Dirección General de Gobierno
CREATE TABLE dgg (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direcciones_generales_id INT,
    FOREIGN KEY (direcciones_generales_id) REFERENCES direcciones_generales(id)
);

               
       