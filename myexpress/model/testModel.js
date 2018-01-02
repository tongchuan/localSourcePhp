const Promise = require('promise');
const mongoose = require('../database')
const schema = new mongoose.Schema({
  name: String,
  binary: Buffer,
  living: Boolean,
  updated: {type: Date, default: Date.now},
  age: {type: Number, min: 18, max: 65},
  mixed: mongoose.Schema.Types.Mixed,
  _someId: mongoose.Schema.Types.ObjectId,
  array: [],
  ofString: [String],
  ofNumber: [Number],
  ofDates: [Date],
  ofBuffer: [Buffer],
  ofBoolean: [Boolean],
  ofMixed: [mongoose.Schema.Types.Mixed],
  ofObjectId: [mongoose.Schema.Types.ObjectId],
  ofArrays: [[]],
  ofArrayOfNumbers:[[Number]],
  nested: {
    stuff: { type: String, lowercase: true, trim: true }
  }
})
const Schema = mongoose.model('test1', schema);
function save(data){
  return new Promise(function(resolve,reject){
    // let Item = new Schema(data)
    data.save(function(err, doc){
      if(err===null){
        resolve(doc)
      }else{
        reject(err);
      }
    })
  });
}
function create(data){
  return new Promise(function(resolve, reject){
    Schema.create(data,function(err,doc){
      if(err===null){
        resolve(doc)
      }else{
        reject(err);
      }
    })
  })
}

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
// Schema.find({ size: 'small' }).where('createdDate').gt(oneYearAgo).exec(callback);
module.exports = {
  Schema,
  mongoose,
save,
create,
find
}
