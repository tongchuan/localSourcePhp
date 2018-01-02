const mongoose = require("mongoose");
mongoose.Promise = global.Promise;

/*调试模式是mongoose提供的一个非常实用的功能，用于查看mongoose模块对mongodb操作的日志，一般开发时会打开此功能，以便更好的了解和优化对mongodb的操作。*/
mongoose.set('debug', true);

/*一般默认没有user和password*/
var promise = mongoose.connect('mongodb://127.0.0.1/CMS2',{
  useMongoClient: true,
}).then((data)=>{
  console.log("数据库连接成功");
  // console.log(data);
}).catch((error)=>{
  console.log("数据库连接失败：" + error);
});
// console.log(db)
// var db = mongoose("mongodb://user:pass@localhost:port/database");
// db.connection.on("error", function (error) {
//   console.log("数据库连接失败：" + error);
// });
//
// db.connection.on("open", function () {
//   console.log("数据库连接成功");
// });
module.exports = mongoose;
