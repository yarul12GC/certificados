
-- Creación de la tabla de tipos de estudio
CREATE TABLE TiposEstudio (
    TipoEstudioID INT AUTO_INCREMENT PRIMARY KEY,
    NombreTipoEstudio VARCHAR(50) UNIQUE
);

-- Inserción de datos iniciales en TiposEstudio
INSERT INTO TiposEstudio (NombreTipoEstudio) VALUES
    ('Licenciatura'),
    ('Maestría'),
    ('Doctorado');

-- Creación de la tabla de programas de estudio
CREATE TABLE ProgramasEstudio (
    ProgramaID INT AUTO_INCREMENT PRIMARY KEY,
    NombrePrograma VARCHAR(100) UNIQUE
);

-- Inserción de datos iniciales en ProgramasEstudio
INSERT INTO ProgramasEstudio (NombrePrograma) VALUES
    ('Programa A'),
    ('Programa B'),
    ('Programa C');

-- Creación de la tabla de modalidades de estudio
CREATE TABLE ModalidadesEstudio (
    ModalidadID INT AUTO_INCREMENT PRIMARY KEY,
    NombreModalidad VARCHAR(50) UNIQUE
);

-- Inserción de datos iniciales en ModalidadesEstudio
INSERT INTO ModalidadesEstudio (NombreModalidad) VALUES
    ('Presencial'),
    ('En línea'),
    ('Semi-presencial');

-- Creación de la tabla de usuarios (estudiantes)
CREATE TABLE Usuarios (
    UsuarioID INT AUTO_INCREMENT PRIMARY KEY,
    Matricula VARCHAR(15) UNIQUE,
    Nombre VARCHAR(50),
    ApellidoPaterno VARCHAR(50),
    ApellidoMaterno VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    contrasena VARCHAR(255),
    TipoEstudioID INT,
    ProgramaID INT,
    ModalidadID INT,
    FolioControl VARCHAR(20) UNIQUE,
    Estatus VARCHAR(20),
    FOREIGN KEY (TipoEstudioID) REFERENCES TiposEstudio(TipoEstudioID),
    FOREIGN KEY (ProgramaID) REFERENCES ProgramasEstudio(ProgramaID),
    FOREIGN KEY (ModalidadID) REFERENCES ModalidadesEstudio(ModalidadID)
);

CREATE TABLE Certificados (
    CertificadoID INT AUTO_INCREMENT PRIMARY KEY,
    UsuarioID INT,
    NombreCertificado VARCHAR(100),
    ArchivoPDF LONGBLOB, -- Almacena el archivo PDF en formato binario
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(UsuarioID)
);
