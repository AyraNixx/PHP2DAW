use `tienda_animales`;


/*DATOS GENERADOS ALEATORIAMENTE EN GENERATEDATA*/


/*TABLA ROLES*/
INSERT INTO `roles` (`rol`, `descripcion`) VALUES ("admin","Donec feugiat metus sit"),
  ("user","scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit");
  
/*TABLA CATEGORÍA*/
INSERT INTO `categoria` (`nombre`,`descripcion`) VALUES
  ("Ropa","primis in faucibus orci luctus et ultrices posuere"),
  ("Accesorios","fermentum fermentum arcu. Vestibulum"),
  ("Alimentación","tellus eu augue porttitor interdum."),
  ("Juguetes","mi. Duis risus odio, auctor vitae, aliquet"),
  ("Otros","non, egestas a,");
  
/*TABLA PROVEEDORES*/
INSERT INTO `proveedores` (`nombre`,`direccion`,`telefono`,`correo`) VALUES
  ("Dapibus Quam Quis PC","416 Est, Rd.","743795188","et.rutrum.non@protonmail.net"),
  ("Donec Tincidunt Inc.","934-7549 Praesent Rd.","367611333","erat.eget@protonmail.net"),
  ("Sem Eget Foundation","990-4711 Purus Street","665389124","orci.consectetuer@outlook.org"),
  ("Rutrum Magna LLP","720-5015 Velit. St.","450557856","malesuada@protonmail.edu"),
  ("Diam Luctus Lobortis PC","537 Sit Rd.","635113318","tincidunt@yahoo.net"),
  ("Nibh Sit Associates","Ap #731-3266 Nunc Rd.","174680716","a.neque@google.org"),
  ("Primis In Faucibus Industries","Ap #379-7607 Eu St.","216303619","mauris@protonmail.net"),
  ("Et Risus Ltd","845-6794 Egestas St.","062634466","pharetra.quisque.ac@protonmail.com"),
  ("Tempor Est Incorporated","323 Justo Rd.","683016545","eros@icloud.ca"),
  ("Sed LLC","371-3388 Nec Road","339798673","at.velit@aol.org");


/*TABLA PRODUCTOS*/
INSERT INTO `productos` (`nombre`,`precio`,`stock`,`categoria`,`foto`)
VALUES
  ("Dudi Pet Cortauñas y Lima para Perro y Gato","22.86",129,5,"../imgs/dudi.jpg"),
  ("Royal Canin Diabetic","17.63",136,3,"../imgs/royal.png"),
  ("LYL Etiquetas de identificación de Mascotas de Acero Inoxidable","22.61",232,2,"../imgs/etiqueta.jpg"),
  ("Acana Classic Red","23.02",194,3,"../imgs/acana.jpg"),
  ("TK-Pet Gallina de Peluche para perros","8.52",227,4,"../imgs/gallina.jpg"),
  ("Disfraz de muñeco diabólico","12.29",164,1,"../imgs/diabolico.jpg"),
  ("Eagloo Arnes Perro Grande","20.00",209,2,"../imgs/egaloo.jpg"),
  ("Eukanuba Puppy","1.16",157,3,"../imgs/eukanube.jpg"),
  ("Nature Original","14.28",187,3,"../imgs/nature.jpg"),
  ("Sudadera para perro en forma de rana","23.15",187,1,"../imgs/rana.jpg"),
  ("Karlie Animales de Peluche sin Relleno para perros","16.44",173,4,"../imgs/"),
  ("Orijen Original","13.56",147,3,"../imgs/"),
  ("TRIXIE flexi New CLASSIC Cinta Enrollable para Perro","2.91",225,2,"../imgs/cinta.jpg"),
  ("Kong Air Squeakers pelotas de tenis para perros","0.95",176,4,"../imgs/pelotas.jpg"),
  ("Disfraz de caperucita","15.61",183,1,"../imgs/caperucita.jpg");
  

