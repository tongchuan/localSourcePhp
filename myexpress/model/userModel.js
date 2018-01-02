const Promise = require('promise');
const mongoose = require('../database')
const schema = new mongoose.Schema({
  name: String,
  pwd: String,
  date:{type:Date,default:Date.now},
  hidden:Boolean,
  gender:{type:Number,default:0},
  email:{type:String,default:''}
}, {
  versionKey: false
})

const Schema = mongoose.model('adminUser', schema);
// Schema.find(function(err,doc){
//   console.log(err);
//   console.log(doc);
// })
function find(){
  return new Promise(function(resolve,reject){
    // Schema.find()
    Schema.find({},function(err,doc){
      if(err===null){
        resolve(doc)
      }else{
        reject(err)
      }
    })
  })
}
function findOne(data){
  return new Promise(function(resolve,reject){
    Schema.findOne(data,function(err,doc){
      if(err===null){
        resolve(doc)
      }else{
        reject(err)
      }
    })
  })
}
function save(data){
  return new Promise(function(resolve,reject){
    let Item = new Schema(data)
    Item.save(function(err, doc){
      if(err===null){
        resolve(doc)
      }else{
        reject(err);
      }
    })
  });
}

function remove(data){
  return new Promise(function(resolve,reject){
    Schema.remove(data,function(err){
      if(err===null){
        resolve();
      }else{
        reject(err)
      }
    })
  })
}
function update(oldData,newsData){
  console.log(oldData,newsData);
  return new Promise(function(resolve,reject){
    Schema.update(oldData,newsData,function(err){
      if(err===null){
        resolve();
      }else{
        reject(err)
      }
    })
  })
}

module.exports = {
  // schema:Schema,
  find:find,
  save:save,
  update:update,
  remove:remove,
  findOne:findOne
}
