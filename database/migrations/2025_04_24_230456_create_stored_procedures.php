<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class CreateStoredProcedures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Procedimientos Almacenados para Usuarios
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerUsuarios;
            CREATE PROCEDURE ObtenerUsuarios()
            BEGIN
                SELECT * FROM users;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerUsuariosId;
            CREATE PROCEDURE ObtenerUsuariosId(IN p_id_usuario INT)
            BEGIN
                SELECT * FROM users WHERE id_usuario = p_id_usuario;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarUsuarios;
            CREATE PROCEDURE InsertarUsuarios(
                IN p_nombre VARCHAR(100),
                IN p_apellido VARCHAR(50),
                IN p_correo VARCHAR(100),
                IN p_contraseña VARCHAR(100),
                IN p_telefono VARCHAR(15),
                IN p_direccion VARCHAR(255),
                IN p_rol ENUM("administrador", "gestor", "ganadero")
            )
            BEGIN
                INSERT INTO users (name, last_name, email, password, telefono, direccion, rol)
                VALUES (p_nombre, p_apellido, p_correo, p_contraseña, p_telefono, p_direccion, p_rol);
                SELECT LAST_INSERT_ID() AS id_usuario;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarUsuarios;
            CREATE PROCEDURE ActualizarUsuarios(
                IN p_id_usuario INT,
                IN p_nombre VARCHAR(100),
                IN p_apellido VARCHAR(50),
                IN p_correo VARCHAR(100),
                IN p_contraseña VARCHAR(100),
                IN p_telefono VARCHAR(15),
                IN p_direccion VARCHAR(255),
                IN p_rol ENUM("administrador", "gestor", "ganadero")
            )
            BEGIN
                UPDATE users
                SET name = p_nombre,
                    last_name = p_apellido,
                    email = p_correo,
                    password = p_contraseña,
                    telefono = p_telefono,
                    direccion = p_direccion,
                    rol = p_rol
                WHERE id_usuario = p_id_usuario;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarUsuarios;
            CREATE PROCEDURE EliminarUsuarios(IN p_id_usuario INT)
            BEGIN
                DELETE FROM users WHERE id_usuario = p_id_usuario;
            END
        ');

        // Procedimientos Almacenados para Ganado
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerGanado;
            CREATE PROCEDURE ObtenerGanado()
            BEGIN
                SELECT * FROM ganado;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerGanadoGanadero;
            CREATE PROCEDURE ObtenerGanadoGanadero(in p_id_ganadero INT)
            BEGIN
                SELECT * FROM ganado where id_ganadero = p_id_ganadero;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerGanadoId;
            CREATE PROCEDURE ObtenerGanadoId(IN p_id_vaca INT)
            BEGIN
                SELECT * FROM ganado
                WHERE id_vaca = p_id_vaca;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarGanado;
            CREATE PROCEDURE InsertarGanado(
                IN p_id_ganadero INT,
                IN p_nombre VARCHAR(50),
                IN p_raza VARCHAR(50),
                IN p_edad INT,
                IN p_tipo ENUM("carne", "leche"),
                IN p_fecha_nacimiento DATE
            )
            BEGIN
                INSERT INTO ganado (id_ganadero, nombre, raza, edad, tipo, fecha_nacimiento)
                VALUES (p_id_ganadero, p_nombre, p_raza, p_edad, p_tipo, p_fecha_nacimiento);
                SELECT LAST_INSERT_ID() AS id_vaca;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarGanado;
            CREATE PROCEDURE ActualizarGanado(
                IN p_id_vaca INT,
                IN p_id_ganadero INT,
                IN p_nombre VARCHAR(50),
                IN p_raza VARCHAR(50),
                IN p_edad INT,
                IN p_tipo ENUM("carne", "leche"),
                IN p_fecha_nacimiento DATE
            )
            BEGIN
                UPDATE ganado
                SET id_ganadero = p_id_ganadero,
                    nombre = p_nombre,
                    raza = p_raza,
                    edad = p_edad,
                    tipo = p_tipo,
                    fecha_nacimiento = p_fecha_nacimiento
                WHERE id_vaca = p_id_vaca;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarGanado;
            CREATE PROCEDURE EliminarGanado(IN p_id_vaca INT)
            BEGIN
                DELETE FROM ganado WHERE id_vaca = p_id_vaca;
            END
        ');

        // Procedimientos Almacenados para Alimentación
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerAlimento;
            CREATE PROCEDURE ObtenerAlimento()
            BEGIN
                SELECT * FROM alimentacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerAlimentoGanadero;
            CREATE PROCEDURE ObtenerAlimentoGanadero(in p_id_ganadero INT)
            BEGIN
                SELECT * FROM alimentacion join ganado g on g.id_vaca = alimentacion.id_vaca where g.id_ganadero = p_id_ganadero;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerAlimentoId;
            CREATE PROCEDURE ObtenerAlimentoId(IN p_id_alimentacion INT)
            BEGIN
                SELECT * FROM alimentacion
                WHERE id_alimentacion = p_id_alimentacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarAlimento;
            CREATE PROCEDURE InsertarAlimento(
                IN p_id_vaca INT,
                IN p_plan_alimenticio TEXT,
                IN p_fecha_inicio DATE,
                IN p_fecha_fin DATE
            )
            BEGIN
                INSERT INTO alimentacion (id_vaca, plan_alimenticio, fecha_inicio, fecha_fin)
                VALUES (p_id_vaca, p_plan_alimenticio, p_fecha_inicio, p_fecha_fin);
                SELECT LAST_INSERT_ID() AS id_alimentacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarAlimento;
            CREATE PROCEDURE ActualizarAlimento(
                IN p_id_alimentacion INT,
                IN p_id_vaca INT,
                IN p_plan_alimenticio TEXT,
                IN p_fecha_inicio DATE,
                IN p_fecha_fin DATE
            )
            BEGIN
                UPDATE alimentacion
                SET id_vaca = p_id_vaca,
                    plan_alimenticio = p_plan_alimenticio,
                    fecha_inicio = p_fecha_inicio,
                    fecha_fin = p_fecha_fin
                WHERE id_alimentacion = p_id_alimentacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarAlimento;
            CREATE PROCEDURE EliminarAlimento(IN p_id_alimentacion INT)
            BEGIN
                DELETE FROM alimentacion WHERE id_alimentacion = p_id_alimentacion;
            END
        ');

        // Procedimientos Almacenados para Historial Médico
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerHistorialMedico;
            CREATE PROCEDURE ObtenerHistorialMedico()
            BEGIN
                SELECT * FROM historial_medico;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerHistorialMedicoGanadero;
            CREATE PROCEDURE ObtenerHistorialMedicoGanadero(in p_id_ganadero INT)
            BEGIN
                SELECT * FROM historial_medico join ganado g on g.id_vaca = historial_medico.id_vaca where g.id_ganadero = p_id_ganadero;
            END
            
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerHistorialMedicoId;
            CREATE PROCEDURE ObtenerHistorialMedicoId(IN p_id_historial INT)
            BEGIN
                SELECT * FROM historial_medico 
                WHERE id_historial = p_id_historial;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarHistorialMedico;
            CREATE PROCEDURE InsertarHistorialMedico(
                IN p_id_vaca INT,
                IN p_sintomas TEXT,
                IN p_diagnostico VARCHAR(100),
                IN p_fecha_diagnostico DATE
            )
            BEGIN
                INSERT INTO historial_medico (id_vaca, sintomas, diagnostico, fecha_diagnostico)
                VALUES (p_id_vaca, p_sintomas, p_diagnostico, p_fecha_diagnostico);
                SELECT LAST_INSERT_ID() AS id_historial;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarHistorialMedico;
            CREATE PROCEDURE ActualizarHistorialMedico(
                IN p_id_historial INT,
                IN p_id_vaca INT,
                IN p_sintomas TEXT,
                IN p_diagnostico VARCHAR(100),
                IN p_fecha_diagnostico DATE
            )
            BEGIN
                UPDATE historial_medico
                SET id_vaca = p_id_vaca,
                    sintomas = p_sintomas,
                    diagnostico = p_diagnostico,
                    fecha_diagnostico = p_fecha_diagnostico
                WHERE id_historial = p_id_historial;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarHistorialMedico;
            CREATE PROCEDURE EliminarHistorialMedico(IN p_id_historial INT)
            BEGIN
                DELETE FROM historial_medico WHERE id_historial = p_id_historial;
            END
        ');

        // Procedimientos Almacenados para Tratamientos
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerTratamiento;
            CREATE PROCEDURE ObtenerTratamiento()
            BEGIN
               SELECT * FROM tratamientos;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerTratamientoGanadero;
            CREATE PROCEDURE ObtenerTratamientoGanadero(in p_id_ganadero INT)
            BEGIN
               SELECT * FROM tratamientos 
               join historial_medico hm on hm.id_historial = tratamientos.id_historial 
               join ganado g on g.id_vaca = hm.id_vaca
               where g.id_ganadero = p_id_ganadero;
            END
            
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerTratamientoId;
            CREATE PROCEDURE ObtenerTratamientoId(IN p_id_tratamiento INT)
            BEGIN
                SELECT * FROM tratamientos
                WHERE id_tratamiento = p_id_tratamiento;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarTratamiento;
            CREATE PROCEDURE InsertarTratamiento(
                IN p_id_gestor INT,
                IN p_id_historial INT,
                IN p_descripcion TEXT,
                IN p_fecha_tratamiento DATE
            )
            BEGIN
                INSERT INTO tratamientos (id_gestor, id_historial, descripcion, fecha_tratamiento)
                VALUES (p_id_gestor, p_id_historial, p_descripcion, p_fecha_tratamiento);
                SELECT LAST_INSERT_ID() AS id_tratamiento;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarTratamiento;
            CREATE PROCEDURE ActualizarTratamiento(
                IN p_id_tratamiento INT,
                IN p_id_gestor INT,
                IN p_id_historial INT,
                IN p_descripcion TEXT,
                IN p_fecha_tratamiento DATE
            )
            BEGIN
                UPDATE tratamientos
                SET id_gestor = p_id_gestor,
                    id_historial = p_id_historial,
                    descripcion = p_descripcion,
                    fecha_tratamiento = p_fecha_tratamiento
                WHERE id_tratamiento = p_id_tratamiento;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarTratamiento;
            CREATE PROCEDURE EliminarTratamiento(IN p_id_tratamiento INT)
            BEGIN
                DELETE FROM tratamientos WHERE id_tratamiento = p_id_tratamiento;
            END
        ');

        // Procedimientos Almacenados para Producción
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerProduccionGanadero;
            CREATE PROCEDURE ObtenerProduccionGanadero(in p_id_ganadero INT)
            BEGIN
                SELECT * FROM produccion join ganado g on g.id_vaca = produccion.id_vaca where g.id_ganadero = p_id_ganadero;
            END
            
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerProduccionId;
            CREATE PROCEDURE ObtenerProduccionId(IN p_id_produccion INT)
            BEGIN
                SELECT * FROM produccion 
                WHERE id_produccion = p_id_produccion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarProduccion;
            CREATE PROCEDURE InsertarProduccion(
                IN p_id_vaca INT,
                IN p_tipo ENUM("leche", "carne"),
                IN p_cantidad DECIMAL(10,2),
                IN p_fecha TIMESTAMP
            )
            BEGIN
                INSERT INTO produccion (id_vaca, tipo_produccion, cantidad, fecha)
                VALUES (p_id_vaca, p_tipo, p_cantidad, p_fecha);
                SELECT LAST_INSERT_ID() AS id_produccion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarProduccion;
            CREATE PROCEDURE ActualizarProduccion(
                IN p_id_produccion INT,
                IN p_id_vaca INT,
                IN p_tipo ENUM("leche", "carne"),
                IN p_cantidad DECIMAL(10,2),
                IN p_fecha TIMESTAMP
            )
            BEGIN
                UPDATE produccion
                SET id_vaca = p_id_vaca,
                    tipo_produccion = p_tipo,
                    cantidad = p_cantidad,
                    fecha = p_fecha
                WHERE id_produccion = p_id_produccion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarProduccion;
            CREATE PROCEDURE EliminarProduccion(IN p_id_produccion INT)
            BEGIN
                DELETE FROM produccion WHERE id_produccion = p_id_produccion;
            END
        ');

        // Procedimientos Almacenados para Ventas de Ganado
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerVentasGanado;
            CREATE PROCEDURE ObtenerVentasGanado()
            BEGIN
                SELECT * FROM ventas_ganado;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerVentasGanadoGanadero;
            CREATE PROCEDURE ObtenerVentasGanadoGanadero(in p_id_ganadero INT)
            BEGIN
                SELECT * FROM ventas_ganado where id_vendedor = p_id_ganadero;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerVentasGanadoId;
            CREATE PROCEDURE ObtenerVentasGanadoId(IN p_id_venta INT)
            BEGIN
                SELECT * FROM ventas_ganado 
                WHERE id_venta = p_id_venta;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarVentasGanado;
            CREATE PROCEDURE InsertarVentasGanado(
                IN p_id_vaca INT,
                IN p_id_vendedor INT,
                IN p_id_comprador INT,
                IN p_precio DECIMAL(10,2),
                IN p_fecha_venta TIMESTAMP
            )
            BEGIN
                INSERT INTO ventas_ganado (id_vaca, id_vendedor, id_comprador, precio, fecha_venta)
                VALUES (p_id_vaca, p_id_vendedor, p_id_comprador, p_precio, p_fecha_venta);
                SELECT LAST_INSERT_ID() AS id_venta;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarVentasGanado;
            CREATE PROCEDURE ActualizarVentasGanado(
                IN p_id_venta INT,
                IN p_id_vaca INT,
                IN p_id_vendedor INT,
                IN p_id_comprador INT,
                IN p_precio DECIMAL(10,2),
                IN p_fecha_venta TIMESTAMP
            )
            BEGIN
                UPDATE ventas_ganado
                SET id_vaca = p_id_vaca,
                    id_vendedor = p_id_vendedor,
                    id_comprador = p_id_comprador,
                    precio = p_precio,
                    fecha_venta = p_fecha_venta
                WHERE id_venta = p_id_venta;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarVentasGanado;
            CREATE PROCEDURE EliminarVentasGanado(IN p_id_venta INT)
            BEGIN
                DELETE FROM ventas_ganado WHERE id_venta = p_id_venta;
            END
        ');

        // Procedimientos Almacenados para Ventas de Productos
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerVentas;
            CREATE PROCEDURE ObtenerVentas()
            BEGIN
                SELECT * FROM ventas;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerVentasGanadero;
            CREATE PROCEDURE ObtenerVentasGanadero(in p_id_ganadero INT)
            BEGIN
                SELECT * FROM ventas where id_vendedor = p_id_ganadero;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerVentasId;
            CREATE PROCEDURE ObtenerVentasId(IN p_id_venta INT)
            BEGIN
                SELECT * FROM ventas
                WHERE id_venta = p_id_venta;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarVentas;
            CREATE PROCEDURE InsertarVentas(
                IN p_id_vendedor INT,
                IN p_id_comprador INT,
                IN p_producto ENUM("leche", "carne"),
                IN p_cantidad DECIMAL(10,2),
                IN p_precio DECIMAL(10,2),
                IN p_fecha TIMESTAMP
            )
            BEGIN
                INSERT INTO ventas (id_vendedor, id_comprador, producto, cantidad, precio, fecha_venta)
                VALUES (p_id_vendedor, p_id_comprador, p_producto, p_cantidad, p_precio, p_fecha);
                SELECT LAST_INSERT_ID() AS id_venta;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarVentas;
            CREATE PROCEDURE ActualizarVentas(
                IN p_id_venta INT,
                IN p_id_vendedor INT,
                IN p_id_comprador INT,
                IN p_producto ENUM("leche", "carne"),
                IN p_cantidad DECIMAL(10,2),
                IN p_precio DECIMAL(10,2),
                IN p_fecha TIMESTAMP
            )
            BEGIN
                UPDATE ventas
                SET id_vendedor = p_id_vendedor,
                    id_comprador = p_id_comprador,
                    producto = p_producto,
                    cantidad = p_cantidad,
                    precio = p_precio,
                    fecha_venta = p_fecha
                WHERE id_venta = p_id_venta;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarVentas;
            CREATE PROCEDURE EliminarVentas(IN p_id_venta INT)
            BEGIN
                DELETE FROM ventas WHERE id_venta = p_id_venta;
            END
        ');

        // Procedimientos Almacenados para Publicaciones
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerPublicaciones;
            CREATE PROCEDURE ObtenerPublicaciones()
            BEGIN
                SELECT * FROM publicaciones;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerPublicacionesGanadero;
            CREATE PROCEDURE ObtenerPublicacionesGanadero(in p_id_ganadero INT)
            BEGIN
                SELECT * FROM publicaciones where id_ganadero = p_id_ganadero;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerPublicacionesId;
            CREATE PROCEDURE ObtenerPublicacionesId(IN p_id_publicacion INT)
            BEGIN
                SELECT * FROM publicaciones
                WHERE id_publicacion = p_id_publicacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarPublicaciones;
            CREATE PROCEDURE InsertarPublicaciones(
                IN p_id_ganadero INT,
                IN p_tipo_producto ENUM("leche", "carne"),
                IN p_descripcion TEXT,
                IN p_cantidad DECIMAL(10,2),
                IN p_precio DECIMAL(10,2),
                IN p_estado ENUM("disponible", "vendido"),
                IN p_fecha TIMESTAMP
            )
            BEGIN
                INSERT INTO publicaciones (id_ganadero, tipo_producto, descripcion, cantidad, precio, estado, fecha)
                VALUES (p_id_ganadero, p_tipo_producto, p_descripcion, p_cantidad, p_precio, p_estado, p_fecha);
                SELECT LAST_INSERT_ID() AS id_publicacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarPublicaciones;
            CREATE PROCEDURE ActualizarPublicaciones(
                IN p_id_publicacion INT,
                IN p_id_ganadero INT,
                IN p_tipo_producto ENUM("leche", "carne"),
                IN p_descripcion TEXT,
                IN p_cantidad DECIMAL(10,2),
                IN p_precio DECIMAL(10,2),
                IN p_estado ENUM("disponible", "vendido"),
                IN p_fecha TIMESTAMP
            )
            BEGIN
                UPDATE publicaciones
                SET id_ganadero = p_id_ganadero,
                    tipo_producto = p_tipo_producto,
                    descripcion = p_descripcion,
                    cantidad = p_cantidad,
                    precio = p_precio,
                    estado = p_estado,
                    fecha = p_fecha
                WHERE id_publicacion = p_id_publicacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarPublicaciones;
            CREATE PROCEDURE EliminarPublicaciones(IN p_id_publicacion INT)
            BEGIN
                DELETE FROM publicaciones WHERE id_publicacion = p_id_publicacion;
            END
        ');


        // Procedimientos Almacenados para Publicaciones_ganado
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerPublicacionesG;
            CREATE PROCEDURE ObtenerPublicacionesG()
            BEGIN
                SELECT * FROM publicaciones_ganado;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerPublicacionesGGanadero;
            CREATE PROCEDURE ObtenerPublicacionesGGanadero(in p_id_ganadero INT)
            BEGIN
                SELECT * FROM publicaciones_ganado where id_ganadero = p_id_ganadero;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerPublicacionesGId;
            CREATE PROCEDURE ObtenerPublicacionesGId(IN p_id_publicacion INT)
            BEGIN
                SELECT * FROM publicaciones_ganado
                WHERE id_publicacion = p_id_publicacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarPublicacionesG;
            CREATE PROCEDURE InsertarPublicacionesG(
                IN p_id_vaca INT,
                IN p_id_ganadero INT,
                IN p_precio DECIMAL(10,2),
                IN p_descripcion TEXT,
                IN p_estado ENUM("disponible", "vendido"),
                IN p_fecha TIMESTAMP
                
            )
            BEGIN
                INSERT INTO publicaciones_ganado (id_vaca, id_ganadero, precio, descripcion, estado, fecha)
                VALUES (p_id_vaca, p_id_ganadero,p_precio, p_descripcion, p_estado, p_fecha);
                SELECT LAST_INSERT_ID() AS id_publicacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarPublicacionesG;
            CREATE PROCEDURE ActualizarPublicacionesG(
                IN p_id_publicacion INT,
                IN p_id_vaca INT,
                IN p_id_ganadero INT,
                IN p_precio DECIMAL(10,2),
                IN p_descripcion TEXT,
                IN p_estado ENUM("disponible", "vendido"),
                IN p_fecha TIMESTAMP
            )
            BEGIN
                UPDATE publicaciones
                SET id_vaca = p_id_vaca,
                    id_ganadero = p_id_ganadero,
                    precio = p_precio,
                    descripcion = p_descripcion,
                    estado = p_estado,
                    fecha = p_fecha
                WHERE id_publicacion = p_id_publicacion;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarPublicacionesG;
            CREATE PROCEDURE EliminarPublicacionesG(IN p_id_publicacion INT)
            BEGIN
                DELETE FROM publicaciones_ganado WHERE id_publicacion = p_id_publicacion;
            END
        ');


        // Procedimientos Almacenados para Reportes
        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerReportes;
            CREATE PROCEDURE ObtenerReportes()
            BEGIN
                SELECT * FROM reportes;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerReportesGanadero;
            CREATE PROCEDURE ObtenerReportesGanadero(in p_id_ganadero INT)
            BEGIN
                SELECT * FROM reportes where id_ganadero = p_id_ganadero;
            END
        ');


        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerReportesId;
            CREATE PROCEDURE ObtenerReportesId(IN p_id_reporte INT)
            BEGIN
                SELECT * FROM reportes
                WHERE id_reporte = p_id_reporte;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS InsertarReportes;
            CREATE PROCEDURE InsertarReportes(
                IN p_id_gestor INT,
                IN p_descripcion TEXT,
                IN p_fecha TIMESTAMP
            )
            BEGIN
                INSERT INTO reportes (id_gestor, descripcion, fecha_reporte)
                VALUES (p_id_gestor, p_descripcion, p_fecha);
                SELECT LAST_INSERT_ID() AS id_reporte;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ActualizarReportes;
            CREATE PROCEDURE ActualizarReportes(
                IN p_id_reporte INT,
                IN p_id_gestor INT,
                IN p_descripcion TEXT,
                IN p_fecha TIMESTAMP
            )
            BEGIN
                UPDATE reportes
                SET id_gestor = p_id_gestor,
                    descripcion = p_descripcion,
                    fecha_reporte = p_fecha
                WHERE id_reporte = p_id_reporte;
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS EliminarReportes;
            CREATE PROCEDURE EliminarReportes(IN p_id_reporte INT)
            BEGIN
                DELETE FROM reportes WHERE id_reporte = p_id_reporte;
            END
        ');


        DB::unprepared('
            DROP PROCEDURE IF EXISTS T_Ganado;
            CREATE PROCEDURE T_Ganado(p_id_ganadero INT)
            BEGIN
                SELECT COUNT(id_vaca) AS total_ganado FROM ganado WHERE id_ganadero = p_id_ganadero;
            END
            
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS Produccion_Leche;
            CREATE PROCEDURE Produccion_Leche(IN P_id_ganadero INT, OUT total_leche DECIMAL(10,2))
                BEGIN
                    SELECT SUM(cantidad)
                    INTO total_leche
                    FROM produccion
                    WHERE tipo_produccion = "leche"
                    AND id_vaca IN (SELECT id_vaca FROM ganado WHERE id_ganadero = P_id_ganadero);
                END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS Produccion_Carne;
            CREATE PROCEDURE Produccion_Carne(IN P_id_ganadero INT, OUT total_carne DECIMAL(10,2))
                BEGIN
                    SELECT SUM(cantidad)
                    INTO total_carne
                    FROM produccion
                    WHERE tipo_produccion = "carne"
                    AND id_vaca IN (SELECT id_vaca FROM ganado WHERE id_ganadero = P_id_ganadero);
                END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS Total_ingresos;
            CREATE PROCEDURE Total_ingresos(IN P_id_ganadero INT, OUT total_ingresos DECIMAL(10,2))
            BEGIN
                SELECT SUM(precio)
                INTO total_ingresos
                FROM ventas_ganado
                WHERE id_vendedor = P_id_ganadero;
            END
                
        ');

        DB::unprepared('
    DROP PROCEDURE IF EXISTS Total_ganado;
    CREATE PROCEDURE Total_ganado()
    BEGIN
        SELECT COUNT(*) AS total_ganado
        FROM ganado;
    END
');

        DB::unprepared('
    DROP PROCEDURE IF EXISTS Total_Ganaderos;
    CREATE PROCEDURE Total_Ganaderos()
    BEGIN
        SELECT COUNT(*) AS total_ganaderos
        FROM users
        WHERE rol = "ganadero";
    END
');

        DB::unprepared('
    DROP PROCEDURE IF EXISTS Total_Administradores;
    CREATE PROCEDURE Total_Administradores()
    BEGIN
        SELECT COUNT(*) AS total_admins
        FROM users
        WHERE rol = "administrador";
    END
');

        DB::unprepared('
    DROP PROCEDURE IF EXISTS Total_Gestores;
    CREATE PROCEDURE Total_Gestores()
    BEGIN
        SELECT COUNT(*) AS total_gestores
        FROM users
        WHERE rol = "gestor";
    END
');

        DB::unprepared('
    DROP PROCEDURE IF EXISTS Total_Leche;
    CREATE PROCEDURE Total_Leche()
    BEGIN
        SELECT IFNULL(SUM(cantidad), 0) AS total_leche
        FROM ventas
        WHERE producto = "leche";
    END
');

        DB::unprepared('
    DROP PROCEDURE IF EXISTS Total_Carne;
    CREATE PROCEDURE Total_Carne()
    BEGIN
        SELECT IFNULL(SUM(cantidad), 0) AS total_carne
        FROM ventas
        WHERE producto = "carne";
    END
');

        DB::unprepared('
        DROP PROCEDURE IF EXISTS ObtenerProduccionMensualPorGanadero;
        

    CREATE PROCEDURE ObtenerProduccionMensualPorGanadero(IN p_id_usuario INT)
    BEGIN
        SELECT 
            DATE_FORMAT(p.fecha, "%Y-%m") AS mes,
            SUM(CASE WHEN p.tipo_produccion = "leche" THEN p.cantidad ELSE 0 END) AS total_leche,
            SUM(CASE WHEN p.tipo_produccion = "carne" THEN p.cantidad ELSE 0 END) AS total_carne
        FROM 
            produccion p
        INNER JOIN ganado g ON p.id_vaca = g.id_vaca
        WHERE 
            g.id_ganadero = p_id_usuario
        GROUP BY 
            DATE_FORMAT(p.fecha, "%Y-%m")
        ORDER BY 
            mes;
    END


        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS ObtenerVentasMensualesPorGanadero;
        
    CREATE PROCEDURE ObtenerVentasMensualesPorGanadero(IN p_id_usuario INT)
    BEGIN
        -- Temporary table to store all monthly sales data
        CREATE TEMPORARY TABLE IF NOT EXISTS temp_ventas_mensuales (
            mes VARCHAR(7),
            venta_leche DECIMAL(12,2) DEFAULT 0,
            venta_carne DECIMAL(12,2) DEFAULT 0,
            venta_ganado DECIMAL(12,2) DEFAULT 0,
            total_ventas DECIMAL(12,2) DEFAULT 0
        );
        
        -- Insert milk and meat sales from ventas table
        INSERT INTO temp_ventas_mensuales (mes, venta_leche, venta_carne, total_ventas)
        SELECT 
            DATE_FORMAT(v.fecha_venta, "%Y-%m") AS mes,
            SUM(CASE WHEN v.producto = "leche" THEN v.cantidad * v.precio ELSE 0 END) AS venta_leche,
            SUM(CASE WHEN v.producto = "carne" THEN v.cantidad * v.precio ELSE 0 END) AS venta_carne,
            SUM(v.cantidad * v.precio) AS total_ventas
        FROM 
            ventas v
        INNER JOIN ganado g ON v.id_vendedor = p_id_usuario
        WHERE 
            v.id_vendedor = p_id_usuario
        GROUP BY 
            DATE_FORMAT(v.fecha_venta, "%Y-%m");
        
        -- Insert cattle sales from ventas_ganado table
        INSERT INTO temp_ventas_mensuales (mes, venta_ganado, total_ventas)
        SELECT 
            DATE_FORMAT(vg.fecha_venta, "%Y-%m") AS mes,
            SUM(vg.precio) AS venta_ganado,
            SUM(vg.precio) AS total_ventas
        FROM 
            ventas_ganado vg
        INNER JOIN ganado g ON vg.id_vaca = g.id_vaca
        WHERE 
            g.id_ganadero = p_id_usuario
        GROUP BY 
            DATE_FORMAT(vg.fecha_venta, "%Y-%m")
        ON DUPLICATE KEY UPDATE
            venta_ganado = VALUES(venta_ganado),
            total_ventas = total_ventas + VALUES(total_ventas);
        
        -- Combine with production data and return final result
        SELECT 
            COALESCE(v.mes, p.mes) AS mes,
            IFNULL(p.total_leche, 0) AS produccion_leche,
            IFNULL(v.venta_leche, 0) AS venta_leche,
            IFNULL(p.total_carne, 0) AS produccion_carne,
            IFNULL(v.venta_carne, 0) AS venta_carne,
            IFNULL(v.venta_ganado, 0) AS venta_ganado,
            IFNULL(v.total_ventas, 0) AS total_ventas
        FROM 
            temp_ventas_mensuales v
        LEFT JOIN (
            SELECT 
                DATE_FORMAT(p.fecha, "%Y-%m") AS mes,
                SUM(CASE WHEN p.tipo_produccion = "leche" THEN p.cantidad ELSE 0 END) AS total_leche,
                SUM(CASE WHEN p.tipo_produccion = "carne" THEN p.cantidad ELSE 0 END) AS total_carne
            FROM 
                produccion p
            INNER JOIN ganado g ON p.id_vaca = g.id_vaca
            WHERE 
                g.id_ganadero = p_id_usuario
            GROUP BY 
                DATE_FORMAT(p.fecha, "%Y-%m")
        ) p ON v.mes = p.mes
        
        UNION
        
        SELECT 
            COALESCE(p.mes, v.mes) AS mes,
            IFNULL(p.total_leche, 0) AS produccion_leche,
            IFNULL(v.venta_leche, 0) AS venta_leche,
            IFNULL(p.total_carne, 0) AS produccion_carne,
            IFNULL(v.venta_carne, 0) AS venta_carne,
            IFNULL(v.venta_ganado, 0) AS venta_ganado,
            IFNULL(v.total_ventas, 0) AS total_ventas
        FROM 
            (
                SELECT 
                    DATE_FORMAT(p.fecha, "%Y-%m") AS mes,
                    SUM(CASE WHEN p.tipo_produccion = "leche" THEN p.cantidad ELSE 0 END) AS total_leche,
                    SUM(CASE WHEN p.tipo_produccion = "carne" THEN p.cantidad ELSE 0 END) AS total_carne
                FROM 
                    produccion p
                INNER JOIN ganado g ON p.id_vaca = g.id_vaca
                WHERE 
                    g.id_ganadero = p_id_usuario
                GROUP BY 
                    DATE_FORMAT(p.fecha, "%Y-%m")
            ) p
        LEFT JOIN temp_ventas_mensuales v ON p.mes = v.mes
        WHERE v.mes IS NULL
        
        ORDER BY mes;
        
        -- Clean up
        DROP TEMPORARY TABLE IF EXISTS temp_ventas_mensuales;
    END
');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar todos los procedimientos almacenados
        $procedures = [
            'Obtenerusers',
            'ObtenerUsuariosId',
            'InsertarUsuarios',
            'ActualizarUsuarios',
            'EliminarUsuarios',
            'ObtenerGanado',
            'ObtenerGanadoId',
            'InsertarGanado',
            'ActualizarGanado',
            'EliminarGanado',
            'ObtenerAlimento',
            'ObtenerAlimentoId',
            'InsertarAlimento',
            'ActualizarAlimento',
            'EliminarAlimento',
            'ObtenerHistorialMedico',
            'ObtenerHistorialMedicoId',
            'InsertarHistorialMedico',
            'ActualizarHistorialMedico',
            'EliminarHistorialMedico',
            'ObtenerTratamiento',
            'ObtenerTratamientoId',
            'InsertarTratamiento',
            'ActualizarTratamiento',
            'EliminarTratamiento',
            'ObtenerProduccion',
            'ObtenerProduccionId',
            'InsertarProduccion',
            'ActualizarProduccion',
            'EliminarProduccion',
            'ObtenerVentasGanado',
            'ObtenerVentasGanadoId',
            'InsertarVentasGanado',
            'ActualizarVentasGanado',
            'EliminarVentasGanado',
            'ObtenerVentas',
            'ObtenerVentasId',
            'InsertarVentas',
            'ActualizarVentas',
            'EliminarVentas',
            'ObtenerPublicaciones',
            'ObtenerPublicacionesId',
            'InsertarPublicaciones',
            'ActualizarPublicaciones',
            'EliminarPublicaciones',
            'ObtenerReportes',
            'ObtenerReportesId',
            'InsertarReportes',
            'ActualizarReportes',
            'EliminarReportes',
            'T_Ganado',
            'Produccion_Leche',
            'Total_ingresos',
            'Produccion_Carne',
            'Total_ganado',
            'Total_Ganaderos',
            'Total_Administradores',
            'Total_Gestores',
            'Total_Leche',
            'Total_Carne',
            'ObtenerProduccionMensualPorGanadero',
            'ObtenerGanadoGanadero',
            'ObtenerAlimentoGanadero',
            'ObtenerHistorialMedicoGanadero',
            'ObtenerTratamientoGanadero',
            'ObtenerProduccionGanadero',
            'ObtenerVentasGanadero',
            'ObtenerPublicacionesGanadero',
            'ObtenerPublicacionesGGanadero',
            'ObtenerVentasGanadoGanadero',
            'ObtenerReportesGanadero',
            
        
        ];

        foreach ($procedures as $procedure) {
            DB::unprepared("DROP PROCEDURE IF EXISTS $procedure");
        }
    }
}
