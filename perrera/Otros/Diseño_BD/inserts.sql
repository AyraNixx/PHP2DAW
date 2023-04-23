/*			INSERT ROLES		*/
INSERT INTO `perrera`.roles (rol, descripcion) VALUES ('Administrador', 'Acceso a todas las tablas y funciones disponibles'),
													  ('Encargado de Adopciones', 'Gestiona los procesos de adopción, acceso a las tablas relacionadas con animales, dueños y adoptantes'),
													  ('Encargado de Tareas', 'Responsable de la gestión de tareas, puede añadir, eliminar y modificar tareas así como de asignarlas a los empleados y voluntarios'),
													  ('Encargado de Voluntarios', 'Responsable de la gestión de tareas de la asignación y/o modificación de tareas para los voluntarios'),
													  ('Empleado', 'Acceso a las tablas relacionadas con los animales y la asignación de tareas, funciones más limitadas')