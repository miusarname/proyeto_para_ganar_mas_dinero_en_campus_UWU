# Filtro Ojala me den + dinero....

#### Oscar Mauricio Alvarez Gómez M3
### Recordatorio hacer siempre "git pull" para obtener la mejor version...

```git
git pull
```

<br>

# Nota importante solo funciona en consola,el front-end aun esta en desarrollo

<br>

## Instanciamiento de la base de datos
Lo primero que se debe hacer es crear la base de datos con la terminal de esta forma :
```SQL
CREATE DATABASE campusland;

USE campusland;

CREATE TABLE pais(
  idPais INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombrePais VARCHAR(50)
);

CREATE TABLE departamento(
  idDep INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombreDep VARCHAR(50) NULL,
  idPais INT(11)
);

CREATE TABLE campers(
 idCamper VARCHAR(20) PRIMARY KEY NOT NULL,
 nombreCamper VARCHAR(50) NOT NULL,
 apellidoCamper VARCHAR(50) NOT NULL,
 fechaNac date NOT NULL,
 idReg INT(11)
);

CREATE TABLE region(
 idReg INT(11)  PRIMARY KEY AUTO_INCREMENT,
 nombreReg VARCHAR(60),
 idDep INT(11) 
);

ALTER TABLE departamento
ADD CONSTRAINT FK_departamento
FOREIGN KEY (idPais) REFERENCES pais(idPais);


ALTER TABLE region
ADD CONSTRAINT FK_region
FOREIGN KEY (idDep) REFERENCES departamento(idDep);


ALTER TABLE campers
ADD CONSTRAINT campers
FOREIGN KEY (idReg) REFERENCES region(idReg); + 2;
}
```

Claro tienes que estar ya en mysql en la consola, sino es así debes hacer esto primero para poder hacer lo otro:

```bash
mysql -u <tu-usuario-en-sql> -p
```
y luego ingresas tu contraseña de sql


## Donde poner?

Debes ponerlo en la carpeta de tu servidor,por ejemplo en apache con windows es en la carpeta htdocs y en linux en html para que lo ejecute apache

## Requisitos

-apache

-php

-y ya...
