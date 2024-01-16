# jubilant-broccoli

## Backend Engineer Coding Challenge

### Propósito

Como parte del proceso de selección de Agree, solicitamos a los candidatos que completen un pequeño proyecto que nos ayude a entender sus habilidades, experiencias, ingenio, forma de resolver problemas y conocimientos.

### Alcance

Desarrollar una RESTful API relacionada con las cartas de Pokémon que permite ser consumida desde un Front-end o una App con las siguientes acciones:

- Crear una carta.
- Actualizar una carta.
- Devolver una carta.
- Devolver todas las cartas.
- Borrar una carta.

La carta debe contener la siguiente información:

- Nombre
- HP (Representa la salud de los Pokémon y siempre es un múltiplo de 10)
- ¿Es primera edición?
- Expansion (Base Set, Jungle, Fossil, Base Set 2)
- Tipo (Agua, Fuego, Hierba, Eléctrico, etc.)
- Rareza (Común, No Común, Rara)
- Precio
- Imagen de la carta
- Fecha de creación de la carta

### Notas

- La solución se puede escribir en PHP.
- El motor de base de datos debe ser MySQL o DynamoDB.
- Siéntase libre de hacer cualquier suposición que se necesite acerca de los campos requeridos, la forma de estructurar la data y las validaciones necesarias.
- La data debe ser persistente.
- La solución deberá estar en un repositorio accesible para el colaborador de Agree que haya solicitado el challenge.
- Una vez finalizado, se debe enviar al colaborador de Agree un documento con las suposiciones que se hicieron, qué es lo que se hizo y cómo ejecutar la solución.
- Adjuntar documentación de los endpoints de la API (ej: Swagger).

### Bonus

- Autenticación
- Filtros
- Paginado
- Tests Unitarios
- Deploy de la API en un servicio Cloud (AWS, Azure, Google Cloud, etc.)
- Utilización de los servicios de AWS (API Gateway, EC2, ECS, EKS, S3, etc.)
- Serverless
