const express = require('express');
const router = express.Router();
const mdModel = require('../../model/mdModel');
const message = require('../../model/messageModel');
router.all('/list',function(req, res, next){
  mdModel.find().then((data)=>{
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
    mdModel.remove(data).then((data)=>{
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
    mdModel.findOne(data).then((data)=>{
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
    title: req.body.title,
    content: req.body.content,
    email: req.body.email
  }
  if(!req.body.title){
    res.send(message.error)
  }else{
    if(req.body._id){
      mdModel.update({_id:req.body._id},data).then((data)=>{
        message.success.data = data
        res.send(message.success)
      },(err)=>{
        message.error.msg = err.toString()
        res.send(message.error)
      })
    }else{
      mdModel.save(data).then((data)=>{
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
