const { Client } = require('pg');

const client = new Client({
  user: 'postgres',
  host: 'localhost',
  database: 'SistemaJudicial',
  password: 'Kiernan.14',
  port: 5432,
});

client.connect()
  .then(() => console.log('Se conectó a la base de datos'))
  .catch(error => console.error('Error al conectar:', error));