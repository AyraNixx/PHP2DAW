
use perrera;

SHOW TRIGGERS;

/*



						TRIGGERS PARA INCREMENTAR EL ID EN UNO DEPENDIENDO DE LA CANTIDAD DE ELEMENTOS QUE HAYA EN LA TABLA



*/

/*TRIGGER QUE SALTA ANTES DE LA INSERCIÓN DE UN NUEVO ANIMAL*/
/*
	Este trigger comprobará si una jaula tiene aún espacio disponible para meter a otro animal dentro.
    En caso de que haya espacio, se insertará sin problemas. Sin embargo cuando la cantidad de animales
    asociados a la jaula sea igual que el tamaño máximo de la jaula, el campo ocupada de la jaula pasará 
    a valer 1, lo que indica que está completa.
*/ 
-- Trigger para actualizar el estado de ocupación de la jaula antes de insertar un animal
DROP TRIGGER IF EXISTS update_jail_status;
DELIMITER $$
CREATE TRIGGER update_jail_status
BEFORE INSERT ON animales
FOR EACH ROW
BEGIN
    DECLARE total_animales_jaulas INT;
    DECLARE tamanio_jaula INT;

    SELECT COUNT(*) INTO total_animales_jaulas FROM animales WHERE jaulas_id = NEW.jaulas_id AND id != NEW.id AND disponible = 1;
    SELECT tamanio INTO tamanio_jaula FROM jaulas WHERE id = NEW.jaulas_id;

    IF (total_animales_jaulas >= tamanio_jaula) THEN
        UPDATE jaulas SET ocupada = 1 WHERE id = NEW.jaulas_id;
        SIGNAL SQLSTATE '45100' SET MESSAGE_TEXT = 'No hay espacio disponible en esta jaula';
    ELSE
        UPDATE jaulas SET ocupada = 0 WHERE id = NEW.jaulas_id;
    END IF;
END$$
DELIMITER ;


-- Trigger para actualizar el estado de ocupación de la jaula después de eliminar un animal
DROP TRIGGER IF EXISTS update_jail_status_after_delete;
DELIMITER $$
CREATE TRIGGER update_jail_status_after_delete
AFTER DELETE ON animales
FOR EACH ROW
BEGIN
    DECLARE total_animales_jaulas INT;
    DECLARE tamanio_jaula INT;

    SELECT COUNT(*) INTO total_animales_jaulas FROM animales WHERE jaulas_id = OLD.jaulas_id;
    SELECT tamanio INTO tamanio_jaula FROM jaulas WHERE id = OLD.jaulas_id;

    IF (total_animales_jaulas >= tamanio_jaula) THEN
        UPDATE jaulas SET ocupada = 1 WHERE id = OLD.jaulas_id;
    ELSE
        UPDATE jaulas SET ocupada = 0 WHERE id = OLD.jaulas_id;
    END IF;
END$$
DELIMITER ;