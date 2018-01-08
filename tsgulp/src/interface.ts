function printLabel(labelledObj:{label: string}){
  console.log(labelledObj.label);
}

let myObj = {size: 10, label: "size 10 Object"}
printLabel(myObj);


interface LabelledValue {
  label: string;
}
function printLabel1(labelledObj:LabelledValue){
  console.log(labelledObj.label)
}
let myObj1 = {size: 10, label: "Size 10 Object"};
printLabel1(myObj1);

// 可选属性
interface SquareConfig {
  color?: string;
  width?: number;
}
function createSquare(config: SquareConfig):{color:string,area:number}{
  let newSquare = {color:"white", area:100};
  if(config.color){
    newSquare.color = config.color;
  }
  if(config.width){
    newSquare.area = config.width * config.width;
  }
  return newSquare;
}

let mySquare = createSquare({color:'black'})

// 只读属性
interface Point{
  readonly x: number;
  readonly y: number;
}
let p1: Point = {x:10, y:20}
p1.x = 5; // error

// ReadonlyArray<T>
let a: number[] = [1,2,3,4];
let ro: ReadonlyArray<number> = a;
ro[0] = 12; // error!
ro.push(5); // error!
ro.length = 100; // error!
let a2 = ro; // error!
let a3 = ro as number[];

interface Fun1 {
  (pare:string, pare2:string) : boolean;
}
let fun1: Fun1;
fun1= function(p1:string,p2:string){
  return true
}


// 可索引的类型
interface StringArray {
  [index: number]: string;
}
let myArray: StringArray;
myArray = ["Bob", "Fred"];
let myStr: string = myArray[0];



interface ClockInterface{
  currentTime:Date;
  setTime(d: Date);
}
class Clock implements ClockInterface{
  currentTime: Date;
  constructor(h: number, m: number) { }
  setTime(d: Date){
    this.currentTime = d;
  }
}
// readonly vs const
// 做为变量使用的话用 const，若做为属性则使用readonly。