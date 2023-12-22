FROM node:14

WORKDIR /app

COPY package*.json ./

COPY ./nodejs-app/package*.json ./

RUN npm install

COPY ./nodejs-app ./

CMD [ "node", "consumer.js" ]
