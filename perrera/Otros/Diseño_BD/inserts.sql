/*			INSERT ROLES		*/
INSERT INTO `perrera`.roles (rol, descripcion) VALUES ('Administrador', 'Acceso a todas las tablas y funciones disponibles'),
													  ('Encargado de Adopciones', 'Gestiona los procesos de adopción, acceso a las tablas relacionadas con animales, dueños y adoptantes'),
													  ('Encargado de Tareas', 'Responsable de la gestión de tareas, puede añadir, eliminar y modificar tareas así como de asignarlas a los empleados y voluntarios'),
													  ('Encargado de Voluntarios', 'Responsable de la gestión de tareas de la asignación y/o modificación de tareas para los voluntarios'),
													  ('Empleado', 'Acceso a las tablas relacionadas con los animales y la asignación de tareas, funciones más limitadas');
                                                      
                                                      
/*			INSERT ESPECIES			*/                                                      
/*INSERT INTO `perrera`.`especies` (`id`,`nombre`, `descripcion`) VALUES ('00B100292511104237965', 'Perro', 'Animal doméstico que pertenece a la familia Canidae.'),
																  ('00B100292511104237966', 'Gato', 'Animal doméstico que pertenece a la familia Felidae.'),
																  ('00B100292511104237967', 'Conejo', 'Animal que pertenece a la familia Leporidae.'),
																  ('00B100292511104237968', 'Pájaro', 'Animal que pertenece a la clase Aves.'),
                                                                  ('00B100292511104237969', 'Otros', 'Especie no especificada o no común en la perrera.');
                                                                  
                                                                  INSERT INTO `perrera`.`especies` (`nombre`, `descripcion`) VALUES ('prueba', 'Animal doméstico que pertenece a la familia Canidae.');
*/

