// const express = require('express');
const userRouter = require('./userRouter');
const testRouter = require('./testRouter');
// const router = express.Router();

// router.use('/user',user)

module.exports = function(app){
  app.use('/api/user',userRouter);
  app.use('/api/test',testRouter);
};
