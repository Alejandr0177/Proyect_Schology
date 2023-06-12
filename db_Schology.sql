CREATE DATABASE IF NOT EXISTS Schology;

USE Schology;

CREATE TABLE IF NOT EXISTS docente(
	doc_id INT NOT NULL AUTO_INCREMENT,
	doc_nombre VARCHAR (40) NOT NULL,
    doc_ap_pat VARCHAR (15) NOT NULL,
    doc_ap_mat VARCHAR (15) NOT NULL,
    doc_email VARCHAR (30) NOT NULL,
    doc_password VARCHAR (20) NOT NULL,
    doc_titulo_acad VARCHAR (50) COMMENT 'Grado academico del profesor. P.ej -> Ing. En Sistemas Computacionales, Lic. en Derecho',
    PRIMARY KEY (doc_id), 	# Se elige el NUE como llave primaria, ya que al ser el numero de empleado del profesor, esto al igual que el NUA del estudiante
							# es un valor unico de la UNIVERSIDAD DE GUANAJUATO y no afecta parte del mundo real
	UNIQUE(doc_email)
);

CREATE TABLE IF NOT EXISTS carrera(
	car_iniciales VARCHAR (5) NOT NULL COMMENT 	'LICE (Licenciatura en Ingenieria en Comunicaciones y Electronica) 
												 LISC (Licenciatura en Ingenieria en Sistemas Computacionales)', 
                                                 
	car_nombre_completo VARCHAR (80) NOT NULL,
    PRIMARY KEY (car_iniciales),	# car_iniciales sera mi llave primaria ya que al ser una iniciales de la carrera sera mas facil indentificar y buscar esta
    INDEX (car_nombre_completo),
    UNIQUE (car_iniciales)    
);

CREATE TABLE IF NOT EXISTS estudiante(
	est_id INT NOT NULL, 
	est_nombre VARCHAR (40) NOT NULL,
    est_ap_pat VARCHAR (15) NOT NULL,
    est_ap_mat VARCHAR (15) NOT NULL,
    est_email VARCHAR (30) NOT NULL,
    est_password VARCHAR (20) NOT NULL,
    est_car_id VARCHAR (5) NOT NULL,
    PRIMARY KEY (est_id),
    INDEX (est_nombre, est_ap_pat, est_ap_mat),
    UNIQUE (est_email),
    
    CONSTRAINT fk_carrera_estudiante
		FOREIGN KEY (est_car_id)
        REFERENCES carrera (car_iniciales)
        ON DELETE RESTRICT
        ON UPDATE RESTRICT
    
);

CREATE TABLE IF NOT EXISTS materia(
	mat_clave VARCHAR (10) NOT NULL COMMENT 'identificador de la materia',
    mat_nombre VARCHAR (40) NOT NULL COMMENT 'Nombre de la materia',
    PRIMARY KEY (mat_clave),	# Se elige mat_clave como llave primaria ya que es el identificador de la materia, lo que nos facilitara
								# la busqueda de la materia
	INDEX (mat_nombre)
);

CREATE TABLE IF NOT EXISTS curso(
	cur_id INT NOT NULL AUTO_INCREMENT,
	cur_mat_id VARCHAR (10) NOT NULL,
    cur_doc_id INT NOT NULL,
    cur_dias_clase VARCHAR (20) NOT NULL COMMENT 'Lun-Jue (para lunes y jueves), Mar-Vie (para martes y viernes), Lun_Mie_Jue (para Lunes, Miercoles y Jueves), etc',
    cur_horas_clase VARCHAR (10) NOT NULL COMMENT '08-10h, 10-12h, 12-14h, etc',
    PRIMARY KEY (cur_id),
    INDEX (cur_dias_clase),
    UNIQUE (cur_doc_id, cur_dias_clase, cur_horas_clase),
    
    CONSTRAINT fk_materia_curso
		FOREIGN KEY (cur_mat_id)
        REFERENCES materia (mat_clave)
        ON DELETE RESTRICT
        ON UPDATE RESTRICT,
        
	CONSTRAINT fk_maestro_curso
		FOREIGN KEY (cur_doc_id)
        REFERENCES docente (doc_id)
        ON DELETE RESTRICT
        ON UPDATE RESTRICT
);

