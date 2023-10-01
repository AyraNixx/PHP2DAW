/*			INSERT ROLES		*/
INSERT INTO `perrera`.roles (rol, descripcion) VALUES ('Administrador', 'Acceso a todas las tablas y funciones disponibles'),
													  ('Encargado de Adopciones', 'Gestiona los procesos de adopción, acceso a las tablas relacionadas con animales, dueños y adoptantes'),
													  ('Encargado de Tareas', 'Responsable de la gestión de tareas, puede añadir, eliminar y modificar tareas así como de asignarlas a los empleados y voluntarios'),
													  ('Encargado de Voluntarios', 'Responsable de la gestión de tareas de la asignación y/o modificación de tareas para los voluntarios'),
													  ('Empleado', 'Acceso a las tablas relacionadas con los animales y la asignación de tareas, funciones más limitadas');
                                                      
                                                      
/*			INSERT ESPECIES			*/                                                      
INSERT INTO `perrera`.`especies` (`id`,`nombre`, `descripcion`) VALUES ('00B100292511104237965', 'Perro', 'Animal doméstico que pertenece a la familia Canidae.'),
																  ('00B100292511104237966', 'Gato', 'Animal doméstico que pertenece a la familia Felidae.'),
																  ('00B100292511104237967', 'Conejo', 'Animal que pertenece a la familia Leporidae.'),
																  ('00B100292511104237968', 'Pájaro', 'Animal que pertenece a la clase Aves.'),
                                                                  ('00B100292511104237969', 'Otros', 'Especie no especificada o no común en la perrera.');
                                                                  
                                                                  INSERT INTO `perrera`.`especies` (`nombre`, `descripcion`) VALUES ('prueba', 'Animal doméstico que pertenece a la familia Canidae.');


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


/*			INSERT VETERINARIOS			*/
INSERT INTO `perrera`.`veterinarios` (`nombre`, `apellidos`, `correo`, `telf`, `clinica`, `horarios`, `direccion`, `otra_informacion`, `disponible`)
VALUES
    ('Juan', 'Gómez', 'juan@example.com', '123456789', 'Clínica Veterinaria A', 'Lun-Vie 9am-5pm', 'Calle Principal 123', 'Especialista en cirugía', 1),
    ('María', 'López', 'maria@example.com', '987654321', 'Clínica Veterinaria B', 'Lun-Jue 10am-6pm', 'Avenida Central 456', 'Experiencia en medicina interna', 1),
    ('Pedro', 'Rodríguez', 'pedro@example.com', '555555555', 'Clínica Veterinaria C', 'Lun-Sáb 8am-2pm', 'Calle Secundaria 789', 'Intereses en dermatología', 1),
    ('Laura', 'Martínez', 'laura@example.com', '666666666', 'Clínica Veterinaria D', 'Mar-Vie 11am-7pm', 'Avenida Principal 987', 'Experta en traumatología', 1),
    ('Carlos', 'Sánchez', 'carlos@example.com', '222222222', 'Clínica Veterinaria E', 'Mié-Dom 12pm-8pm', 'Avenida Secundaria 654', 'Conocimientos en cardiología', 1),
    ('Ana', 'García', 'ana@example.com', '777777777', 'Clínica Veterinaria F', 'Jue-Sáb 9am-3pm', 'Calle Central 321', 'Experiencia en medicina felina', 1);
							