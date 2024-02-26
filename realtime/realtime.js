import express from 'express';
import cors from 'cors';
import mysql from "mysql";
import chapterPermission from './handlers/chapterPermission.js';
import testcaseResult from './handlers/testcaseResult.js';
import submissionResult from './handlers/submissionResult.js';
import onlineStudents from './handlers/onlineStudents.js';
import redis from "redis";

const DB_CONFIG = {
  host: "db",
  user: process.env.DATABASE_USER,
  password: process.env.DATABASE_PASSWORD,
  database: process.env.DATABASE_NAME,
};

const REDIS_CONFIG = {
  username: 'default', // use your Redis user. More info https://redis.io/docs/management/security/acl/
  password: process.env.REDIS_PASSWORD, // use your password here
  socket: {
    host: 'redis',
    port: 6379,
  }
};

const redisClient = redis.createClient(REDIS_CONFIG);

redisClient.on('connect', function () {
  console.log('Connected to Redis');
});

redisClient.on('error', function (err) {
  console.log('Redis error: ' + err);
});

await redisClient.connect();

// Create a connection pool instead of a single connection
const db_pool = mysql.createPool(DB_CONFIG);

const app = express();

app.use(cors());

app.get('/subscribe/testcase-result/:job_id', (req, res, next) => testcaseResult(req, res, next, redisClient))
app.get('/subscribe/submission-result/:job_id', (req, res, next) => submissionResult(req, res, next, redisClient))
app.get('/subscribe/chapter-permission/:group_id', (req, res, next) => chapterPermission(req, res, next, redisClient))
app.get('/subscribe/online-students/:group_id', (req, res, next) => onlineStudents(req, res, next, db_pool, redisClient)) // Pass the connection pool instead of a single connection

app.listen(3001, () => {
  console.log('Server is running on port 3001');
});