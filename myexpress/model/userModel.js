const Promise = require('promise');
const mongoose = require('../database')
const schema = new mongoose.Schema({
  name: String,
  pwd: String,
  date:{type:Date,default:Date.now},
  hidden:Boolean,
  age:{type:Number,default:0},
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

module.exports.delete = function(data){
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

module.exports = {
  // schema:Schema,
  find:find,
  save:save,
  delete:delete
}
