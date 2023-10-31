let arry = [];

let iteracions = 0;

while (arry.length < 10) {
    let rndm = Math.floor(Math.random() * 10) + 1;
    
    // if (typeof arry.find((e) => e == rndm) === undefined) {
    if (!arry.find((e) => e == rndm)) {
        arry.push(rndm);
    }

    iteracions++;
}

console.log(arry);
console.log("Nº iteraciones: " + iteracions);