CREATE TABLE IF NOT EXISTS inscripcion(
	ins_id INT NOT NULL AUTO_INCREMENT,
    ins_est_id INT NOT NULL,
    ins_cur_id  INT NOT NULL,
    PRIMARY KEY (ins_id),	 # llave artificial para poder relacionar la tabla detalle
    UNIQUE (ins_est_id, ins_cur_id),
    
    CONSTRAINT fk_estudiante_inscripcion
		FOREIGN KEY (ins_est_id)
        REFERENCES estudiante (est_id)
        ON DELETE RESTRICT
        ON UPDATE RESTRICT,
        
	CONSTRAINT fk_curso_inscripcion
		FOREIGN KEY (ins_cur_id)
        REFERENCES curso (cur_id)
        ON DELETE RESTRICT
        ON UPDATE RESTRICT
    
);

INSERT INTO carrera(car_iniciales, car_nombre_completo)
	VALUES	('LISC', 'Licenciatura en Ingenieria en Sistemas Computacionales'),
			('LICE', 'Licenciatura en Ingenieria en Comunicaciones y Electronica'),
            ('LIE', 'Licenciatura en Ingenieria en Electrica'),
            ('LIMT', 'Licenciatura en Ingenieria en Mecatronica'),
            ('LIME', 'Licenciatura en Ingenieria en Mecanica');

INSERT INTO docente(doc_nombre, doc_ap_pat, doc_ap_mat, doc_email, doc_password, doc_titulo_acad)
	VALUES	('Juan', 'Zavala', 'Martinez' ,'juan@ugto.mx', 'juan', 'Ingeniero en Sistemas Computacionales'),
            ('Juan Manuel', 'Lopez', 'Lopez', 'manuel@ugto.mx', 'manuel', 'Ingeniero en Electronica'),
            ('Fernando', 'Garcia', 'Pacheco' , 'fernando@ugto.mx', 'fernando', 'Ingeniero en Sistemas Computacionales');
            
INSERT INTO materia(mat_clave, mat_nombre)
	VALUES	('NELI04011', 'Metodos Numericos'),
			('IILI06104', 'Programacion en Ingenieria'),
            ('IILI06107', 'Programacion Orientada a Objetos'),
            ('IILI06004', 'Algoritmos y Estructuras de Datos'),
            ('IILI06119', 'Sistema de Administracion de datos'),
            ('IILI06013', 'Aplicaciones de Internet'),
			('NELI06002', 'Calculo Diferencial'),
			('NELI06003', 'Calculo Integral'),
            ('NELI06004', 'Calculo Vectorial y Multivariable'),
            ('NELI06014', 'Probabilidad y Estadistica'),
            ('NELI06005', 'Ecuaciones Diferenciales'),
            ('NELI06001', 'Algebra Lineal'),
            ('NELI06010', 'Mecanica'),
            ('NELI06009', 'Matematicas Discretas');
            
INSERT INTO curso(cur_mat_id, cur_doc_id, cur_dias_clase, cur_horas_clase)
	VALUES	('NELI06002', 1, 'Lun-Jue', '08-10h'),
			('NELI06002', 1, 'Lun-Jue', '10-12h'),
            ('NELI06004', 3, 'Lun-Mie-Jue', '14-16h'),
            ('NELI04011', 3, 'Mar-Vie', '12-14h'),
            ('NELI06003', 2, 'Lun-Jue', '10-12h'),
            ('NELI06003', 2, 'Mar-Vie', '08-10h'),
            ('NELI04011', 1, 'Mar-Vie', '10-12h'),
            ('NELI06004', 3, 'Lun-Jue', '12-14h');
            
