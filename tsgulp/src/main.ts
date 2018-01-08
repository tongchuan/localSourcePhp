// 布尔值
let isDone: boolean = false;

// 数字
let decLiteral: number = 6;
let hexLiteral: number = 0xf00d;
let binaryLiteral: number = 0b1010;
let octalLiteral: number = 0o744;

// 字符串
let name1: string = "bob";
name1 = "smith";
let name2: string = `Gene`;
let age: number = 27;
let sentence: string = `Hello, my name is ${name1} .
I'll be ${age + 1} years old next month.` 

// 数组
let list: number[] = [1,2,3]
let list2: Array<number> = [1,2,3]

// 元祖 Tuple
let x: [string, number];
x = ['hello', 10]; // OK
x = [10, 'hello']; // Error

console.log(x[0].substr(1)); //OK
console.log(x[1].substr(1)); // Error, 'number' does not have 'substr'

x[3] = 'world' // OK
console.log(x[5].toString()); // OK 'string'和‘number’都有toString
x[6] = true; // Error 布尔值不是（string|number）类型

// 枚举
enum Color {Red, Green, Blue}
let c: Color = Color.Blue;

enum Color1 {Red=1, Green, Blue}
let c1: Color1 = Color1.Blue;

enum Color2 {Red=1,Green=2,Blue=4}
let c2: Color2 = Color2.Red;

enum Color3 {Red=1,Green,Blue}
let c3: string = Color3[2]
console.log(c3) // Green

let notSure: any = 4;
notSure = "maybe a string instead"
notSure = false;

let notSure2: any = 4;
notSure2.ifItExists(); // okay, ifItExists might exist at runtime
notSure2.toFixed(); // okay,

let prettySure: Object = 4;
prettySure.toFixed() // Error

let list3:any[] = [1,true,"free"];
list3[1] = 100
list3[2] = false

// Void
function warnUser(): void{
  alert("This is my warning message");
}
let unusable: void = undefined // 或 null

// Null 和 Undefined
let u: undefined = undefined
let n: null = null;

// Never

function error(message: string):never {
  throw new Error(message);
}

// 推断的返回值类型为never
function fail() {
  return error("Something failed");
}

// 返回never的函数必须存在无法达到的终点
function infiniteLoop(): never {
  while (true) {
  }
}

// 类型断言
let someValue:any = 'this is a string'
let strLength: number = (<string>someValue).length;

let someValue1: any = 'this is a string'
let strLength1: number = (someValue1 as string).length


// import { sayHello } from './greet';
// function showHello(divName:string, name:string){
//   const elt = document.getElementById(divName);
//   elt.innerText = sayHello(name);
// }
// showHello("greeting", "TypeScript11");

/*
import {sayHello} from './greet';
console.log(sayHello('TypeScript'));
*/
/*
function hello(compiler: string){
  console.log(`Hello from ${compiler}`);
}

hello("TypeScript");
*/