/*			INSERT JAULAS			*/  
/*Tamanio hace referencia al número de perros que entran dentro*/
INSERT INTO `perrera`.`jaulas` (`ubicacion`, `tamanio`, `ocupada`, `estado_comida`, `estado_limpieza`, `descripcion`, `especies_id`)
			 VALUES ('A-01', 4, 0, 0, 1, 'Jaula para cachorros.', '00B100292511104237965'),
					('A-02', 5, 0, 1, 0, 'Jaula para cachorros.', '00B100292511104237965'),
					('A-03', 3, 0, 1, 1, 'Jaula para cachorros.', '00B100292511104237965'),
					('A-04', 2, 0, 0, 1, 'Jaula para cachorros.', '00B100292511104237965'),
					('B-01', 4, 0, 1, 1, 'Jaula para perros pequeños.', '00B100292511104237965'),
					('B-02', 3, 0, 1, 0, 'Jaula para perros pequeños.', '00B100292511104237965'),
					('B-03', 2, 0, 0, 1, 'Jaula para perros pequeños.', '00B100292511104237965'),
					('B-04', 2, 0, 1, 0, 'Jaula para perros pequeños.', '00B100292511104237965'),
					('B-05', 3, 0, 1, 1, 'Jaula para perros pequeños.', '00B100292511104237965'),
                    ('C-01', 3, 0, 1, 1, 'Jaula para perros de tamaño mediano.', '00B100292511104237965'),
					('C-02', 3, 0, 1, 0, 'Jaula para perros de tamaño mediano.', '00B100292511104237965'),
					('C-03', 2, 0, 0, 1, 'Jaula para perros de tamaño mediano.', '00B100292511104237965'),
					('C-04', 2, 0, 0, 1, 'Jaula para perros de tamaño mediano.', '00B100292511104237965'),
                    ('D-01', 2, 0, 1, 1, 'Jaula para perros grandes.', '00B100292511104237965'),
					('D-02', 3, 0, 1, 0, 'Jaula para perros grandes.', '00B100292511104237965'),
					('D-03', 2, 0, 0, 1, 'Jaula para perros grandes.', '00B100292511104237965'),
					('D-04', 3, 0, 0, 1, 'Jaula para perros grandes.', '00B100292511104237965'),
					('D-05', 2, 0, 1, 0, 'Jaula para perros grandes.', '00B100292511104237965'),
					('D-06', 3, 0, 1, 1, 'Jaula para perros grandes.', '00B100292511104237965'),
                    ('E-01', 1, 0, 1, 1, 'Jaula para gatos.', '00B100292511104237966'),
					('E-02', 1, 0, 1, 0, 'Jaula para gatos.', '00B100292511104237966'),
					('E-03', 1, 0, 0, 1, 'Jaula para gatos.', '00B100292511104237966'),
					('E-04', 1, 0, 0, 1, 'Jaula para gatos.', '00B100292511104237966'),
                    ('E-05', 1, 0, 1, 1, 'Jaula para gatos.', '00B100292511104237966'),
					('E-06', 1, 0, 1, 0, 'Jaula para gatos.', '00B100292511104237966'),
					('E-07', 1, 0, 0, 1, 'Jaula para gatos.', '00B100292511104237966'),
					('E-08', 1, 0, 0, 1, 'Jaula para gatos.', '00B100292511104237966'),
					('E-09', 1, 0, 1, 0, 'Jaula para gatos.', '00B100292511104237966'),
					('E-10', 1, 0, 1, 1, 'Jaula para gatos.', '00B100292511104237966'),
                    ('E-11', 1, 0, 1, 1, 'Jaula para gatos.', '00B100292511104237966'),
					('E-12', 1, 0, 1, 0, 'Jaula para gatos.', '00B100292511104237966'),
					('E-13', 1, 0, 0, 1, 'Jaula para gatos.', '00B100292511104237966'),
                    ('F-01', 5, 0, 1, 1, 'Jaula para conejos.', '00B100292511104237967'),
					('F-02', 4, 0, 1, 0, 'Jaula para conejos.', '00B100292511104237967'),
                    ('G-01', 3, 0, 1, 1, 'Jaula para pájaros.', '00B100292511104237968'),
					('G-02', 3, 0, 1, 0, 'Jaula para pájaros.', '00B100292511104237968'),
					('G-03', 1, 0, 0, 1, 'Jaula para pájaros.', '00B100292511104237968'),
					('G-04', 1, 0, 0, 1, 'Jaula para pájaros.', '00B100292511104237968'),
                    ('G-05', 3, 0, 1, 1, 'Jaula para pájaros.', '00B100292511104237968'),
					('G-06', 3, 0, 1, 0, 'Jaula para pájaros.', '00B100292511104237968'),
                    ('H-01', 3, 0, 1, 1, 'Jaula para otras especies.', '00B100292511104237969'),
					('H-02', 3, 0, 1, 0, 'Jaula para otras especies.', '00B100292511104237969'),
					('H-03', 3, 0, 0, 1, 'Jaula para otras especies.', '00B100292511104237969'),
					('H-04', 2, 0, 0, 1, 'Jaula para otras especies.', '00B100292511104237969');
                    
                                                    

