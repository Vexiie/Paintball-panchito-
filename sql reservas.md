CREATE DATABASE sistema_reservas;

USE sistema_reservas;

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100),
    fecha DATE,
    hora TIME,
    detalles TEXT
);

INSERT INTO reservas (cliente, fecha, hora, detalles)
VALUES
    ('lol', '2024-09-01', '14:00:00', 'Reserva para dos personas'),
    ('lol2', '2024-08-15', '18:30:00', 'Reserva para tres personas'),
    ('lol3', '2024-07-20', '12:00:00', 'Reserva para una persona'),
    ('lol4', '2024-08-05', '20:00:00', 'Reserva para cuatro personas');

SELECT * 
FROM reservas 
ORDER BY fecha ASC;

CREATE TABLE Clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100)
);

CREATE TABLE sueldo (
    cliente INT,
    valor DECIMAL(10, 2),
    FOREIGN KEY (cliente) REFERENCES Clientes(id)
);

CREATE PROCEDURE control (
    IN monto DECIMAL(10, 2),
    IN nombre VARCHAR(24)
)
BEGIN
    START TRANSACTION;
    INSERT INTO Clientes(nombre) VALUES (nombre);
    SET vCliente_Id = LAST_INSERT_ID();
    INSERT INTO sueldo (cliente, valor) VALUES (vCliente_Id, monto);
    COMMIT;
END;

