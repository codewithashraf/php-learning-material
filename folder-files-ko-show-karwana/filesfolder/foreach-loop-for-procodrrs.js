// let array = []

// for ( var i = 1; i <= 3; i++, i = i) {
//   const callback = (i) => {
//     console.log(i);
//   }
//   array.push(callback)
//   setTimeout( callback, 500, i);
// }

// for (let i = 0, getI = () => i; i < 3; i++) {
//   array.push(getI)
//   console.log(getI());
// }
// // Logs 0, 0, 0

// var kai case mai IIFE say karsaktay hain

// for( var i = 0; i <= 3; i++ ){
//   (function (val) {
//     setTimeout(() =>  console.log(val), 10000)
//   })(i)
// }

// var kai case mai settimeout say bhi karsaktay hain third argument deke

/* for( var i = 0; i <= 10; i++ ) {
  setTimeout((val) => {
    console.log(val)
  }, 2000, i);
} */

for (
  let i = 0, getI = () => i, incrementI = () => i++;
  getI() < 3;
  incrementI()
) {
  console.log(i);
}
