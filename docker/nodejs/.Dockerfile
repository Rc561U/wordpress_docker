FROM node:14.5.0-alpine
WORKDIR /usr/app
COPY package.json .
RUN npm install --quiet
COPY . .