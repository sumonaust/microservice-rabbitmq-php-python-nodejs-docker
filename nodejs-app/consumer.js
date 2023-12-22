const amqp = require('amqplib');

async function connectAndConsume() {
  try {
      const connection = await amqp.connect('amqp://guest:guest@rabbitmq');
      const channel = await connection.createChannel();
      const queueName = 'email_queue';
      await channel.assertQueue(queueName, {
          durable: true
      });
      channel.consume(queueName, (message) => {
          console.log('[x]  Node JS Microservice :: email processing completed ::  -->> ', message.content.toString());
          channel.ack(message);
      });
  } catch (e) {
      console.log(e);
  }
}

connectAndConsume();