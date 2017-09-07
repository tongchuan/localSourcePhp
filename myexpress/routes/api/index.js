// const express = require('express');
const userRouter = require('./userRouter');
// const router = express.Router();

// router.use('/user',user)

module.exports = function(app){
  app.use('/api/user',userRouter);
};
