# Laravel Netflix User Log

<p align="center">
<img src="https://assets.brand.microsites.netflix.io/assets/493f5bba-81a4-11e9-bf79-066b49664af6_cm_1440w.png?v=49" alt="Netflix">
</p>

## Especificaciones
Este sistema fue desarrollado en Laravel 8, y no posee una base de datos. 

Al clonarlo, simplemente usar estos comandos para levantarlo:

> composer update

> php artisan serve

## Obtener archivo CSV de Netflix
- Entrar a tu [cuenta de netflix](netflix.com/YourAccount).
- Ir a la sección "PERFILES Y CONTROLES PARENTALES"
- Elegir el usuario y desplegarlo
- Tocar el botón "Ver" a la derecha de "Actividad de visualización"
- Abajo de la tabla, presionar el botón "Descargarla Toda"

Esto generará un archivo CSV que cargaremos en nuestro sistema.

## Uso del sistema
El formulario simplemente tiene un campo para cargar el archivo, y luego su botón de envío. Elegimos el CSV descargado en el apartado anterior, y presionamos el botón "Subir".

En la pantalla de resultados veremos una tabla paginada de nuestras series y películas clasificadas.

Debajo de la tabla, veremos una serie de gráficas separadas en 30 días de visualización; independientes del mes en el cual estemos.

## Colaboración y aportes
Si te interesa mejorar este proyecto, usa el botón Fork arriba a la derecha. Acepto pull request todos los días.