/*			INSERT ANIMALES			*/
INSERT INTO `perrera`.`animales` (`nombre`, `especies_id`, `raza`, `genero`, `tamanio`, `peso`, `colores`, `personalidad`, `fech_nac`, `estado_adopcion`, `estado_salud`, `necesidades_especiales`, `otras_observaciones`, `jaulas_id`, `disponible`)
VALUES 
('Max', '00B100292511104237965', 'Labrador', 'M', 'Grande', 25.5, 'Dorado', 'Juguetón', '2022-03-10', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598598', 1),
('Luna', '00B100292511104237966', 'Siames', 'H', 'Pequeño', 4.2, 'Blanco y Negro', 'Cariñoso', '2022-04-05', 'Adoptado', 'Regular', 'SI', 'Ninguna', '00J100533662847598599', 1),
('Rocky', '00B100292511104237967', 'Pastor Alemán', 'M', 'Grande', 30.0, 'Negro y Marrón', 'Protector', '2022-02-20', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598600', 1),
('Bella', '00B100292511104237968', 'Poodle', 'H', 'Mediano', 7.8, 'Blanco', 'Inteligente', '2022-01-15', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598601', 1),
('Leo', '00B100292511104237969', 'Bengala', 'M', 'Pequeño', 5.0, 'Naranja con Rayas', 'Energético', '2022-05-12', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598602', 1),
('Lola', '00B100292511104237965', 'Golden Retriever', 'H', 'Grande', 27.0, 'Dorado', 'Amigable', '2022-04-30', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598603', 1),
('Coco', '00B100292511104237966', 'Chihuahua', 'M', 'Pequeño', 2.5, 'Marrón', 'Cariñoso', '2022-03-02', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598604', 1),
('Milo', '00B100292511104237967', 'Persa', 'H', 'Mediano', 6.0, 'Gris', 'Tranquilo', '2022-04-18', 'Adoptado', 'Regular', 'SI', 'Ninguna', '00J100533662847598605', 1),
('Oscar', '00B100292511104237968', 'Dálmata', 'M', 'Grande', 28.0, 'Blanco con Manchas Negras', 'Juguetón', '2022-02-14', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598606', 1),
('Lucky', '00B100292511104237969', 'Beagle', 'H', 'Mediano', 9.5, 'Tricolor', 'Sociable', '2022-01-30', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598607', 1),
('Mia', '00B100292511104237965', 'Siamés', 'H', 'Pequeño', 4.0, 'Blanco y Negro', 'Independiente', '2022-05-25', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598608', 1),
('Charlie', '00B100292511104237966', 'Labrador', 'M', 'Grande', 29.0, 'Negro', 'Energético', '2022-04-12', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598609', 1),
('Buddy', '00B100292511104237967', 'Yorkshire Terrier', 'M', 'Pequeño', 3.0, 'Gris y Marrón', 'Sociable', '2022-03-18', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598610', 1),
('Simba', '00B100292511104237968', 'Maine Coon', 'M', 'Grande', 15.0, 'Marrón y Negro', 'Juguetón', '2022-04-08', 'Adoptado', 'Regular', 'SI', 'Ninguna', '00J100533662847598611', 1),
('Lily', '00B100292511104237969', 'Bulldog Francés', 'H', 'Mediano', 8.5, 'Blanco', 'Tranquila', '2022-02-28', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598612', 1),
('Maxi', '00B100292511104237965', 'Cocker Spaniel', 'M', 'Mediano', 10.0, 'Dorado', 'Amigable', '2022-01-20', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598613', 1),
('Nala', '00B100292511104237966', 'Persa', 'H', 'Mediano', 5.5, 'Blanco', 'Cariñosa', '2022-05-15', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598614', 1),
('Teddy', '00B100292511104237967', 'Bulldog Inglés', 'M', 'Grande', 26.0, 'Marrón y Blanco', 'Leal', '2022-04-22', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598615', 1),
('Bella', '00B100292511104237968', 'Poodle', 'H', 'Mediano', 7.8, 'Blanco', 'Inteligente', '2022-03-08', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598616', 1),
('Oliver', '00B100292511104237969', 'Dachshund', 'M', 'Pequeño', 6.0, 'Marrón', 'Curioso', '2022-02-05', 'Disponible', 'Bien', 'NO', 'Ninguna', '00J100533662847598617', 1);
						


/*			INSERT VETERINARIOS			*/
/*INSERT INTO `perrera`.`veterinarios` (`nombre`, `apellidos`, `correo`, `telf`, `clinica`, `horarios`, `direccion`, `otra_informacion`, `disponible`)
VALUES
    ('Juan', 'Gómez', 'juan@example.com', '123456789', 'Clínica Veterinaria A', 'Lun-Vie 9am-5pm', 'Calle Principal 123', 'Especialista en cirugía', 1),
    ('María', 'López', 'maria@example.com', '987654321', 'Clínica Veterinaria B', 'Lun-Jue 10am-6pm', 'Avenida Central 456', 'Experiencia en medicina interna', 1),
    ('Pedro', 'Rodríguez', 'pedro@example.com', '555555555', 'Clínica Veterinaria C', 'Lun-Sáb 8am-2pm', 'Calle Secundaria 789', 'Intereses en dermatología', 1),
    ('Laura', 'Martínez', 'laura@example.com', '666666666', 'Clínica Veterinaria D', 'Mar-Vie 11am-7pm', 'Avenida Principal 987', 'Experta en traumatología', 1),
    ('Carlos', 'Sánchez', 'carlos@example.com', '222222222', 'Clínica Veterinaria E', 'Mié-Dom 12pm-8pm', 'Avenida Secundaria 654', 'Conocimientos en cardiología', 1),
    ('Ana', 'García', 'ana@example.com', '777777777', 'Clínica Veterinaria F', 'Jue-Sáb 9am-3pm', 'Calle Central 321', 'Experiencia en medicina felina', 1);*/
							