INSERT INTO estudiante(est_nombre, est_ap_pat, est_ap_mat, est_email, est_password, est_car_id)
	VALUES	('Alejandro', 'Garcia', 'Garcia' , 'a.garciagarcia7@ugto.mx', 'alejandro', 'LISC' ),
			('Melany', 'Santoyo', 'Navarro' , 'm.santoyonavarro@ugto.mx', 'melany', 'LISC' ),
            ('Elyon', 'Vargas', 'Leon' , 'e.vargasleon@ugto.mx', 'elyon', 'LICE' ),
            ('Paola', 'Magno', 'Rodriguez' , 'p.magnorodriguez@ugto.mx', 'paola', 'LICE' ),
            ('Carmen', 'Elizarraras', 'Vargas' , 'c.elizarrarasvargas@ugto.mx', 'carmen', 'LIE' ),
            ('Esmeralda', 'Sanchez', 'Magno' , 'e.sanchezmagno@ugto.mx', 'esmeralda', 'LIE' ),
            ('Karen', 'Carranza', 'Carrera' , 'k.carrazacarrera@ugto.mx', 'karen', 'LIMT' ),
            ('Fabian', 'Razo', 'Lopez' , 'f.razolopez@ugto.mx', 'fabian', 'LIMT' ),
            ('Diego', 'Gutierrez', 'Garcia' , 'd.gutierrezgarcia@ugto.mx', 'diego', 'LIME' ),
            ('Liliana', 'Garcia', 'Granados' , 'l.garciagranados@ugto.mx', 'liliana', 'LIME' );

INSERT INTO inscripcion(ins_est_id, ins_cur_id)
	VALUES	(1, '1'),
			(2, '1'),
            (3, '1'),
            (4, '1'),
            (5, '2'),
            (6, '2'),
            (7, '2'),
            (8, '2');

# Muestra todos los cursos que existen
SELECT curso.cur_id, materia.mat_nombre,
	CONCAT(docente.doc_nombre, ' ', docente.doc_ap_pat, ' ', docente.doc_ap_mat) AS nombre_docente,
	curso.cur_dias_clase, curso.cur_horas_clase
    
	FROM materia
    INNER JOIN curso
		ON materia.mat_clave = curso.cur_mat_id
	INNER JOIN docente
		ON curso.cur_doc_id = doc_id
	ORDER BY materia.mat_nombre ASC;

# Muestra los cursos que tiene asignado un profesor
SELECT curso.cur_id, materia.mat_nombre, curso.cur_dias_clase, curso.cur_horas_clase
	FROM materia
	INNER JOIN curso
			ON materia.mat_clave = curso.cur_mat_id
	INNER JOIN docente
			ON curso.cur_doc_id = doc_id
	WHERE docente.doc_id = '1';

# Muestra los cursos en los que esta inscrito un estudiante
SELECT curso.cur_id, materia.mat_nombre,
	CONCAT(docente.doc_nombre, ' ', docente.doc_ap_pat, ' ', docente.doc_ap_mat) AS nombre_docente, curso.cur_dias_clase, curso.cur_horas_clase
    
	FROM materia
	INNER JOIN curso
		ON materia.mat_clave = curso.cur_mat_id
	INNER JOIN docente
		ON curso.cur_doc_id = doc_id
	INNER JOIN inscripcion
		ON curso.cur_id = ins_cur_id
	INNER JOIN estudiante
		ON inscripcion.ins_est_id = est_id
    WHERE inscripcion.ins_est_id = '147741';

# Estudiantes que esten inscritos en un curso dependiendo del id del curso
SELECT materia.mat_nombre, estudiante.est_id, CONCAT(estudiante.est_nombre, ' ', estudiante.est_ap_pat, ' ', estudiante.est_ap_mat) AS nombre_estudiante,
	estudiante.est_car_id
        
	FROM materia # tabla derecha
    INNER JOIN curso # tabla izquierda
		ON materia.mat_clave = cur_mat_id
	INNER JOIN inscripcion
		ON curso.cur_id = ins_cur_id
	INNER JOIN estudiante
		ON inscripcion.ins_est_id = est_id
    WHERE inscripcion.ins_cur_id = '2';

SELECT materia.mat_nombre, estudiante.est_id, CONCAT(estudiante.est_nombre, ' ', estudiante.est_ap_pat, ' ', estudiante.est_ap_mat) AS nombre_estudiante,
	carrera.car_nombre_completo
        
	FROM carrera # tabla derecha
    INNER JOIN estudiante # tabla izquierda
		ON carrera.car_iniciales = est_car_id
	INNER JOIN inscripcion
		ON estudiante.est_id = ins_est_id
	INNER JOIN curso
		ON inscripcion.ins_cur_id = cur_id
	INNER JOIN materia
		ON curso.cur_mat_id = mat_clave
    WHERE inscripcion.ins_cur_id = '2';
    
SELECT * FROM curso WHERE cur_doc_id = '1';
	


            