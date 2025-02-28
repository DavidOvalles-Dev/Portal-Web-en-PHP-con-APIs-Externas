# Portal Web en PHP con APIs Externas

Este es un portal web desarrollado en PHP que utiliza 10 APIs externas para mostrar información en diferentes categorías. El proyecto está diseñado con Bootstrap 5 para ofrecer una interfaz moderna y responsiva.

## 📌 Características
✅ Predicción de género
✅ Predicción de edad
✅ Universidades por país
✅ Clima actual
✅ Información de Pokémon
✅ Noticias desde WordPress
✅ Conversión de monedas
✅ Generador de imágenes AI
✅ Datos de países
✅ Generador de chistes

## 🚀 Tecnologías Utilizadas
- **PHP**: Lenguaje principal del backend.
- **Bootstrap 5**: Framework CSS para el diseño responsivo.
- **APIs Externas**: Diferentes APIs para obtener datos dinámicos.
- **XAMPP**: Servidor local para pruebas.
- **MySQL (opcional)**: Base de datos si se requiere almacenamiento.

## 📂 Estructura del Proyecto
```
📁 Portal Web en PHP con APIs Externas
│── 📁 assets
│   ├── 📁 css (Estilos personalizados)
│   ├── 📁 js (Archivos JavaScript)
│── 📁 pages
│   ├── age.php
│   ├── country.php
│   ├── currency.php
│   ├── gender.php
│   ├── images.php
│   ├── jokes.php
│   ├── news.php
│   ├── pokemon.php
│   ├── universities.php
│   ├── weather.php
│── index.php (Página principal)
│── README.md (Este archivo)
```

## 🔧 Instalación y Configuración
1. **Clonar el repositorio**:
   ```bash
   git clone https://github.com/TU_USUARIO/TU_REPOSITORIO.git
   ```
2. **Mover la carpeta del proyecto a `htdocs` (XAMPP)**:
   ```
   C:\xampp\htdocs\Portal Web en PHP con APIs Externas
   ```
3. **Configurar el servidor local**:
   - Iniciar Apache desde el panel de XAMPP.
   - Si usas MySQL, también inícialo.
4. **Configurar la API Key de Unsplash** (Para el generador de imágenes):
   - Obtener una API Key en [Unsplash Developers](https://unsplash.com/developers).
   - Editar `pages/images.php` y reemplazar `TU_API_KEY_UNSPLASH` por tu clave válida.
5. **Abrir el proyecto en el navegador**:
   ```
   http://localhost:8012/Portal Web en PHP con APIs Externas/
   ```

## 🛠 Solución de Problemas
- **Error 401 en Unsplash**: Asegúrate de tener una API Key válida y haberla insertado correctamente en `pages/images.php`.
- **Error en la navegación**: Si los enlaces llevan a una ruta incorrecta (`pages/pages/archivo.php`), verifica las rutas en el `navbar`.

## 📜 Licencia
Este proyecto está bajo la licencia MIT. Puedes modificarlo y distribuirlo libremente. 🚀

