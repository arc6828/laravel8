let name = "chavalit";
let message = "hello world ${name}";
let a = eval("`" + message + "`");
console.log(a);
// console.log(message.template());