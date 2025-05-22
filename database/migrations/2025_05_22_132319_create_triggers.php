<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggers extends Migration
{
    public function up()
    {
        // Trigger para la tabla users
        DB::unprepared('
            DROP TRIGGER IF EXISTS after_users_insert;
            CREATE TRIGGER after_users_insert
            AFTER INSERT ON users
            FOR EACH ROW
            BEGIN
                INSERT INTO bitacora (tabla_afectada, accion, id_registro_afectado, datos_nuevos, usuario_id)
                VALUES ("users", "INSERT", NEW.id_usuario, 
                    JSON_OBJECT(
                        "name", NEW.name,
                        "last_name", NEW.last_name,
                        "email", NEW.email,
                        "telefono", NEW.telefono,
                        "direccion", NEW.direccion,
                        "rol", NEW.rol
                    ), 
                NEW.id_usuario);
            END
        ');

        DB::unprepared('
            DROP TRIGGER IF EXISTS after_users_update;
            CREATE TRIGGER after_users_update
            AFTER UPDATE ON users
            FOR EACH ROW
            BEGIN
                INSERT INTO bitacora (tabla_afectada, accion, id_registro_afectado, datos_anteriores, datos_nuevos, usuario_id)
                VALUES ("users", "UPDATE", NEW.id_usuario, 
                    JSON_OBJECT(
                        "name", OLD.name,
                        "last_name", OLD.last_name,
                        "email", OLD.email,
                        "telefono", OLD.telefono,
                        "direccion", OLD.direccion,
                        "rol", OLD.rol
                    ),
                    JSON_OBJECT(
                        "name", NEW.name,
                        "last_name", NEW.last_name,
                        "email", NEW.email,
                        "telefono", NEW.telefono,
                        "direccion", NEW.direccion,
                        "rol", NEW.rol
                    ),
                NEW.id_usuario);
            END
        ');

        DB::unprepared('
            DROP TRIGGER IF EXISTS after_users_delete;
            CREATE TRIGGER after_users_delete
            AFTER DELETE ON users
            FOR EACH ROW
            BEGIN
                INSERT INTO bitacora (tabla_afectada, accion, id_registro_afectado, datos_anteriores)
                VALUES ("users", "DELETE", OLD.id_usuario, 
                    JSON_OBJECT(
                        "name", OLD.name,
                        "last_name", OLD.last_name,
                        "email", OLD.email,
                        "telefono", OLD.telefono,
                        "direccion", OLD.direccion,
                        "rol", OLD.rol
                    ));
            END
        ');

        // Trigger para la tabla ganado
        DB::unprepared('
            DROP TRIGGER IF EXISTS after_ganado_insert;
            CREATE TRIGGER after_ganado_insert
            AFTER INSERT ON ganado
            FOR EACH ROW
            BEGIN
                INSERT INTO bitacora (tabla_afectada, accion, id_registro_afectado, datos_nuevos, usuario_id)
                VALUES ("ganado", "INSERT", NEW.id_vaca, 
                    JSON_OBJECT(
                        "id_ganadero", NEW.id_ganadero,
                        "nombre", NEW.nombre,
                        "raza", NEW.raza,
                        "edad", NEW.edad,
                        "tipo", NEW.tipo,
                        "fecha_nacimiento", NEW.fecha_nacimiento
                    ), 
                NEW.id_ganadero);
            END
        ');

        DB::unprepared('
            DROP TRIGGER IF EXISTS after_ganado_update;
            CREATE TRIGGER after_ganado_update
            AFTER UPDATE ON ganado
            FOR EACH ROW
            BEGIN
                INSERT INTO bitacora (tabla_afectada, accion, id_registro_afectado, datos_anteriores, datos_nuevos, usuario_id)
                VALUES ("ganado", "UPDATE", NEW.id_vaca, 
                    JSON_OBJECT(
                        "id_ganadero", OLD.id_ganadero,
                        "nombre", OLD.nombre,
                        "raza", OLD.raza,
                        "edad", OLD.edad,
                        "tipo", OLD.tipo,
                        "fecha_nacimiento", OLD.fecha_nacimiento
                    ),
                    JSON_OBJECT(
                        "id_ganadero", NEW.id_ganadero,
                        "nombre", NEW.nombre,
                        "raza", NEW.raza,
                        "edad", NEW.edad,
                        "tipo", NEW.tipo,
                        "fecha_nacimiento", NEW.fecha_nacimiento
                    ),
                NEW.id_ganadero);
            END
        ');

        DB::unprepared('
            DROP TRIGGER IF EXISTS after_ganado_delete;
            CREATE TRIGGER after_ganado_delete
            AFTER DELETE ON ganado
            FOR EACH ROW
            BEGIN
                INSERT INTO bitacora (tabla_afectada, accion, id_registro_afectado, datos_anteriores, usuario_id)
                VALUES ("ganado", "DELETE", OLD.id_vaca, 
                    JSON_OBJECT(
                        "id_ganadero", OLD.id_ganadero,
                        "nombre", OLD.nombre,
                        "raza", OLD.raza,
                        "edad", OLD.edad,
                        "tipo", OLD.tipo,
                        "fecha_nacimiento", OLD.fecha_nacimiento
                    ),
                OLD.id_ganadero);
            END
        ');

        // Trigger para la tabla alimentacion
        DB::unprepared('
            DROP TRIGGER IF EXISTS after_alimentacion_insert;
            CREATE TRIGGER after_alimentacion_insert
            AFTER INSERT ON alimentacion
            FOR EACH ROW
            BEGIN
                DECLARE v_id_ganadero INT;
                
                SELECT id_ganadero INTO v_id_ganadero FROM ganado WHERE id_vaca = NEW.id_vaca;
                
                INSERT INTO bitacora (tabla_afectada, accion, id_registro_afectado, datos_nuevos, usuario_id)
                VALUES ("alimentacion", "INSERT", NEW.id_alimentacion, 
                    JSON_OBJECT(
                        "id_vaca", NEW.id_vaca,
                        "plan_alimenticio", NEW.plan_alimenticio,
                        "fecha_inicio", NEW.fecha_inicio,
                        "fecha_fin", NEW.fecha_fin
                    ), 
                v_id_ganadero);
            END
        ');

        DB::unprepared('
            DROP TRIGGER IF EXISTS after_alimentacion_update;
            CREATE TRIGGER after_alimentacion_update
            AFTER UPDATE ON alimentacion
            FOR EACH ROW
            BEGIN
                DECLARE v_id_ganadero INT;
                
                SELECT id_ganadero INTO v_id_ganadero FROM ganado WHERE id_vaca = NEW.id_vaca;
                
                INSERT INTO bitacora (tabla_afectada, accion, id_registro_afectado, datos_anteriores, datos_nuevos, usuario_id)
                VALUES ("alimentacion", "UPDATE", NEW.id_alimentacion, 
                    JSON_OBJECT(
                        "id_vaca", OLD.id_vaca,
                        "plan_alimenticio", OLD.plan_alimenticio,
                        "fecha_inicio", OLD.fecha_inicio,
                        "fecha_fin", OLD.fecha_fin
                    ),
                    JSON_OBJECT(
                        "id_vaca", NEW.id_vaca,
                        "plan_alimenticio", NEW.plan_alimenticio,
                        "fecha_inicio", NEW.fecha_inicio,
                        "fecha_fin", NEW.fecha_fin
                    ),
                v_id_ganadero);
            END
        ');

        DB::unprepared('
            DROP TRIGGER IF EXISTS after_alimentacion_delete;
            CREATE TRIGGER after_alimentacion_delete
            AFTER DELETE ON alimentacion
            FOR EACH ROW
            BEGIN
                DECLARE v_id_ganadero INT;
                
                SELECT id_ganadero INTO v_id_ganadero FROM ganado WHERE id_vaca = OLD.id_vaca;
                
                INSERT INTO bitacora (tabla_afectada, accion, id_registro_afectado, datos_anteriores, usuario_id)
                VALUES ("alimentacion", "DELETE", OLD.id_alimentacion, 
                    JSON_OBJECT(
                        "id_vaca", OLD.id_vaca,
                        "plan_alimenticio", OLD.plan_alimenticio,
                        "fecha_inicio", OLD.fecha_inicio,
                        "fecha_fin", OLD.fecha_fin
                    ),
                v_id_ganadero);
            END
        ');

        // Continuar con triggers para las demás tablas (historial_medico, tratamientos, produccion, ventas_ganado, ventas, publicaciones, publicaciones_ganado, reportes)
        // El patrón es similar para cada tabla, adaptando los campos específicos
    }

    public function down()
    {
        // Eliminar todos los triggers
        $triggers = [
            'after_users_insert',
            'after_users_update',
            'after_users_delete',
            'after_ganado_insert',
            'after_ganado_update',
            'after_ganado_delete',
            'after_alimentacion_insert',
            'after_alimentacion_update',
            'after_alimentacion_delete',
            'after_historial_medico_insert',
            'after_historial_medico_update',
            'after_historial_medico_delete',
            'after_tratamientos_insert',
            'after_tratamientos_update',
            'after_tratamientos_delete',
            'after_produccion_insert',
            'after_produccion_update',
            'after_produccion_delete',
            'after_ventas_ganado_insert',
            'after_ventas_ganado_update',
            'after_ventas_ganado_delete',
            'after_ventas_insert',
            'after_ventas_update',
            'after_ventas_delete',
            'after_publicaciones_insert',
            'after_publicaciones_update',
            'after_publicaciones_delete',
            'after_publicaciones_ganado_insert',
            'after_publicaciones_ganado_update',
            'after_publicaciones_ganado_delete',
            'after_reportes_insert',
            'after_reportes_update',
            'after_reportes_delete'
        ];

        foreach ($triggers as $trigger) {
            DB::unprepared("DROP TRIGGER IF EXISTS $trigger");
        }
    }
}