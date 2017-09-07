const express = require('express');
const router = express.Router();
const userModel = require('../../model/userModel');
const message = require('../../model/messageModel');
router.all('/list',function(req, res, next){
  userModel.find().then((data)=>{
    message.success.data = data
    res.send(message.success)
  },(err)=>{
    message.error.msg = err.toString()
    res.send(message.error)
  })
})

router.all('/remove',function(req, res, next){
  let data = {}
  data[req.body.type] = req.body.value
  if(!req.body.type || !req.body.value){
    res.send(message.error)
  }else{
    userModel.remove(data).then((data)=>{
      message.success.data = data
      res.send(message.success)
    },(err)=>{
      message.error.msg = err.toString()
      res.send(message.error)
    })
  }
})
router.all('/findOne',function(req, res, next){
  let data = {}
  data[req.body.type] = req.body.value
  if(!req.body.type || !req.body.value){
    res.send(message.error)
  }else{
    userModel.findOne(data).then((data)=>{
      message.success.data = data
      res.send(message.success)
    },(err)=>{
      message.error.msg = err.toString()
      res.send(message.error)
    })
  }
})

router.all('/save',function(req, res, next){
//   Checks route params (req.params), ex: /user/:id
// Checks query string params (req.query), ex: ?id=12
// Checks urlencoded body params (req.body), ex: id=
  let data = {
    name: req.body.name,
    pwd: req.body.pwd,
    date: req.body.date,
    hidden: req.body.hidden,
    age: req.body.age,
    email: req.body.email
  }
  if(!req.body.name || !req.body.pwd){
    res.send(message.error)
  }else{
    console.log(!!req.body._id);
    if(req.body._id){
      userModel.update({_id:req.body._id},data).then((data)=>{
        message.success.data = data
        res.send(message.success)
      },(err)=>{
        message.error.msg = err.toString()
        res.send(message.error)
      })
    }else{
      userModel.save(data).then((data)=>{
        message.success.data = data
        res.send(message.success)
      },(err)=>{
        message.error.msg = err.toString()
        res.send(message.error)
      })
    }

  }
})

module.exports = router;
