/*01:  question-01 ye hai kai aap ko array kai under sab say long word ko return karna hai esa functin bnao jo array kai longest word ko return karay. Fucntion kai under jitnay bhi white space hogi ya mt string hogi to function os case mai ignore ya false return karay ga */
/* --------------------------------------------------------------------------------------------- */

// phela tarika jo array kai under sab say longest word dega

/* function givebigstr(str){
  const wordsArr = str.split(' ')
  let val = 0;
  let string = '';
  wordsArr.map((word) => {
    if(word.length > val){
      val = word.length
      string = word
    }
  })
  return string
}

console.log(givebigstr('ashraf rajput saleem niaz sashraf')) */

// doosra tarika jo array kai under sab say longest word dega

/* function bigWordInArray(str){
  if(str !== ''){
    //return str.split(' ').sort((a, b) => a.length - b.length)[0] // is case mai array kai under sab say chotay word ko dega 
    return str.split(' ').sort((a, b) => b.length - a.length)[str.split(' ').length] // is case mai array kai under sab say baray word ko dega 
  }
} 

console.log(bigWordInArray('ashraf ashrafs haroon-ur-rashees haroon-ur-rasheed'))  */

// teesra tarika jo array kai under sab say longest word dega with the help of reduce method

/* function bigWord(str){
  if(str.trim().length === 0) return false
  return str.split(' ').reduce((acc, currWord) => {
    return currWord.length > acc.length ? currWord : acc;
  }, '')
}
// console.log(bigWord('asfafasaaa asdfdajs  asldfj dsakdjas asjfd adsddsafaskj')) */


// Congratulation Question 01 completed 
/* ************************************* */

/* 02: Question ye hai kai hash tag generator bana hai jo kai ek string ko hash tag kai form mai deekhaye matlab ager user input mai ye 'my name is ashraf' type kara to os ko output mai ye '#MyNameIsAshraf' mile */

/* map loop ki help say solve kiya hai  */

/* function hashTagGenerator(str){
  const sortedString =  str.trim().split(' ').map((word) => {
    return word.replace(word[0], word[0].toUpperCase())
  }).join('')
  return `#${sortedString}`
}
console.log(hashTagGenerator('public nhi hai ')) */

/* Foreach loop ki help say solve kiya hai  */

/* function hashgenerate(str){
  // let words = []
  let words = ''
  str.trim().split(' ').forEach(word => {
    // words.push(word.replace(word[0], word[0].toUpperCase()))
    words = words + word.replace(word[0], word[0].toUpperCase())
  });
  // const finalString = words.join('')
  // return `#${finalString}`
  return `#${words}`
}
console.log(hashgenerate('asdf ')) */


/* #Question 03: esa function bnao jis mai hum ek sentense ya word or second parameter mai hum check karnay kai liye ek char de jo hum ko maloom karke de kai ye letter kitna dafa is word mai aya hai  */

//FILTER METHOD KAI THROUGH

/* function charCount(str, char){
 if(typeof str === 'string' && typeof char === 'string'){
  const output = str.toLowerCase().split('').filter((letter) => {
    return letter === char.toLowerCase()
  })
  return output.length
 } else{
  console.log('beta koi char do ya koii sentence do')
 }
}
console.log(charCount('ASHRAFrajput', 'r')) */

//REDUCE METHOD KAI THROUGH

// function findChar(word, char){
//   if(typeof word !== 'string' || typeof char !== 'string') return ('sahi word dhalo!')
//   return word.toLowerCase().split('').reduce((acc, curr) => {
//     if( curr === char.toLowerCase() ){
//       acc++;
//     }
//     return acc;
//   }, 0)
// }
// console.log(findChar('ashrafSALEEM', 'a'))

