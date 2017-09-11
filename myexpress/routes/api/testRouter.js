const express = require('express');
const router = express.Router();
const testModel = require('../../model/testModel');
const message = require('../../model/messageModel');
router.all('/list',function(req, res, next){
  testModel.find().then((data)=>{
    message.success.data = data
    res.send(message.success)
  },(err)=>{
    message.error.msg = err.toString()
    res.send(message.error)
  })
})
router.all('/save',function(req, res, next){
  let data = new testModel.Schema()
  data.name = 'Statue of Liberty';
  data.age = 25;
  data.updated = new Date;
  data.binary = new Buffer(0);
  data.living = false;
  data.mixed = { any: { thing: 'i want' } };
  data.markModified('mixed');
  data._someId = new testModel.mongoose.Types.ObjectId;
  data.array.push(1);
  data.ofString.push("strings!");
  data.ofNumber.unshift(1,2,3,4);
  data.ofDates.addToSet(new Date);
  data.ofBuffer.pop();
  data.ofMixed = [1, [], 'three', { four: 5 }];
  data.nested.stuff = 'good';
  console.log(data);
  testModel.save(data).then((data)=>{
    message.success.data = data
    res.send(message.success)
  },(err)=>{
    message.error.msg = err.toString()
    res.send(message.error)
  })
})
module.exports = router;
