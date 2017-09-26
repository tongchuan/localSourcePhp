// const express = require('express');
const userRouter = require('./userRouter');
const mdRouter = require('./mdRouter');
const testRouter = require('./testRouter');
// const router = express.Router();

// router.use('/user',user)

module.exports = function(app){
  app.use('/api/user',userRouter);
  app.use('/api/md',mdRouter);
  app.use('/api/test',testRouter);
};
