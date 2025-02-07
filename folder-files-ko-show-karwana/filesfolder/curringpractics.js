// function addTwo(a) {
//   return 2 + a;
// }

// function substractOne(a) {
//   return a - 1;
// }

// // instead of calling functions separately
// // we can compose into a curried function
// // that will take any amount of functions into a pipeline

// function compose(...fns) {
//   return function(a) {
//     return fns.reduce((result, fn) => fn(result), a)
//   }
// };

// const pipe = compose(addTwo, substractOne);

// console.log(pipe(3)) // 4

// infinite curring method ***

// function multiply(x){
//   return function(y){
//     if(y) return multiply(x * y)
//     return x
//   }
// }

// curring method q use kartay hain ager humay baar baar same arguments dene honto

// function addNum(x) {
//   return function (y) {
//     return x + y;
//   };
// }

// const addTwoNum = addNum(9);
// console.log(addTwoNum(10));

// multiply kai liye hai curring function

// function multiplyNum(x) {
//   return function(y){
//     return x * y
//   }
// }
// const multiplyByTotalMarks = multiplyNum(25)

