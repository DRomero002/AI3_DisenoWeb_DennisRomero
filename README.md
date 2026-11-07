# 🐘 Actividad Integradora 3: Módulo Web Dinámico Full-Stack (PHP & MySQL)

![PHP Version](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Database](https://img.shields.io/badge/MySQL%2FMariaDB-db__sistema__web-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Security](https://img.shields.io/badge/Security-PDO%20%7C%20XSS%20Protection-16a34a?style=for-the-badge&logo=shield&logoColor=white)
![Git](https://img.shields.io/badge/Version%20Control-Git%20%26%20GitHub-F05032?style=for-the-badge&logo=git&logoColor=white)

## 🎯 Descripción del Proyecto

Este proyecto consiste en el desarrollo e implementación de un módulo web dinámico full-stack securizado. Permite el registro de usuarios y la consulta en tiempo real mediante persistencia de datos en **MySQL/MariaDB** utilizando **PHP Data Objects (PDO)**. 

Se priorizó el cumplimiento de estándares de seguridad informática como la prevención de **Inyección SQL** mediante *Sentencias Preparadas* y la mitigación de vulnerabilidades **XSS (Cross-Site Scripting)** mediante sanitización estricta de salidas con `htmlspecialchars()`.

---

## 🛠️ Tecnologías Utilizadas

* **Backend:** PHP 8.x (Arquitectura PDO con manejo estricto de excepciones `try-catch`).
* **Base de Datos:** MySQL / MariaDB (vía phpMyAdmin / XAMPP).
* **Frontend:** HTML5 semántico y CSS3 responsivo con variables CSS.
* **Control de Versiones:** Git & GitHub Desktop.
* **Servidor Local:** Apache (XAMPP v3.3.0).

---

## 🗄️ Esquema de la Base de Datos (`db_sistema_web`)

El esquema de la base de datos se definió en el script DDL `db_sistema_web.sql`, incluyendo **7 campos** para la entidad `registros`:

| Campo | Tipo de Dato | Modificadores | Descripción |
| :--- | :--- | :--- | :--- |
| `id` | `INT` | `AUTO_INCREMENT`, `PRIMARY KEY` | Identificador único del registro |
| `nombre` | `VARCHAR(100)` | `NOT NULL` | Nombre completo del usuario |
| `email` | `VARCHAR(100)` | `NOT NULL` | Correo electrónico de contacto |
| `telefono` | `VARCHAR(20)` | `NOT NULL` | Número telefónico |
| `categoria` | `VARCHAR(50)` | `NOT NULL` | Categoría (Estudiante, Docente, etc.) |
| `estado` | `VARCHAR(20)` | `DEFAULT 'Activo'` | Estado operativo del registro |
| `fecha_creacion` | `TIMESTAMP` | `DEFAULT CURRENT_TIMESTAMP` | Auditoría de fecha y hora |

---

## 🔒 Implementación de Seguridad Web

1. **Prevención de SQL Injection:**
   * Utilización exclusiva de `PDO::prepare()` y vinculación segura de parámetros con arreglos asociativos en las sentencias `INSERT` y `SELECT`.

2. **Mitigación de Vulnerabilidades XSS:**
   * Sanitización de toda salida de datos dinámica hacia la interfaz de usuario utilizando `htmlspecialchars($var, ENT_QUOTES, 'UTF-8')`.

3. **Manejo Estricto de Excepciones:**
   * Configuración de `PDO::ERRMODE_EXCEPTION` para registrar errores internamente con `error_log()` sin exponer credenciales ni estructura interna del servidor al cliente final.

---

## 📁 Estructura del Proyecto

```text
AI3_DisenoWeb_DennisRomero/
│
├── config/
│   └── conexion.php        # Módulo PDO seguro con try-catch
├── css/
│   └── styles.css          # Estilos CSS3 responsivos y modernos
├── .gitignore              # Exclusión de archivos locales/logs
├── db_sistema_web.sql      # Script DDL de creación de la base de datos
├── index.php               # Formulario de registro (Create)
├── listar.php              # Tabla de consulta sanitizada (Read)
└── README.md               # Documentación técnica del proyecto
```

---

## 🚀 Instrucciones de Despliegue Local

1. **Clonar o Ubicar el Proyecto:**
   Asegúrate de clonar o colocar el proyecto dentro de la ruta pública del servidor Apache:
   ```bash
   C:\xampp\htdocs\AI3_DisenoWeb_DennisRomero
   ```

2. **Iniciar Servidores:**
   Abre el **XAMPP Control Panel** e inicia los servicios de **Apache** y **MySQL**.

3. **Importar la Base de Datos:**
   * Accede a phpMyAdmin: `http://localhost/phpmyadmin/`.
   * En la pestaña **SQL**, ejecuta el contenido de `db_sistema_web.sql` o importa directamente el archivo.

4. **Acceder a la Aplicación:**
   * **Formulario de Registro:** `http://localhost/AI3_DisenoWeb_DennisRomero/index.php`
   * **Listado de Registros:** `http://localhost/AI3_DisenoWeb_DennisRomero/listar.php`

---

## 📝 Historial de Commits en GitHub

El proyecto fue construido de forma modular registrando avances en Git:

1. `feat: inicializar esquema DDL, gitignore y conexion PDO segura`
2. `style: maquetacion CSS responsiva para formulario y tabla`
3. `feat: formulario de insercion con prepared statements y validaciones`
4. `feat: vista de consulta de registros sanitizada contra XSS`
5. `docs: agregar README.md con instrucciones de despliegue local`

---

*Desarrollado para la Actividad Integradora 3 — Universidad ECOTEC (2026).*